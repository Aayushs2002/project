<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $newes = News::get();
        return view('frontend.index',compact('newes'));
    }

    public function single($slug){
        $news = News::where('slug',$slug)->first();
        return view('frontend.singlepage',compact('news'));
    }

    public function comment(Request $request){
        $req = $request->all();
        // dd($req);

        Comment::create($req);
        return redirect()->back();

    }
}
