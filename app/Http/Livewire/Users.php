<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use DB;


class Users extends Component
{
    use WithPagination;


    public $username;
    public $email;
    public $password;
    public $type;
    public $selected_id;

    public $filter_admin;
    public $filter_individual;
    public $filter_mentor;
    public $filter_company;

    public $subject;
    public $message;

    public function submit($data){

        $this->username=$data['username'];
        $this->email=$data['email'];
        $this->type=$data['type'];
        $this->password=$data['password'];
        
        $this->validate([
            'username' => 'required',
            'email' => 'required|unique:users',
            'type' => 'required',
            'password' => 'required|min:6',
        ]);

        DB::table('users')->insert([
            'name'=>$data['username'],
            'email'=>$data['email'],
            'type'=>$data['type'],
            'password'=>$data['password'],
        ]);
        session()->flash('inserted', 'New User Successfully Added!');
        $this->render();
        $this->resetPage();
    }

    public function edit($id){
        $this->selected_id=$id;
        $user=DB::table('users')->where('id',$id)->first();
        $this->username=$user->name;
        $this->email=$user->email;
        $this->type=$user->type;
        $this->password='';
    }

    public function update($data){

        $this->username=$data['username'];
        $this->email=$data['email'];
        $this->type=$data['type'];
        $this->password=$data['password'];

    
        
        if($this->selected_id){

        $user=DB::table('users')->where('id',$this->selected_id)->first();

        if($user->email==$this->email){

            $this->validate([
                'username' => 'required',
                'type' => 'required',
                'password' => 'required|min:6',
            ]);

        }else{
            $this->validate([
                'username' => 'required',
                'type' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
            ]);
        }

        DB::table('users')->where('id',$this->selected_id)->update([
            'name'=>$this->username,
            'type'=>$this->type,
            'email'=>$this->email,
            'password'=>$this->password,
        ]);

        }
        session()->flash('updated', 'User Updated Successfully!');
        $this->render();
        $this->resetPage();

    }

    public function delete(){
        $this->validate(['selected_id' => 'required']);
        DB::table('users')->where('id',$this->selected_id)->delete();
        session()->flash('deleted', 'User Deleted Successfully!');
        $this->render();
        $this->resetPage();
    }

    public function send_email($data){
        
        $this->subject=$data['subject'];
        $this->message=$data['message'];
        $this->validate([
            'subject'=>'required',
            'message'=>'required',
        ]);

        $to_name = 'ESRO';
        $to_emails=[];
        foreach($this->get_data('email') as $key=>$ema){
            $to_emails[$key]=$ema->email;
        }

        $emaildata = [
            'email_subject'=>$data['subject'],
            'email_message'=>$data['message'],
        ];

        Mail::send('mail_to_all', $emaildata, function($message) use ($to_name, $to_emails,$data) {
        $message->to($to_emails, $to_name)
        ->subject($data['subject']);
        $message->cc('esro.europe@gmail.com');
        $message->from('esro.europe@app.com','ESRO');
        });

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Email Sent Successfully!'
        ]);
        
        $this->emit('resetFormCloseModel', [
            'formName'    => 'deleteModal',
            'model'    => 'close',//close or not close
            'clearForm' => 'yes' //use yes or no
        ]);
    }

    public function get_data($column=''){
        $filter_admin=$this->filter_admin;
        $filter_individual=$this->filter_individual;
        $filter_mentor=$this->filter_mentor;
        $filter_company=$this->filter_company;

        $raw=DB::table('users')
        ->when($filter_admin,function($query) use($filter_admin){
            $query->orWhere('users.type','Admin');
        })
        ->when($filter_individual,function($query) use($filter_individual){
            $query->orWhere('users.type','Individual');
        })
        ->when($filter_mentor,function($query) use($filter_mentor){
            $query->orWhere('users.type','Mentor');
        })
        ->when($filter_company,function($query) use($filter_company){
            $query->orWhere('users.type','Company');
        })
        ->orderBy('id','desc');
        
        if($column!=''){
            $raw->select($column);
        }

        if($filter_admin==true || $filter_individual==true || $filter_mentor==true || $filter_company==true ){
            $users=$raw->get();
        }else{
            $users=$raw->paginate(5);
        }

        return $users;
    }
    public function render()
    {
        
        $users=$this->get_data();
        return view('livewire.users',compact('users'))
        ->layout('home')->slot('slot');
    }
}
