<?php

namespace App\Http\Livewire\Publications\Journals\Archive;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Add extends Component
{
    use withFileUploads;

    public $journal_id;

    public function mount($id){
        $this->journal_id=$id;
    }

    public function store($data){
     
        DB::table('journal_archives')->insert([
            'journal_id'=>$data['journal_id'],
            'volume'=>$data['volume'],
            'year'=>$data['year'],
            'issue'=>$data['issue'],
        ]);

        return redirect()->route('backend.journal.archive.index',$data['journal_id']);
    }
    
    public function render()
    {
        $journal_id=$this->journal_id;

        return view('livewire.publications.journals.archive.add',compact('journal_id'))
        ->layout('home')
        ->slot('slot');
    }
}
