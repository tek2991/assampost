<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/mail-services', function () {
    return view('mail-services');
});

Route::get('/banking-services', function () {
    return view('banking-services');
});

Route::get('/contact-admin', function () {
    return view('contact-admin');
});

Route::get('/contact-office', function () {
    return view('contact-office');
});

Route::get('/exhibitions', function () {
    return view('exhibitions');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('notifications', function () {
    return view('notifications');
});

Route::get('/resources', function () {
    return view('resources');
});

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
