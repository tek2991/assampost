<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Models\CounterService;
use App\Models\Appointment;

class BookAppointmentController extends Controller
{
    public function book()
    {
        return view('book-appointment');
    }

    public function index()
    {
        return view('search-appointment');
    }

    public function manage()
    {
        // Verify if the user email is in counter_user_emails array
        $counter_user_emails = config('auth.counter_user_emails');

        if (!in_array(auth()->user()->email, $counter_user_emails)) {
            return redirect()->route('home-page');
        }

        return view('manage-appointment');
    }

    public function update($appointment_id)
    {
        // Verify if the user email is in counter_user_emails array
        $counter_user_emails = config('auth.counter_user_emails');

        if (!in_array(auth()->user()->email, $counter_user_emails)) {
            return redirect()->route('home-page');
        }

        return view('update-appointment', compact('appointment_id'));
    }
}
