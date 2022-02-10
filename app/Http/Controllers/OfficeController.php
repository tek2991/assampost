<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index(Request $request){
        $offices = Office::paginate(10);
        return view('administrative-office', compact('offices'));
    }
}
