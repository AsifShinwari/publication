<?php

namespace App\Http\Livewire\Aboutus;

use Livewire\Component;
use DB;
use Livewire\WithFileUploads;
class Index extends Component
{
    use WithFileUploads;
    public $image;
    public $image2;

    public function update($data){
        
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('aboutus_page_images',$fileNewName );
            
            DB::table('about_us')->orderBy('id','desc')->update([
                'image'=>'aboutus_page_images/'.$fileNewName,
            ]);
        }

        if($this->image2!=null){
            $file_ext=$this->image2->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image2->storeAs('aboutus_page_images',$fileNewName );
            
            DB::table('about_us')->orderBy('id','desc')->update([
                'image2'=>'aboutus_page_images/'.$fileNewName,
            ]);
        }

            DB::table('about_us')->orderBy('id','desc')->update([
                "title" => $data["title"],
                "message" => $data["message"],
                "mission" => $data["mission"],
                "vision" => $data["vision"],
            ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Information Updated Successfully!'
        ]);

    }

    public function render()
    {
        $data=DB::table('about_us')->orderBy('id','desc')->first();
        return view('livewire.aboutus.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
