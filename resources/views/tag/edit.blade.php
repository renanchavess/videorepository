@extends('layouts.app')

@section('content')
<div class="row">
    <form action="{{route('video.update')}}">
        <input type="hidden" name="id" value="{{$tag->name}}">
        <div class="form-group col-12">
            <label for="name">Name 
                @if($errors->has('name')) 
                    <label class="alert-danger">{{$errors->first('name')}}</label> 
                @endif
            </label>
            <input type="text" name="name" id="name" value="{{ $tag->name}}"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-info" type="button" id="btnSubmit">Save</button>                    
            </div>
        </div>
    </form>
</div>
@endsection
