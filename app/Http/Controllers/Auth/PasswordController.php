<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Hash;
use Illuminate\Validation\Rules\Password;
use App\Helper\Helper;
use Illuminate\Support\Facades\Session;
class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.change-password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'current_password' => 'required',
            'password' =>  ['required'],
            'password_confirmation' => 'required',
          ]);
          try{
            $user = Auth::user();
            $passphrase = (Session::has("admin_login_crypt_change") ? Session::get("admin_login_crypt_change") : null);
            $password = Helper::cryptoJsAesDecrypt($passphrase, $request->current_password);
            $new_password = Helper::cryptoJsAesDecrypt($passphrase, $request->password);
            $password_confirmation = Helper::cryptoJsAesDecrypt($passphrase, $request->password_confirmation);
            if($new_password != $password_confirmation){
                return redirect()->back()->with('error', 'New Password and Confirm Password does not match');
            }
            
            if (strlen($new_password) < 6) {
                return back()->with('error', "Password required minimum 6 characters");
            }
        
            if (!preg_match("#[0-9]+#", $new_password)) {
                return back()->with('error',"Password must include at least one number!");
            }
        
            if (!preg_match("#[a-zA-Z]+#", $new_password)) {
                return back()->with('error',"Password must include at least one letter!");
            }

            if (!Hash::check($password, $user->password)) {
                return back()->with('error', 'Current password does not match!');
            }
            //dd($password."=======".$new_password);
            

            $user->password = Hash::make($new_password);
            $user->save();
            auth()->logoutOtherDevices($new_password);
            Auth::logout();
            'App\Helper\Helper'::addToLog("Password Changed for user: {$user->name}");
            return redirect()->route('login')->with('success', 'Password changed successfully!');
          }
          catch(\Exception $e){
            return back()->with('error', $e->getMessage());
          }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
