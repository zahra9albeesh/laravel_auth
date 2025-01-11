@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Create Post</h1>
            <a class="btn btn-success" href="{{route('post')}}"> all posts</a>
           </div>
      </div>

    </div>
    <div class="row">

        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
        @endif


      <div class="col">
      <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Title  </label>
              <input type="text" name="title" class="form-control"   >
            </div>
            
            <div class="form-group">
              @foreach ($tags as $item )
                <input type="checkbox"  name="tag[]"  value="{{ $item->id }}" >
                <label>{{ $item->tit }}</label>
              @endforeach
            </div>
            
            <div class="form-group">
              <label for="exampleFormControlTextarea1">content  </label>
              <textarea class="form-control"  name="content"   rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Photo  </label>
                <input type="file"  name="photo" class="form-control"   >
              </div>
              <br>
            <div class="form-group">
              <span><button class="btn btn-danger" type="submit">save</button></span>
                
            </div>

          </form>
      </div>
    </div>
  </div>
@endsection