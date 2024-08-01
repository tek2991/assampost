<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeSlot;
use App\Models\Appointment;
use App\Models\CounterService;

class SearchAppointment extends Component
{
    public $searchField = '';
    public $appointments = [];
    public $appointment = null;
    public $searched = false;

    public function searchAppointment()
    {
        // Do not search if search field is empty
        if (!$this->searchField) {
            return;
        }
        // Search by id or phone number
        $this->appointments = Appointment::where('id', $this->searchField)
            ->orWhere('phone', 'like', '%' . $this->searchField . '%')
            ->get();

        $this->searched = true;

        $this->appointment = null;
    }
    
    public function selectAppointment($appointment_id)
    {
        $this->appointment = Appointment::find($appointment_id);
    }

    public function render()
    {
        return view('livewire.search-appointment');
    }
}
