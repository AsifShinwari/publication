<?php

namespace App\Http\Livewire\AdvisoryBoard;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Edit extends Component
{
    use withFileUploads;

    public $image;
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function update($data){
        
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('advisory_board_images',$fileNewName );
            
            $imageName='advisory_board_images/'.$fileNewName;

            DB::table('advisory_board')
            ->where('id',$this->selected_id)
            ->update([
                'image'=>$imageName
            ]);
        }

        DB::table('advisory_board')
        ->where('id',$this->selected_id)
        ->update([
            "name" => $data["name"],
            "qualification" => $data['qualification'],
            "details" => $data["details"],
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Member Updated Successfully!'
        ]);

        return redirect()->route('backend.advisory.board.index');
    }

    public function render()
    {
        $data=DB::table('advisory_board')->where('id',$this->selected_id)->first();
        return view('livewire.advisory-board.edit',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
