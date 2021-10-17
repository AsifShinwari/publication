<?php

namespace App\Http\Livewire\Events;

use Livewire\Component;
use DB;

class Edit extends Component
{
    public $event_id;
    public $country_id;
    public $start_date;
    public $end_date;
    public $deadline_reg_date;
    
    public function mount($event_id){
        $this->event_id=$event_id;
    }

    public function update($data){

        $this->country_id=$data['country_id'];
        $this->start_date=$data['start_date'];
        $this->end_date=$data['end_date'];
        $this->deadline_reg_date=$data['deadline_reg_date'];

        $this->validate([
            'country_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'deadline_reg_date'=>'required',
        ]);

        DB::table('events')
        ->where('id',$this->event_id)
        ->update([
            "title" => $data["title"],
            "event_type" => $data["event_type"],
            "category" => $data["category"],
            "topics" => $data["topic"],
            "province" => $data["province"],
            "city" => $data["city"],
            "country_id" => $data["country_id"],
            "organizer" => $data["organizer"],
            "contact_person_name" => $data["contact_person"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "website" => $data["website"],
            "description" => $data["description"],
            "keywords" => $data["keywords"],
            "start_date" => $data["start_date"],
            "end_date" => $data["end_date"],
            "deadline_reg_date" => $data["deadline_reg_date"],
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Event Updated Successfully!'
        ]);

        return redirect()->route('backend.events');
    }
   

    public function render()
    {
        $event=DB::table('events')->where('id',$this->event_id)->first();

        $countries=DB::table('countries')->orderBy('name','asc')->get();

        return view('livewire.events.edit', compact('event','countries'))
        ->layout('home')
        ->slot('slot');
    }
}
