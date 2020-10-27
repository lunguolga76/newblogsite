<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class TagController extends Controller
{
    public function show($slug){
        Paginator::useBootstrap();

        $tag=Tag::where('slug',$slug)->firstOrFail();
        $posts=$tag->posts()->with('category')->orderBy('id','desc')->paginate(2);

        return view('tags.show', compact('tag','posts'));

    }
}
