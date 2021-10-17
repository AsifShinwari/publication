<?php

namespace App\Http\Livewire\Resources\OurMentors;

use Livewire\Component;
use DB;

class ResetPassword extends Component
{
    public $user_id;

    public function mount($user_id){
        $this->user_id = $user_id;
    }

    public function reset_password($data){
        DB::table('users')->where('id',$this->user_id)->update([
            'password'=>bcrypt($data['password'])
        ]);
        return redirect()->route('backend.mentors.index');
    }

    public function render()
    {
        return view('livewire.resources.our-mentors.reset-password')
        ->layout('home')
        ->slot('slot');
    }
}
