@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Edit Post</h1>
            <a class="btn btn-success" href="{{route('tags')}}"> all posts</a>
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
      <form action="{{route('tag.update',['id'=> $tag->id])}}" method="POST" >
        @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">tit  </label>
            <input type="text" name="title" value="{{$tag->tit}}"  class="form-control"   >
            </div>

            <div class="form-group">
                @foreach ($tags as $item)
                <input type="checkbox" name="tags[]"
                   value="{{$item->id}}"

                   @foreach ($post->tag as $item2)
                       @if ($item->id == $item2->id)
                           checked
                       @endif

             </div>

            <div class="form-group">

                <button class="btn btn-danger" type="submit">update</button>
            </div>

          </form>
      </div>
    </div>
  </div>
@endsection