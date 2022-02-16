<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\GalleryPicture;
use Illuminate\Support\Facades\Validator;
use Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $events = Event::orderBy('id', 'desc')->when($request->title, function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->title . '%');
        })->paginate(20);
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('admin.event.create', compact('categories'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'category_id' => 'required|numeric',
                'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gallary_picture.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            if ($request->has('picture')) {
                $file = $request->file('picture');
                $name = time() . $file->getClientOriginalName();
                $filename = asset('/events-images/') . '/' . $name;
                $file->move(public_path() . '/events-images/', $name);
            } else {
                $filename = null;
            }
            $event = new Event();
            $event->title = $request->title;
            $event->picture = $filename;
            $event->category_id = $request->category_id;
            $event->slug = Str::slug($request->title);
            $event->brief_description = $request->brief_description;
            $event->description = $request->description;
            $event->save();
            if ($request->has('gallary_picture')) {
                foreach ($request->file('gallary_picture') as $file) {
                    $name = time() . rand(1, 100) . '.' . $file->getClientOriginalName();
                    $file_path = asset('/events-images/' . Str::slug($request->title)) . '/' . $name;
                    $file->move(public_path() . '/events-images/' . Str::slug($request->title), $name);
                    $galary['event_id'] = $event->id;
                    $galary['file_path'] = $file_path;
                    GalleryPicture::create($galary);
                }
            }
            'App\Helper\Helper'::addToLog("Created Event: {$request->title}");
            return redirect()->route('admin.event.index')->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
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
        $event = Event::find($id);
        $categories = Category::get();
        return view('admin.event.edit', compact('event', 'categories'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $event = Event::find($id);
            if ($request->has('picture')) {
                $file = $request->file('picture');
                $name = time() . $file->getClientOriginalName();
                $filename = asset('/events-images/') . '/' . $name;
                $file->move(public_path() . '/events-images/', $name);
            } else {
                $filename = $event->picture;
            }
            $event->title = $request->title;
            $event->picture = $filename;
            $event->category_id = $request->category_id;
            $event->brief_description = $request->brief_description;
            $event->description = $request->description;
            $event->save();
            'App\Helper\Helper'::addToLog("Updated Event: {$request->title}");
            return redirect()->route('admin.event.index')->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
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
        try {
            $event = Event::find($id);
            $event->delete();
            'App\Helper\Helper'::addToLog("Deleted Event: {$event->title}");
            return redirect()->route('admin.event.index')->with('success', 'Event deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function publish($id)
    {
        try {
            $event = Event::find($id);
            $event->is_active = 1;
            $event->save();
            'App\Helper\Helper'::addToLog("Published Event: {$event->title}");
            return redirect()->route('admin.event.index')->with('success', 'Event published successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function unpublish($id)
    {
        try {
            $event = Event::find($id);
            $event->is_active = 0;
            $event->save();
            'App\Helper\Helper'::addToLog("Published Event: {$event->title}");
            return redirect()->route('admin.event.index')->with('success', 'Event unpublished');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
