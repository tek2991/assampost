<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TimeSlot;
use App\Models\Appointment;
use App\Models\CounterService;

class BookAppointment extends Component
{
    public $timeSlots;
    public $counterServices;

    public $services = [];
    public $errors = [];
    public $appointments = [];
    public $bookedTimeSlotIds = [];
    public $success = '';

    public $serviceId;
    public $name;
    public $email;
    public $phone;
    public $date;
    public $timeSlotId;
    public $isExistingCustomer;
    public $accountNumber;

    public $cutoffTime = null;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');

        $this->loadServices();
        $this->loadTimeSlots();
        $this->setCutOffTime();

        $this->getbookedTimeSlotIds();

        $this->setDefaultService();

        $this->unselectTimeSlot();
        $this->getbookedTimeSlotIds();

    }

    public function setCutOffTime()
    {
        // Current time in IST
        $now = now()->setTimezone('Asia/Kolkata');

        // Set cut off time to 1 HR after current time
        $this->cutoffTime = $now->addHours(1)->format('H:i');
    }

    public function loadServices()
    {
        $this->services = CounterService::get();
    }

    public function loadTimeSlots()
    {
        $this->timeSlots = TimeSlot::where('is_functional', true)->get();
    }

    public function fetchAppointments($counter_service_id)
    {
        $this->appointments = Appointment::where('counter_service_id', $counter_service_id)
            ->where('date', $this->date)
            ->get();
    }

    public function setDefaultService()
    {
        $this->serviceId = $this->services->first()->id;
    }

    public function getbookedTimeSlotIds()
    {
        // service_id and date are required
        if (!$this->serviceId || !$this->date) {
            return;
        }

        $this->fetchAppointments($this->serviceId);

        $this->bookedTimeSlotIds = $this->appointments->pluck('time_slot_id')->toArray();
    }

    public function updatedServiceId()
    {
        // $this->unselectTimeSlot();
        // $this->getbookedTimeSlotIds();
    }

    public function updatedDate()
    {
        $this->unselectTimeSlot();
        $this->getbookedTimeSlotIds();
    }

    public function unselectTimeSlot()
    {
        $this->timeSlotId = null;
    }

    public function verifyTimeSlot()
    {
        // refresh booked time slots
        $this->getbookedTimeSlotIds();

        if (in_array($this->timeSlotId, $this->bookedTimeSlotIds)) {
            $this->addError('timeSlotId', 'This time slot is already booked.');
        }
    }

    public function setSuccessMessage($message)
    {
        // remove errors
        $this->errors = [];
        $this->success = $message;
    }

    public function resetForm()
    {
        // $this->serviceId = null;
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->date = now()->format('Y-m-d');
        $this->timeSlotId = null;
    }

    public function bookAppointment()
    {
        $this->validate([
            'serviceId' => 'required',
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'date' => 'required',
            'timeSlotId' => 'required',
            'isExistingCustomer' => 'required|boolean',
            'accountNumber' => 'nullable|required_if:isExistingCustomer,true',
        ]);

        $this->verifyTimeSlot();

        $message = $this->isExistingCustomer ? 'Existing customer. Account number: ' . $this->accountNumber : 'New customer.';

        $appointment = Appointment::create([
            'counter_service_id' => $this->serviceId,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date' => $this->date,
            'time_slot_id' => $this->timeSlotId,
            'is_existing_customer' => $this->isExistingCustomer,
            'account_number' => $this->accountNumber,
            'message' => $message,
        ]);

        $this->resetForm();

        $this->getbookedTimeSlotIds();

        $this->setSuccessMessage('Appointment booked successfully. Booking ID: ' . $appointment->id);

        $this->unselectTimeSlot();
        $this->getbookedTimeSlotIds();
    }

    public function render()
    {
        return view('livewire.book-appointment');
    }
}
