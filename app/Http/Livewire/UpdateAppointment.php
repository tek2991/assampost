<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeSlot;
use App\Models\Appointment;
use App\Models\CounterService;

class UpdateAppointment extends Component
{
    public $errors = [];
    public $success = '';

    public $appointment = null;

    public $status = null;
    public $confirmed = null;

    public $can_update = false;

    public function mount($appointment_id)
    {
        $this->appointment = Appointment::find($appointment_id);

        if($this->appointment) {
            if($this->appointment->status == 'pending') {
                $this->can_update = true;
            }else{
                $this->errors[] = 'Appointment cannot be updated once confirmed!';
            }
        } else {
            $this->errors[] = 'Appointment not found';
        }
    }

    public function setSuccessMessage($message)
    {
        // remove errors
        $this->errors = [];
        $this->succeess = $message;
    }

    public function updateAppointment()
    {
        $this->validate([
            'status' => 'required',
            'confirmed' => 'required',
        ]);
        $this->appointment->update([
            'status' => $this->status,
            'user_id' => auth()->id(),
        ]);

        $this->setSuccessMessage('Appointment updated successfully');

        $this->can_update = false;
    }

    public function render()
    {
        return view('livewire.update-appointment');
    }
}
