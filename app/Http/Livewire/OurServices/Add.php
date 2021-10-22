<?php

namespace App\Http\Livewire\OurServices;

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
        $image=$this->image->storeAs('our_services_images',$fileNewName );
        
        $imageName='our_services_images/'.$fileNewName;
    }

    DB::table('our_services')->insert([
        "title" => $data["title"],
        "description" => $data['description'],
        'image'=>$imageName
    ]);

    $this->emit('message',[
        'type'=>'success',
        'title'=>'Service Added Successfully!'
    ]);

    return redirect()->route('backend.our.services.index');
}

    public function render()
    {
        return view('livewire.our-services.add')
        ->layout('home')
        ->slot('slot');
    }
}
