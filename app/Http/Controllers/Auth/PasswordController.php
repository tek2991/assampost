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
            'password' =>  ['required', 'confirmed', Password::min(6)->mixedCase()->letters()->numbers()],
            'password_confirmation' => 'required',
          ]);
          try{
            $user = Auth::user();
            $passphrase = (Session::has("admin_login_crypt_change") ? Session::get("admin_login_crypt_change") : null);
            $password = Helper::cryptoJsAesDecrypt($passphrase, $request->current_password);
            if (!Hash::check($password, $user->password)) {
                return back()->with('error', 'Current password does not match!');
            }

            $user->password = Hash::make($request->password);
            $user->save();
            auth()->logoutOtherDevices($request->password);
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
