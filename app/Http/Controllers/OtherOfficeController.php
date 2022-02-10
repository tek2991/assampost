<?php

namespace App\Http\Controllers;

use App\Models\OtherOffice;
use Illuminate\Http\Request;

class OtherOfficeController extends Controller
{
    public function index(Request $request){
        $offices = OtherOffice::paginate(10);
        return view('other-office',compact('offices'));
    }
}
