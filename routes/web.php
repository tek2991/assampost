<?php

use App\Models\Download;
use App\Models\Event;
use App\Models\Link;
use App\Models\Notice;
use Illuminate\Support\Facades\Route;
use App\Models\Office;
use App\Models\OtherOffice;
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

Route::get('/administrative-office',function(){
    $offices = Office::paginate(10);
    return view('administrative-office',compact('offices'));
    
});

Route::get('/other-office',function(){
    $offices = OtherOffice::paginate(10);
    return view('other-office',compact('offices'));
});

Route::get('/event',function(){
    $events = Event::where('is_active',1)->paginate(1);
    return view('events',compact('events'));
});

Route::get('/event/{slug}',function(){
    $event = Event::where('slug',request()->slug)->orderBy('id','desc')->first();
    return view('event-detail',compact('event'));
})->name('event.detail');

Route::get('/notice',function(){
    $notices = Notice::where('is_active',1)->orderBy('id','desc')->paginate(10);
    return view('notice',compact('notices'));
});

Route::get('/downloads',function(){
    $downloads = Download::where('is_active',1)->orderBy('id','desc')->paginate(10);
    return view('downloads',compact('downloads'));
});

Route::get('/links',function(){
    $links = Link::where('is_active',1)->orderBy('id','desc')->paginate(10);
    return view('links',compact('links'));
});

Route::get('/about',function(){
    return view('about');
});


Route::get('/mail-services',function(){
    return view('mail-services');
});

Route::get('/banking-services',function(){
    return view('banking-services');
});

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['prefix'=>'admin/office','middleware'=>'auth'],function(){
    Route::get('/', [App\Http\Controllers\Admin\OfficeController::class, 'index'])->name('admin.office.index');
    Route::get('/create', [App\Http\Controllers\Admin\OfficeController::class, 'create'])->name('admin.office.create');
    Route::post('/store', [App\Http\Controllers\Admin\OfficeController::class, 'store'])->name('admin.office.store');
    Route::get('/edit/{office}', [App\Http\Controllers\Admin\OfficeController::class, 'edit'])->name('admin.office.edit');
    Route::post('/update/{office}', [App\Http\Controllers\Admin\OfficeController::class, 'update'])->name('admin.office.update');
    Route::delete('/delete/{office}', [App\Http\Controllers\Admin\OfficeController::class, 'destroy'])->name('admin.office.destroy');
});
Route::group(['prefix'=>'admin/other-office','middleware'=>'auth'],function(){
    Route::get('/', [App\Http\Controllers\Admin\OtherOfficeController::class, 'index'])->name('admin.other-office.index');
    Route::get('/create', [App\Http\Controllers\Admin\OtherOfficeController::class, 'create'])->name('admin.other-office.create');
    Route::post('/store', [App\Http\Controllers\Admin\OtherOfficeController::class, 'store'])->name('admin.other-office.store');
    Route::get('/edit/{otherOffice}', [App\Http\Controllers\Admin\OtherOfficeController::class, 'edit'])->name('admin.other-office.edit');
    Route::post('/update/{otherOffice}', [App\Http\Controllers\Admin\OtherOfficeController::class, 'update'])->name('admin.other-office.update');
    Route::delete('/delete/{otherOffice}', [App\Http\Controllers\Admin\OtherOfficeController::class, 'destroy'])->name('admin.other-office.destroy');
});

