<?php

namespace App\Http\Livewire\Publications\Journals;

use Livewire\Component;
use Livewire\WithFileUploads;
use DB;
class Add extends Component
{
    use withFileUploads;
    public $image;

    public function render()
    {
        return view('livewire.publications.journals.add')
        ->layout('home')
        ->slot('slot');
    }

    public function store($data){
        $imageName=null;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('journal_images',$fileNewName );
            
            $imageName='journal_images/'.$fileNewName;
        }

        DB::table('journals')->insert([
            "title" => $data["title"],
            "isbn" => $data["isbn"],
            "editor_email" => $data["editor_email"],
            "about" => $data["about"],
            "indexing" => $data["indexing"],
            "editorial_board" => $data["editorial_board"],
            "autor_guidline" => $data["autor_guidline"],
            "pub_ethics" => $data["pub_ethics"],
            "aim_and_scop" => $data["aim_and_scop"],
            "image" => $imageName,
         ]);
 
         $this->emit('message',[
             'type'=>'success',
             'title'=>'Journal Added Successfully!'
         ]);
 
         return redirect()->route('backend.publication.journal.index');

    }
}
