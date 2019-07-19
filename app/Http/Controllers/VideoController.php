<?php

namespace App\Http\Controllers;

use App\Video;
use App\Tag;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('video.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'     => 'required|min:3|max:160',
            'thumbnail' => 'required',
        ];
        $request->validate($rules);

        $pathLow       = NULL;
        $pathMedium    = NULL;
        $pathHigh      = NULL;

        if(!empty($request->file('low')))
            $pathLow       =  $request->file('low')->store('videos/low', 'public');//360px
        
        if(!empty($request->file('medium')))
            $pathMedium    =  $request->file('medium')->store('videos/medium', 'public');//480px
        
        if(!empty($request->file('high')))
            $pathHigh      =  $request->file('high')->store('videos/high', 'public');//720px

        $pathThumbnail =  $request->file('thumbnail')->store('images/thumbnail', 'public');
        
        $video = new Video();
        $video->title       = $request->input('title');
        $video->status      = 1;
        $video->views       = 0;
        $video->low         = $pathLow; 
        $video->medium      = $pathMedium; 
        $video->high        = $pathHigh;        
        $video->thumbnail   = $pathThumbnail;

        if($video->save())
        {
            $video->tags()->attach($request->input('tags'));
            return redirect('/video/create');
        }
        else
            return view('video.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if($id > 0 )
        {
            $video = Video::find($id);
            $others = Video::all();
            return view('player', compact(['video', 'others']));
        }

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $video = Video::find($id);

        if(!empty($video))
        {
            Video::where('id', $id)->delete();
        }

        return redirect(route('video.index'));
    }
}
