<?php

namespace App\Http\Livewire\Publications\Journals\Archive\Issues;

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
            $image=$this->image->storeAs('journal_archive_issues_pdf',$fileNewName );
            
            $imageName='journal_archive_issues_pdf/'.$fileNewName;

            DB::table('journal_archives_issues')
            ->where('id',$this->selected_id)
            ->update([
                "file" => $imageName,
            ]);
        }

        DB::table('journal_archives_issues')
        ->where('id',$this->selected_id)
        ->update([
            "title" => $data["title"],
            "author" => $data["author"],
            "pages" => $data["pages"],
            "abrstact" => $data["abrstact"],
            "keywords" => $data["keywords"],
            "doi" => $data["doi"],
            "publication_date" => $data["publication_date"],
        ]);

        return redirect()->route('backend.journal.archive.issues.index',$data['archive_id']);
    }

    public function render()
    {
        $data=DB::table('journal_archives_issues')->where('id',$this->selected_id)->first();
        return view('livewire.publications.journals.archive.issues.edit',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
