<?php

namespace App\Http\Livewire\OurPartners;

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
            $image=$this->image->storeAs('our_partners',$fileNewName );
            
            $imageName='our_partners/'.$fileNewName;
        }

        DB::table('our_partners')->insert([
            'name'=>$data["name"],
            'logo'=>$imageName,
        ]);

        return redirect()->route('backend.partners.index');
    }

    public function render()
    {
        return view('livewire.our-partners.add')
        ->layout('home')
        ->slot('slot');
    }
}
