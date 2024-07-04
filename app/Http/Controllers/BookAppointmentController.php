<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Models\CounterService;

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
}
