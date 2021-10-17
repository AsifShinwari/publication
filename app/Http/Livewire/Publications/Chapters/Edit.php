<?php

namespace App\Http\Livewire\Publications\Chapters;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Edit extends Component
{
    use withFileUploads;
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function update($data){
        
        DB::table('publication_chapter')
        ->where('id',$this->selected_id)
        ->update([
           "title" => $data["title"],
           "pages" => $data["pages"],
           "author" => $data["author"],
           "keywords" => $data["keywords"],
           "abstract" => $data["abstract"],
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Chapter Updated Successfully!'
        ]);

        $data=DB::table('publication_chapter')
        ->where('id',$this->selected_id)->first();

        return redirect()->route('backend.publication.chapters.index',$data->publication_id);
    }

    public function render()
    {
        $data=DB::table('publication_chapter')
        ->where('id',$this->selected_id)->first();

        return view('livewire.publications.chapters.edit',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
