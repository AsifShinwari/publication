<?php

namespace App\Http\Livewire\AdvisoryBoard;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;

class Add extends Component
{
    use withFileUploads;

    public $image;
    
    public function store($data){
        
        $imageName=null;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('advisory_board_images',$fileNewName );
            
            $imageName='advisory_board_images/'.$fileNewName;
        }

        DB::table('advisory_board')->insert([
            "name" => $data["name"],
            "qualification" => $data['qualification'],
            "details" => $data["details"],
            'image'=>$imageName
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Member Added Successfully!'
        ]);

        return redirect()->route('backend.advisory.board.index');
    }

    public function render()
    {
        return view('livewire.advisory-board.add')
        ->layout('home')
        ->slot('slot');
    }
}
