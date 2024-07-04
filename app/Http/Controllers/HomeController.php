<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Event;
use App\Models\LogActivity;
use App\Models\Notice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::where('is_active',1)->count();
        $notices = Notice::where('is_active',1)->count();
        $downloads = Download::where('is_active',1)->count();
        $my_activity = LogActivity::where('user_id',auth()->id())->where('created_at','like','%'.date('Y-m-d').'%')->count();
        $log_activities = LogActivity::take(5)->orderBy('id','desc')->get();
        return view('admin/home',compact('log_activities','events','notices','downloads','my_activity'));
    }

    public function activity(Request $request)
    {
        $log_activities = LogActivity::when($request->title,function() use ($request){
            return LogActivity::where('subject','like','%'.$request->title.'%');
        })->orderBy('id','desc')->paginate(50);
        return view('admin.activity.index',compact('log_activities'));
    }
}
