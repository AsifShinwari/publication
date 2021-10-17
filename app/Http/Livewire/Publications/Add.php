<?php

namespace App\Http\Livewire\Publications;

use Livewire\Component;
use DB;
use Livewire\withFileUploads;

class Add extends Component
{
    use withFileUploads;

    public $image;
    public $book_pdf;
    public $table_of_content_pdf;

    public function store($data){
        
        $imageName=null;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('publications_images',$fileNewName );
            
            $imageName='publications_images/'.$fileNewName;
        }

        $book_pdf=null;
        if($this->book_pdf!=null){
            $file_ext=$this->book_pdf->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->book_pdf->storeAs('publications_book_pdf',$fileNewName );
            
            $book_pdf='publications_book_pdf/'.$fileNewName;
        }

        $table_of_content_pdf=null;
        if($this->table_of_content_pdf!=null){
            $file_ext=$this->table_of_content_pdf->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->table_of_content_pdf->storeAs('book_table_of_contents_pdf',$fileNewName );
            
            $table_of_content_pdf='book_table_of_contents_pdf/'.$fileNewName;
        }
        
        DB::table('publications')->insert([
           "title" => $data["title"],
           "author" => $data["author"],
           "isbn" => $data["isbn"],
           "doi" => $data["doi"],
           "pages" => $data["pages"],
           "year_of_publication" => $data["year_of_publication"],
           "discipline_id" => $data["discipline"],
           "publication_type_id" => $data["publication_type_id"],
           "image" => $imageName,
           "book_pdf" => $book_pdf,
           "table_of_content_pdf" => $table_of_content_pdf,
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Book Added Successfully!'
        ]);

        return redirect()->route('backend.publication.index');
    }

    public function render()
    {
        $disciplines=DB::table('disciplines')->orderBy('id','asc')->get();
        $publication_type=DB::table('publication_type')->orderBy('id','asc')->get();
        return view('livewire.publications.add',compact('disciplines','publication_type'))
        ->layout('home')
        ->slot('slot');
    }
}
