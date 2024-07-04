<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(Request $request){
        $this->validate($request, [
            'search' => 'nullable|string|max:50',
            'category_id' => 'nullable|integer|exists:categories,id',
            'order_by' => 'nullable|string|in:asc,desc',
        ]);
        $query = Download::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('order_by')) {
            $query->orderBy('date', $request->order_by);
        }else{
            $query->orderBy('created_at', 'desc');
        }
        $downloads = $query->paginate(10);
        $categories = Category::get();
        return view('download', compact('downloads', 'categories', 'request'));
    }
}
