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

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin/office'],function(){
    Route::get('/', [App\Http\Controllers\Admin\OfficeController::class, 'index'])->name('admin.office.index');
    Route::get('/create', [App\Http\Controllers\Admin\OfficeController::class, 'create'])->name('admin.office.create');
    Route::post('/store', [App\Http\Controllers\Admin\OfficeController::class, 'store'])->name('admin.office.store');
    Route::get('/edit/{office}', [App\Http\Controllers\Admin\OfficeController::class, 'edit'])->name('admin.office.edit');
    Route::post('/update/{office}', [App\Http\Controllers\Admin\OfficeController::class, 'update'])->name('admin.office.update');
    Route::delete('/delete/{office}', [App\Http\Controllers\Admin\OfficeController::class, 'destroy'])->name('admin.office.destroy');
});
Route::group(['prefix'=>'admin/other-office'],function(){
    Route::get('/', [App\Http\Controllers\Admin\OtherOfficeController::class, 'index'])->name('admin.other-office.index');
    Route::get('/create', [App\Http\Controllers\Admin\OtherOfficeController::class, 'create'])->name('admin.other-office.create');
    Route::post('/store', [App\Http\Controllers\Admin\OtherOfficeController::class, 'store'])->name('admin.other-office.store');
    Route::get('/edit/{otherOffice}', [App\Http\Controllers\Admin\OtherOfficeController::class, 'edit'])->name('admin.other-office.edit');
    Route::post('/update/{otherOffice}', [App\Http\Controllers\Admin\OtherOfficeController::class, 'update'])->name('admin.other-office.update');
    Route::delete('/delete/{otherOffice}', [App\Http\Controllers\Admin\OtherOfficeController::class, 'destroy'])->name('admin.other-office.destroy');
});
