<?php

namespace App\Http\Livewire\TieUpInstitution;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;

class Edit extends Component
{
    use withFileUploads;

    public $image;
    public $selected_id;

    public function mount($item_id){
        $this->selected_id=$item_id;
    }

    public function update($data){

        $imageName;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('aboutus_tie_up',$fileNewName );
            
            $imageName='aboutus_tie_up/'.$fileNewName;

            DB::table('tie_up_institution')
            ->where('id',$this->selected_id)
            ->update([
                'image'=>$imageName,
            ]);
        }

        DB::table('tie_up_institution')
        ->where('id',$this->selected_id)
        ->update([
            'title'=>$data['title'],
            'country_id'=>$data['country_id'],
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Updated Successfully!',
        ]);
        
        return redirect()->route('backend.aboutUs.tie.up');
    }

    public function render()
    {   
        $countries=DB::table('countries')->orderBy('name','asc')->get();
        $data=DB::table('tie_up_institution')->where('id',$this->selected_id)->first();
        return view('livewire.tie-up-institution.edit',compact('countries','data'))
        ->layout('home')
        ->slot('slot');
    }
}
