<?php 

namespace App\Http\Livewire\Publications;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;

class Index extends Component
{
    use withFileUploads;

    public $search;
    public $selected_id;

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('publications')
        ->where('id',$this->selected_id)
        ->delete();

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Book Deleted Successfully!'
        ]);
        
        $this->emit('resetFormCloseModel', [
            'formName'    => 'deleteModal',
            'model'    => 'close',//close or not close
            'clearForm' => 'yes' //use yes or no
        ]);
    }

    
    public function render()
    {
        $search=$this->search;

        $data=DB::table('publications')
        ->leftJoin('disciplines','publications.discipline_id','disciplines.id')
        ->leftJoin('publication_type','publications.publication_type_id','publication_type.id')
        ->when($search,function($query) use($search){
            $query->orWhere('publications.title','like','%'.$search.'%')
            ->orWhere('publications.author','like','%'.$search.'%')
            ->orWhere('publications.isbn','like','%'.$search.'%')
            ->orWhere('publications.doi','like','%'.$search.'%')
            ->orWhere('publications.year_of_publication','like','%'.$search.'%');
        })
        ->select('publications.*','disciplines.title as discipline_name',
        'disciplines.id as discipline_id','publication_type.title as pub_type_name')
        ->orderBy('id','desc')->paginate(10);

        return view('livewire.publications.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
