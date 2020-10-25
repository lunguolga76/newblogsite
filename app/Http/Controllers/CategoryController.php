<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    public function show($slug){
        Paginator::useBootstrap();

        $category=Category::where('slug',$slug)->firstOrFail();
        $posts=$category->posts()->orderBy('id','desc')->paginate(2);

        return view('categories.show', compact('category','posts'));

    }
}
