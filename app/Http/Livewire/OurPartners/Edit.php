<?php

namespace App\Http\Livewire\OurPartners;

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
            $image=$this->image->storeAs('our_partners',$fileNewName );
            
            $imageName='our_partners/'.$fileNewName;

            DB::table('our_partners')
            ->where('id',$this->selected_id)
            ->update([
                'logo'=>$imageName,
            ]);
        }

        DB::table('our_partners')
        ->where('id',$this->selected_id)
        ->update([
            'name'=>$data["name"],
        ]);

        return redirect()->route('backend.partners.index');
    }

    public function render()
    {
        $data=DB::table('our_partners')->where('id',$this->selected_id)->first();
        return view('livewire.our-partners.edit',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
