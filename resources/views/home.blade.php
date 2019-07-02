@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:30px">
    <div class="row justify-content-center">
        <div class="col-12">
            @foreach($videos as $video)
                <a href="{{ route('video.show', ['id' => $video->id]) }}">
                    <img src="{{'/storage/'.$video->thumbnail}}" alt="tumblenail" style="max-width:400px; max-height:360px; width: auto; height: auto;">
                </a>                
            @endforeach
        </div>
    </div>
</div>
@endsection