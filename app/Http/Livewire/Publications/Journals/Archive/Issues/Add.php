<?php

namespace App\Http\Livewire\Publications\Journals\Archive\Issues;

use Livewire\Component;
use Livewire\WithFileUploads;
use DB;
class Add extends Component
{
    use WithFileUploads;

    public $archive_id;
    public $image;

    public function mount($id){
        $this->archive_id=$id;
    }

    public function store($data){

        $imageName=null;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('journal_archive_issues_pdf',$fileNewName );
            
            $imageName='journal_archive_issues_pdf/'.$fileNewName;
        }

        DB::table('journal_archives_issues')->insert([
            "archive_id" => $this->archive_id,
            "title" => $data["title"],
            "author" => $data["author"],
            "pages" => $data["pages"],
            "abrstact" => $data["abrstact"],
            "keywords" => $data["keywords"],
            "doi" => $data["doi"],
            "publication_date" => $data["publication_date"],
            "file" => $imageName,
        ]);

        return redirect()->route('backend.journal.archive.issues.index',$this->archive_id);
    }

    public function render()
    {
        return view('livewire.publications.journals.archive.issues.add')
        ->layout('home')
        ->slot('slot');
    }
}
