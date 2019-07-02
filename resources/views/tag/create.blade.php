@extends('layouts.app')

@section('content')
<h2>New Tag</h2>
<hr>
<div class="row" style="">
    <div class="col-12 col-sm-8 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
        <form action="{{route('tag.store')}}" method="POST">
            @csrf
            <div class="form-group col-12">
                <label for="name">Name 
                    @if($errors->has('name')) 
                        <label class="alert-danger">{{$errors->first('name')}}</label> 
                    @endif
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
            
        </form>
    </div>
</div>
@endsection
