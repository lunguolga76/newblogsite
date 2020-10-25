<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index(){
        Paginator::useBootstrap();

        $posts=Post::with('category')->orderBy('id','desc')->paginate(2);

        return view('posts.index',compact('posts'));
    }
    public function show($slug){
        $post=Post::where('slug',$slug)->firstOrFail();
        $post->views +=1;
        $post->update();
        return view('posts.show', compact('post'));
    }
}
