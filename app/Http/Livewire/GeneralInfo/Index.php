<?php

namespace App\Http\Livewire\GeneralInfo;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Index extends Component
{
    use withFileUploads;
    public $logo;
     
    public function update($data){
        
        if($this->logo!=null){
            $file_ext=$this->logo->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->logo->storeAs('app_logo',$fileNewName );
            
            DB::table('general_info')->orderBy('id','desc')->update([
                'app_logo'=>'app_logo/'.$fileNewName,
            ]);
        }

        DB::table('general_info')->orderBy('id','desc')->update([
            'app_name'=>$data['app_name'],
            'app_abbr'=>$data['app_abbr'],
            'email'=>$data['email'],
            'office_address'=>$data['office_address'],
            'whatsapp'=>$data['whatsapp'],
        ]);
 
        $this->emit('message', [
            'type'    => 'success',
            'title'   => 'Information Updated Successfully!', 
        ]);
    }
    public function render()
    {
        $general_info=DB::table('general_info')->orderBy('id','desc')->first();
        return view('livewire.general-info.index',compact('general_info'))
        ->layout('home')
        ->slot('slot');
    }
}
