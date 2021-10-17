<?php

namespace App\Http\Livewire\Resources\ResearchFunding;

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
            $image=$this->image->storeAs('resources_research_funding',$fileNewName );
            
            DB::table('resources_research_funding')->orderBy('id','desc')->update([
                'image'=>'resources_research_funding/'.$fileNewName,
            ]);
        }

            DB::table('resources_research_funding')->orderBy('id','desc')->update([
                "message" => $data["message"],
            ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Information Updated Successfully!'
        ]);

    }

    public function render()
    {
        $data=DB::table('resources_research_funding')->orderBy('id','desc')->first();
        return view('livewire.resources.research-funding.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
  
}
