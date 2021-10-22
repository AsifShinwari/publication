<?php

namespace App\Http\Livewire\OurServices;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Edit extends Component
{
    use withFileUploads;
    
    public $image;
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

public function update($data){

    $imageName=null;
    if($this->image!=null){
        $file_ext=$this->image->getClientOriginalExtension();
        $file_name=date('Y_m_d_h_m_s_ms');
        $fileNewName=$file_name.'.'.$file_ext;
        $image=$this->image->storeAs('our_services_images',$fileNewName );
        
        $imageName='our_services_images/'.$fileNewName;
        DB::table('our_services')
        ->where('id',$this->selected_id)
        ->update([
            'image'=>$imageName
        ]);
    }

    DB::table('our_services')
    ->where('id',$this->selected_id)
    ->update([
        "title" => $data["title"],
        "description" => $data['description'],
    ]);

    $this->emit('message',[
        'type'=>'success',
        'title'=>'Service Updated Successfully!'
    ]);

    return redirect()->route('backend.our.services.index');
}
    public function render()
    {
        $data=DB::table('our_services')->where('id',$this->selected_id)->first();
        return view('livewire.our-services.edit',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