Route::group(['prefix'=>'admin/events','middleware'=>'auth'],function(){
    Route::get('/', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin.event.index');
    Route::get('/create', [App\Http\Controllers\Admin\EventController::class, 'create'])->name('admin.event.create');
    Route::post('/store', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('admin.event.store');
    Route::get('/edit/{event}', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('admin.event.edit');
    Route::post('/update/{event}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/delete/{event}', [App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('admin.event.destroy');
    Route::post('/publish/{event}', [App\Http\Controllers\Admin\EventController::class, 'publish'])->name('admin.event.publish');
    Route::post('/unpublish/{event}', [App\Http\Controllers\Admin\EventController::class, 'unpublish'])->name('admin.event.unpublish');
});

Route::group(['prefix'=>'admin/notices','middleware'=>'auth'],function(){
    Route::get('/', [App\Http\Controllers\Admin\NoticeController::class, 'index'])->name('admin.notice.index');
    Route::get('/create', [App\Http\Controllers\Admin\NoticeController::class, 'create'])->name('admin.notice.create');
    Route::post('/store', [App\Http\Controllers\Admin\NoticeController::class, 'store'])->name('admin.notice.store');
    Route::get('/edit/{notice}', [App\Http\Controllers\Admin\NoticeController::class, 'edit'])->name('admin.notice.edit');
    Route::post('/update/{notice}', [App\Http\Controllers\Admin\NoticeController::class, 'update'])->name('admin.notice.update');
    Route::delete('/delete/{notice}', [App\Http\Controllers\Admin\NoticeController::class, 'destroy'])->name('admin.notice.destroy');
    Route::post('/publish/{notice}', [App\Http\Controllers\Admin\NoticeController::class, 'publish'])->name('admin.notice.publish');
    Route::post('/unpublish/{notice}', [App\Http\Controllers\Admin\NoticeController::class, 'unpublish'])->name('admin.notice.unpublish');
});

Route::group(['prefix'=>'admin/downloads','middleware'=>'auth'],function(){
    Route::get('/', [App\Http\Controllers\Admin\DownloadController::class, 'index'])->name('admin.download.index');
    Route::get('/create', [App\Http\Controllers\Admin\DownloadController::class, 'create'])->name('admin.download.create');
    Route::post('/store', [App\Http\Controllers\Admin\DownloadController::class, 'store'])->name('admin.download.store');
    Route::get('/edit/{download}', [App\Http\Controllers\Admin\DownloadController::class, 'edit'])->name('admin.download.edit');
    Route::post('/update/{download}', [App\Http\Controllers\Admin\DownloadController::class, 'update'])->name('admin.download.update');
    Route::delete('/delete/{download}', [App\Http\Controllers\Admin\DownloadController::class, 'destroy'])->name('admin.download.destroy');
    Route::post('/publish/{download}', [App\Http\Controllers\Admin\DownloadController::class, 'publish'])->name('admin.download.publish');
    Route::post('/unpublish/{download}', [App\Http\Controllers\Admin\DownloadController::class, 'unpublish'])->name('admin.download.unpublish');
});

Route::group(['prefix'=>'admin/links','middleware'=>'auth'],function(){
    Route::get('/', [App\Http\Controllers\Admin\LinkController::class, 'index'])->name('admin.link.index');
    Route::get('/create', [App\Http\Controllers\Admin\LinkController::class, 'create'])->name('admin.link.create');
    Route::post('/store', [App\Http\Controllers\Admin\LinkController::class, 'store'])->name('admin.link.store');
    Route::get('/edit/{link}', [App\Http\Controllers\Admin\LinkController::class, 'edit'])->name('admin.link.edit');
    Route::post('/update/{link}', [App\Http\Controllers\Admin\LinkController::class, 'update'])->name('admin.link.update');
    Route::delete('/delete/{link}', [App\Http\Controllers\Admin\LinkController::class, 'destroy'])->name('admin.link.destroy');
    Route::post('/publish/{link}', [App\Http\Controllers\Admin\LinkController::class, 'publish'])->name('admin.link.publish');
    Route::post('/unpublish/{link}', [App\Http\Controllers\Admin\LinkController::class, 'unpublish'])->name('admin.link.unpublish');
});
Route::group(['middleware'=>'auth'],function(){
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
});

Route::group(['prefix' => 'admin/banner'],function(){
    Route::get('/', [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('admin.banner.index');
    Route::get('/create', [App\Http\Controllers\Admin\BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('/store', [App\Http\Controllers\Admin\BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('/edit/{banners}', [App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::post('/update/{banners}', [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('admin.banner.update');
    Route::delete('/delete/{banners}', [App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('admin.banner.destroy');
});
Route::get('/my-activity', [App\Http\Controllers\HomeController::class, 'activity'])->name('admin.my-activity')->middleware('auth');
    