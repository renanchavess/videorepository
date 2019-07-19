@extends('layouts.app')

@section('content')
<div class="container" style="background-color:green;">
    <div class="row">
        <div class="col-12 col-md-8">
            @if(!empty($video))
                <video poster="" style="width:720px; height:480px;" controls style="">                                   
                    @if(!empty($video->low))
                        <source src="{{'/storage/'.$video->low}}" type="video/mp4">
                    @endif
                    @if(!empty($video->medium))
                        <source src="{{'/storage/'.$video->medium}}" type="video/mp4">
                    @endif
                    @if(!empty($video->high))
                        <source src="{{'/storage/'.$video->high}}" type="video/mp4">
                    @endif
                </video>
            @endif
        </div>
        <div class="col-12 col-md-4" style="background-color:red;">
            AD
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                @foreach($others as $video)
                    <a href="{{ route('video.show', ['id' => $video->id]) }}">
                        <img src="{{'/storage/'.$video->thumbnail}}" alt="tumblenail" style="max-width:400px; max-height:360px; width: auto; height: auto;">
                    </a>                
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        @media screen and (min-width: 400px) {
            video{
                margin: 0 auto;
                max-width:360px;
                max-height:270px;                
                background-color: black;
            }
        }

        @media screen and (min-width: 800px) {
            video{
                margin: 0 auto;
                max-width:720px;
                max-height:480px;                
                background-color: black;
            }
        }
    </style>
@endsection