<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {

    }
    
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact(['tags']));
    }


    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'          => 'required|min:2|max:10',            
        ];            
        $request->validate($rules);

        $tag = new Tag();
        $tag->name = $request->input('name');
        
        if($tag->save())
            return redirect('/tag/create');
        else
            return view('tag.create');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        //
    }

    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        //
    }
}
