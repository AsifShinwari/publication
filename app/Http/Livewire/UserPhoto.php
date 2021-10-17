<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;
use Livewire\WithFileUploads;
use File;
class UserPhoto extends Component
{
    use WithPagination;
    use WithFileUploads;
    // use File;

    public $selected_id;
    public $user_id;
    public $name;
    public $photo_path;
    public $photo;
    public $is_profile;
    public $is_profile_changed;

    public function mount($user_id){
        $this->user_id=$user_id;
    }
    public function store($data){
        
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max 
            'name'=>'required'
        ]);

        
        $file_ext=$this->photo->getClientOriginalExtension();
        $file_name=date('Y_m_d_h_m_s_ms');
        $fileNewName=$file_name.'.'.$file_ext;
        $image=$this->photo->storeAs('user_images',$fileNewName );

        $this->name=$data['name'];

        if(isset($data['is_profile'])){
            $this->is_profile=1;
        }else{
          $this->is_profile=0;
        }
        DB::table('user_photos')->insert([
            'name'=>$this->name,
            'user_id'=>$this->user_id,
            'photo'=>$image,
            'is_profile'=>$this->is_profile,
        ]);
        
        if(isset($data['is_profile'])){
            $last_photo= DB::table('user_photos')->where('user_id',$this->user_id)->orderBy('id','desc')->first();
            DB::table('user_photos')->where('id','!=',$last_photo->id)->update(['is_profile'=>'0']);
        }
        
        $this->name='';
        $this->photo='';
        $this->is_profile='';
        session()->flash('inserted','Inserted Successfully!');
        $this->resetPage();
        $this->render();
    }

    public function change_profile($photo_id){

        DB::table('user_photos')->update(['is_profile'=>'0']);
        DB::table('user_photos')->where('id',$photo_id)->update(['is_profile'=>'1']);
        session()->flash('inserted','Profile Picture Changed Successfully!');
        $this->resetPage();
        $this->render();
    }
    public function edit($photo_id){
        $this->selected_id=$photo_id;
    }

    public function delete(){

        $image=DB::table('user_photos')->where('id',$this->selected_id)->first();
        $image_path=asset('storage/'.$image->photo);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('user_photos')->where('id',$this->selected_id)->delete();
        session()->flash('deleted','Deleted Successfully!');
        $this->resetPage();
        $this->render();
    }

    public function render()
    {
        $user_photos=DB::table('user_photos')->where('user_id',$this->user_id)->orderBy('id','desc')->get();
        return view('livewire.user-photo',compact('user_photos'))
        ->layout('home')->slot('content');
    }
}
