<?php

namespace App\Http\Livewire\Publications\Chapters;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Add extends Component
{ 
    use withFileUploads;
    public $publication_id;

    public function mount($id){
        $this->publication_id=$id;
    }

    public function store($data){
        
        DB::table('publication_chapter')->insert([
           "title" => $data["title"],
           "pages" => $data["pages"],
           "author" => $data["author"],
           "keywords" => $data["keywords"],
           "abstract" => $data["abstract"],
           "publication_id" => $this->publication_id,
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Chapter Added Successfully!'
        ]);

        return redirect()->route('backend.publication.chapters.index',$this->publication_id);
    }

    public function render()
    {
        return view('livewire.publications.chapters.add')
        ->layout('home')
        ->slot('slot');
    }
}
