<?php

namespace App\Http\Livewire\TieUpInstitution;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Add extends Component
{
    use withFileUploads;

    public $image;

    public function store($data){

        $imageName;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('aboutus_tie_up',$fileNewName );
            
            $imageName='aboutus_tie_up/'.$fileNewName;
        }

        DB::table('tie_up_institution')->insert([
            'title'=>$data['title'],
            'country_id'=>$data['country_id'],
            'image'=>$imageName,
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Added Successfully!',
        ]);
        
        return redirect()->route('backend.aboutUs.tie.up');
    }

    public function render()
    {   
        $countries=DB::table('countries')->orderBy('name','asc')->get();
        return view('livewire.tie-up-institution.add',compact('countries'))
        ->layout('home')
        ->slot('slot');
    }
}
