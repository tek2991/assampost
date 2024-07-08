<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeSlot;
use App\Models\Appointment;
use App\Models\CounterService;

class ManageAppointment extends Component
{
    public $appointments = [];
    public $appointmentTimeslotIds = [];
    public $timeSlots = [];
    public $date = '';

    public function mount()
    {
        // Set the date to today
        $this->date = date('Y-m-d');

        $this->loadTimeSlots();

        $this->loadAppmointments();
    }

    public function loadTimeSlots()
    {
        // Load all time slots
        $this->timeSlots = TimeSlot::where('is_functional', true)->get();
    }

    public function loadAppmointments()
    {
        // Load all appointments for today
        $this->appointments = Appointment::where('date', $this->date)->get();
        // Get all appointment's timeslot ids
        $this->appointmentTimeslotIds = $this->appointments->pluck('time_slot_id')->toArray();
    }

    public function updatedDate()
    {
        $this->loadAppmointments();
    }


    public function render()
    {
        return view('livewire.manage-appointment');
    }
}
