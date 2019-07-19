@extends('layouts.app')

@section('content')
<h2>New Video</h2>
<hr>
<div class="row" style="">
    <div class="col-12 col-sm-8 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
        <form action="{{route('video.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-12">
                <label for="name">Title 
                    @if($errors->has('title')) 
                        <label class="alert-danger">{{$errors->first('title')}}</label> 
                    @endif
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}">
            </div>
            <div class="form-group col-12">
                <label for="tags">Tags 
                    @if($errors->has('tags')) 
                        <label class="alert-danger">{{$errors->first('tags')}}</label> 
                    @endif
                </label>
                <select name="tags[]" multiple class="form-control">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-12">
                <label for="low">Video Low 360p
                    @if($errors->has('low')) 
                        <label class="alert-danger">{{$errors->first('low')}}</label> 
                    @endif
                </label>
                <input type="file" name="low" id="low" value="{{ old('low') }}"
                class="form-control {{ $errors->has('low') ? 'is-invalid' : ''}}">
            </div>

            <div class="form-group col-12">
                <label for="medium">Video Medium 480p
                    @if($errors->has('medium')) 
                        <label class="alert-danger">{{$errors->first('medium')}}</label> 
                    @endif
                </label>
                <input type="file" name="medium" id="medium" value="{{ old('medium') }}"
                class="form-control {{ $errors->has('medium') ? 'is-invalid' : ''}}">
            </div>

            <div class="form-group col-12">
                <label for="high">Video High 720p
                    @if($errors->has('high')) 
                        <label class="alert-danger">{{$errors->first('high')}}</label> 
                    @endif
                </label>
                <input type="file" name="high" id="high" value="{{ old('high') }}"
                class="form-control {{ $errors->has('high') ? 'is-invalid' : ''}}">
            </div>

            <div class="form-group col-12">
                <label for="video">Thumbnail 
                    @if($errors->has('thumbnail')) 
                        <label class="alert-danger">{{$errors->first('thumbnail')}}</label> 
                    @endif
                </label>
                <input type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail') }}"
                class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : ''}}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
            
        </form>
    </div>
</div>
@endsection