<?php

namespace App\Http\Livewire\UserProfile;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class Index extends Component
{
    use WithPagination;


    public $username;
    public $email;
    public $password;
    public $selected_id;

    public function edit($id){

        $this->selected_id=$id;

        $user=DB::table('users')->where('id',$id)->first();
        $this->username=$user->name;
        $this->email=$user->email;
        $this->password='';
    }

    public function update($data){

        $this->username=$data['username'];
        $this->email=$data['email'];
        $this->password=$data['password'];

    
        
        if($this->selected_id){

        $user=DB::table('users')->where('id',$this->selected_id)->first();

        if($user->email==$this->email){

            $this->validate([
                'username' => 'required',
                'password' => 'required|min:6',
            ]);

        }else{
            $this->validate([
                'username' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
            ]);
        }
        DB::table('users')->where('id',$this->selected_id)->update([
            'name'=>$this->username,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
        ]);

        }
        session()->flash('updated', 'User Updated Successfully!');
        $this->render();
        $this->resetPage();

    }

    public function render()
    {
        $users=DB::table('users')
        ->where('id',\Auth::user()->id)
        ->orderBy('id','desc')->paginate(5);
        return view('livewire.user-profile.index',compact('users'))
        ->layout('home')->slot('slot');
    }
    
}
