<?php

namespace App\Http\Livewire\Publications\Journals\Archive;

use Livewire\Component;
use DB;
class Edit extends Component
{
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function update($data){
        DB::table('journal_archives')
        ->where('id',$this->selected_id)
        ->update([
            'volume'=>$data['volume'],
            'year'=>$data['year'],
            'issue'=>$data['issue'],
        ]);

        return redirect()->route('backend.journal.archive.index',$data['journal_id']);
    }
    public function render()
    {
        $data=DB::table('journal_archives')->where('id',$this->selected_id)->first();
        return view('livewire.publications.journals.archive.edit',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
