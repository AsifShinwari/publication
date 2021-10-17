<?php

namespace App\Http\Livewire\Publications\Journals\Archive\Issues;

use Livewire\Component;
use DB;
class Index extends Component
{
    public $archive_id;
    public $selected_id;

    public function mount($id){
        $this->archive_id=$id;
    }

    public function setId($id){
       $this->selected_id=$id;
    }

    public function delete(){
        DB::table('journal_archives_issues')->where('id',$this->selected_id)->delete();
        $this->emit('message',[
            'type'=>'success',
            'title'=>'Issue Deleted Successfully!'
        ]);
        
        $this->emit('resetFormCloseModel', [
            'formName'    => 'deleteModal',
            'model'    => 'close',//close or not close
            'clearForm' => 'yes' //use yes or no
        ]);
    }

    public function render()
    {
        $data=DB::table('journal_archives_issues')->where('archive_id',$this->archive_id)->paginate(10);
        $archive=DB::table('journal_archives')->where('id',$this->archive_id)->first();
        $journal=DB::table('journals')->where('id',$archive->journal_id)->first();
        return view('livewire.publications.journals.archive.issues.index',compact('data','archive','journal'))
        ->layout('home')
        ->slot('slot');
    }
}
