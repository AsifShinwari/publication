<?php

namespace App\Http\Livewire\Publications;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Edit extends Component
{
    use withFileUploads;

    public $image;
    public $book_pdf;
    public $table_of_content_pdf;
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function update($data){
        
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('publications_images',$fileNewName );
            
            $imageName='publications_images/'.$fileNewName;

            DB::table('publications')
            ->where('id',$this->selected_id)
            ->update([
               "image" => $imageName,
            ]);
        }

        if($this->book_pdf!=null){
            $file_ext=$this->book_pdf->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->book_pdf->storeAs('publications_book_pdf',$fileNewName );
            
            $book_pdf='publications_book_pdf/'.$fileNewName;

            DB::table('publications')
            ->where('id',$this->selected_id)
            ->update([
               "book_pdf" => $book_pdf,
            ]);
        }

        if($this->table_of_content_pdf!=null){
            $file_ext=$this->table_of_content_pdf->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->table_of_content_pdf->storeAs('book_table_of_contents_pdf',$fileNewName );
            
            $table_of_content_pdf='book_table_of_contents_pdf/'.$fileNewName;

            DB::table('publications')
            ->where('id',$this->selected_id)
            ->update([
               "table_of_content_pdf" => $table_of_content_pdf,
            ]);
        }
        
        DB::table('publications')
        ->where('id',$this->selected_id)
        ->update([
           "title" => $data["title"],
           "author" => $data["author"],
           "isbn" => $data["isbn"],
           "doi" => $data["doi"],
           "pages" => $data["pages"],
           "year_of_publication" => $data["year_of_publication"],
           "publication_type_id" => $data["publication_type_id"],
           "discipline_id" => $data["discipline"],
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Book Updated Successfully!'
        ]);

        return redirect()->route('backend.publication.index');
    }

    public function render()
    {
        $publication_type=DB::table('publication_type')->orderBy('id','asc')->get();
        $disciplines = DB::table('disciplines')->orderBy('id','asc')->get();
        $data=DB::table('publications')->where('id',$this->selected_id)->first();
        return view('livewire.publications.edit',compact('data','disciplines','publication_type'))
        ->layout('home')
        ->slot('slot');
    }
}
