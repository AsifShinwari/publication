<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Stripe;
use DB;
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
   
        $request->validate([
            "amount" => "required",
            "currency" => "required",
            "email" => "required",
            "agreement" => "required",
        ]);

        $email=$request->email;
        $total_amount=$request->amount;
        $tax=$total_amount*19/100;
        $net_pay=$total_amount+$tax;
    
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       $result= Stripe\Charge::create([
                "amount" => (int)$net_pay,
                "currency" => "EUR",
                "source" => $request->stripeToken,
                "description" => $request->description,
        ]);
        // dd($result->source);
        if($result->status=='succeeded'){
            $res=[
                'transaction_id'=>$result->id,
                'amount'=>(int)$net_pay,
                'tax_applied'=>'19',
                'created'=>$result->created,
                'currency'=>$result->currency,
                'description'=>$result->description,
                'receipt_url'=>$result->receipt_url,
                'email'=>$request->email,
            ];

           $is_saved= DB::table('payments')->insert($res);
            
            $to_name = 'ESRO';
            $to_email = $request->email;
            $data = [
                'id'=>$result->id,
                'amount'=>(int)$net_pay,
                'currency'=>$result->currency,
                'description'=>$result->description,
                'email'=>$request->email,
                'tax_applied'=>'19',
                'funding'=>$result->source->funding,
                'brand'=>$result->source->brand,
                'last4'=>$result->source->last4,
                'object'=>$result->source->object,
            ];

            Mail::send('mail', $data, function($message) use ($to_name, $to_email,$email,$result) {
            $message->to($to_email, $to_name)
            ->subject('ESRO Receipt  Invoice: '.$result->id);
            $message->cc('esro.europe@gmail.com');
            $message->from('esro.europe@app.com','ESRO Receipt  Invoice: '.$result->id);
            });

            Session::flash('success', 'Payment successful!');
           
            return back();
        }
   
        
    }
}
