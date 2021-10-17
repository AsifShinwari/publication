<?php

namespace App\Http\Livewire\Resources\Patent;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;

class Index extends Component
{
    use WithFileUploads;
    public $image;

    public function update($data){
        
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('patent',$fileNewName );
            
            DB::table('patent')->orderBy('id','desc')->update([
                'image'=>'patent/'.$fileNewName,
            ]);
        }

            DB::table('patent')->orderBy('id','desc')->update([
                "message" => $data["message"],
            ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Information Updated Successfully!'
        ]);

    }

    public function render()
    {
        $data=DB::table('patent')->orderBy('id','desc')->first();
        return view('livewire.resources.patent.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
 