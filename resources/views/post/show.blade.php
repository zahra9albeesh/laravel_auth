@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
      <div class="col">


    </div>
    <div class="row">



      <div class="col">

        <div class="card"  >
            <img src="{{URL::asset($post->photo)}}" class="card-img-top" alt="{{$post->photo}}">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text"> {{$post->content}}</p>
            <p> Created at:   {{$post->created_at->diffForhumans() }}</p>
            <p>  Updated at:    {{$post->updated_at->diffForhumans() }}</p>

            @foreach ($tags as $item)
            @foreach ($post->tags as $item2)
            @if ($item->id == $item2->id)
            <label for="">{{$item->tit}}</label> -
            @endif
        @endforeach
         @endforeach

<br>

              <a class="btn btn-success" href="{{route('post')}}"> all posts</a>
            </div>
          </div>

      </div>
    </div>
  </div>
@endsection