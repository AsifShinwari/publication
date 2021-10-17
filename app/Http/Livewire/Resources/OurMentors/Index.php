<?php

namespace App\Http\Livewire\Resources\OurMentors;

use Livewire\Component;
use DB;

class Index extends Component
{
    public $search;
    public $selected_id;

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('our_mentors')->where('id',$this->selected_id)->delete();
        
        $this->emit('message',[
            'type'=>'success',
            'title'=>'Mentor Deleted Successfully!'
        ]);
        
        $this->emit('resetFormCloseModel', [
            'formName'    => 'deleteModal',
            'model'    => 'close',//close or not close
            'clearForm' => 'yes' //use yes or no
        ]);

        
    }

    public function approve_account($email){
        $exist=DB::table('users')->where('email',$email)->first();
        $mentor=DB::table('our_mentors')->where('email',$email)->first();
        
        if(!$exist){
            DB::table('users')->insert([
                'email'=>$email,
                'password'=>bcrypt('123456'),
                'type' => 'Mentor',
                'name' => $mentor->name.' '.$mentor->last_name
            ]);

            $this->emit(
                'message',
                [
                    'type'=>'success',
                    'title' => 'Account Approved : Email - '.$email.'  Password: 123456',
                ]
            );
        }else{
            $this->emit(
                'message',
                [
                    'type' => 'error',
                    'title' => 'The Email Already Exist!'
                ]
            );
        }
    }
    public function render()
    {
        $search=$this->search;

        $data=DB::table('our_mentors')
        ->join('countries','our_mentors.country_id','countries.id')
        ->select('our_mentors.*','countries.name as country_name')
        ->when($search,function($query) use($search){
            $query->orWhere('our_mentors.name','like','%'.$search.'%');
        })
        ->orderBy('id','desc')->paginate(10);
        return view('livewire.resources.our-mentors.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
 