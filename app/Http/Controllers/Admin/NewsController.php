<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $user = Auth::user();
  
        if ($user->isSuperUser()) {
            $newes = News::all();
      
        } else {
            $categoryIds = $user->categories->pluck('id');
            $newes = News::whereIn('category_id', $categoryIds)->get();
            // dd($news);
        }
        // $newes = News::get();
        return view('admin.news.index', compact('newes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

    //   dd($user->isSuperUser());
        if ($user->isSuperUser()) {
            $categories = Category::get();
      
        } else {
            $categoryIds = $user->categories->pluck('id');
            $categories = Category::whereIn('id', $categoryIds)->get();
            // dd($categories);
            // dd($news);
        }
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $image = $this->fileUpload($request, 'image');

        $req = $request->all();
        // dd($req);
        $req['slug'] = Str::slug($request->title);

        $req['image'] = $image;

        News::create($req);


        return redirect()->route('news.index')->with('success', 'news Added');
    }

    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($request->file($name)) {
            $image = $request->file($name);
            $destinationPath = public_path() . '/images';
            $imageName = date('YmdHis') . $name . "." . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
        }
        return $imageName;
    }
    public function imageDelete($filePath)
    {
        $destinationPath = public_path('/images');

        if (file_exists($destinationPath . $filePath)) {
            unlink($destinationPath . $filePath);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        // dd($news);
        $categories = Category::get();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $req = $request->all();
        if ($request->hasFile('image')) {
            // dd("adad");
            $this->imageDelete($news->image);
            $image = $this->fileUpload($request, 'image');
        } else {
            $image = $news->image;
        }
        $req['image'] = $image;

        $req['slug'] = Str::slug($request->title);
        $news->update($req);


        return redirect()->route('news.index')->with('success', 'News Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // dd($news);
        $this->imageDelete($news->image);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News Deleted');
    }
}
