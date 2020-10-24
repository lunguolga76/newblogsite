<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $tags=Tag::paginate(12);
        //dd($categories);
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
        ]);
        Tag::create($request->all());
//        $request->session()->flash('success', 'Tag was added');
        return redirect()->route('tags.index')->with('success','Tag was added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
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
        $request->validate([
            'title'=>'required',
        ]);
        $tag=Tag::find($id);
        //If the wont to change the unigue slug
        //$category->slug=null;
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success','Tag title was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::find($id);
        if ($tag->posts->count()){
            return redirect()->route('tags.index')->with('error','Error! The Tag has article');
        }
        $tag->delete();
        return redirect()->route('tags.index')->with('success','Tag  was deleted');

    }
}
