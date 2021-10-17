<?php

namespace App\Http\Livewire\Publications\Journals;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Edit extends Component
{
    use withFileUploads;

    public $selected_id;
    public $image;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function update($data){

        $imageName=null;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('journal_images',$fileNewName );
            
            $imageName='journal_images/'.$fileNewName;

            DB::table('journals')
            ->where('id',$this->selected_id)
            ->update([
                "image" => $imageName,
            ]);
        }

        DB::table('journals')
        ->where('id',$this->selected_id)
        ->update([
            "title" => $data["title"],
            "isbn" => $data["isbn"],
            "editor_email" => $data["editor_email"],
            "about" => $data["about"],
            "indexing" => $data["indexing"],
            "editorial_board" => $data["editorial_board"],
            "autor_guidline" => $data["autor_guidline"],
            "pub_ethics" => $data["pub_ethics"],
            "aim_and_scop" => $data["aim_and_scop"],
         ]);
 
         $this->emit('message',[
             'type'=>'success',
             'title'=>'Journal Updated Successfully!'
         ]);
 
         return redirect()->route('backend.publication.journal.index');

    }

    public function render()
    {
        $data=DB::table('journals')->where('id',$this->selected_id)->first();
        return view('livewire.publications.journals.edit',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
