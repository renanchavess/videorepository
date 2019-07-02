@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 col-md-6 offset-md-3 col-lg-4 offset-md-4">
        <a href="{{route('tag.create')}}" class="btn btn-success">New</a>
            @if(count($tags) > 0)
                <table class="table table-hover table-striped table-borderless">
                    <thead >
                        <tr>
                            <td>Id</td>
                            <td>Name</td>                            
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                                                
                                <td>
                                    <a class="btn btn-info" href="{{route('tag.update', $tag->id)}}">Editar</a>
                                    <a class="btn btn-danger" href="">Excluir</a>
                                </td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        
    </div>    
</div>
@endsection