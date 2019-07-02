<?php

namespace App\Http\Controllers;

use App\Video;
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
        return view('video.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
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

        $path_low       = NULL;
        $path_medium    = NULL;
        $path_high      = NULL;

        if(!empty($request->file('low')))
            $path_low       =  $request->file('low')->store('videos/low', 'public');//360px
        
        if(!empty($request->file('medium')))
            $path_medium    =  $request->file('medium')->store('videos/medium', 'public');//480px
        
        if(!empty($request->file('high')))
            $path_high      =  $request->file('high')->store('videos/high', 'public');//720px

        $path_thumbnail =  $request->file('thumbnail')->store('images/thumbnail', 'public');
        
        $video = new Video();
        $video->title       = $request->input('title');
        $video->status      = 1;
        $video->views       = 0;
        $video->low         = $path_low; 
        $video->medium      = $path_medium; 
        $video->high        = $path_high;        
        $video->thumbnail   = $path_thumbnail;
        
        if($video->save())
            return redirect('/video/create');
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
    public function destroy(Video $video)
    {
        //
    }
}
