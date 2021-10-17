<?php

namespace App\Http\Livewire\HomePage;

use Livewire\Component;
use DB;
use Livewire\WithFileUploads;
class Index extends Component
{
    use WithFileUploads;
    public $banner_image;
    public $mentor_banner_image;

    public function update($data){
   
        if($this->banner_image!=null){
            $file_ext=$this->banner_image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->banner_image->storeAs('home_page_banner_images',$fileNewName );
            
            DB::table('home_page')->orderBy('id','desc')->update([
                'banner_image'=>'home_page_banner_images/'.$fileNewName,
            ]);
        }

        if($this->mentor_banner_image!=null){
            $file_ext=$this->mentor_banner_image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->mentor_banner_image->storeAs('home_page_banner_images',$fileNewName );
            
            DB::table('home_page')->orderBy('id','desc')->update([
                'mentor_banner_image'=>'home_page_banner_images/'.$fileNewName,
            ]);
        }
        
        DB::table('home_page')->orderBy('id','desc')->update([
            'banner_title'=>$data['banner_title'],
            'banner_subtitle'=>$data['banner_subtitle'],
            'banner_card1'=>$data['banner_card1'],
            'banner_card2'=>$data['banner_card2'],
            'banner_card3'=>$data['banner_card3'],
            'mentor_message'=>$data['mentor_message'],
            'mentor_title_message'=>$data['mentor_title_message'],
            'banner_card_title1'=>$data['banner_card_title1'],
            'banner_card_title2'=>$data['banner_card_title2'],
            'banner_card_title3'=>$data['banner_card_title3'],
            'join_us_banner_title'=>$data['join_us_banner_title'],
        ]);

        // $this->emit('resetFormCloseModel', [
        //     'formName'    => 'addNewSubMenuForm',
        //     'model'    => 'close',//close or not close
        //     'clearForm' => 'yes' //use yes or no
        // ]);

        $this->emit('message', [
            'type'    => 'success',
            'title'   => 'Information Updated Successfully!', 
        ]);

    }
    public function render()
    {
        $home_page=DB::table('home_page')->orderBy('id','desc')->first();
        return view('livewire.home-page.index', compact('home_page'))
        ->layout('home')
        ->slot('slot');
    }
}
