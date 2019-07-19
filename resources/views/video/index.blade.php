@extends('layouts.app')

@section('content')
<div class="row" style="">
  <div class="col-12">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <td>Id</td>
          <td>Title</td>
          <td>Status</td>
          <td>Thumbnail</td>
          <td colspan="2" >Action</td>
        </tr>
      </thead>
      <tbody>
        @foreach( $videos as $video)
        <tr>
          <td>{{ $video->id }}</td>
          <td>{{ $video->title }}</td>
          <td>
            @if($video->status == 1)
              <span class="text-success">Active</span>
            @else
              @if($video->status == 2)
                <span class="text-warning">Pending</span>
              @else
                <span class="text-danger">Reject</span>
              @endif
            @endif
          </td>
          <td><img src="{{ '/storage/'.$video->thumbnail }}" alt="thumbnail" style="width: 70px; height: 50px"></td>          
          <td>
            <a href="{{ route('video.edit', ['id' => $video->id]) }}" class="btn btn-info">Edit</a>
          </td>
          <td>
            <form action="{{ route('video.destroy', [$video->id]) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>            
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection