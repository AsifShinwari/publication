<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class Dashboard extends Component
{
    public function render()
    {
       

        return view('livewire.dashboard')
        ->layout('home')
        ->slot('content');
    }
}
