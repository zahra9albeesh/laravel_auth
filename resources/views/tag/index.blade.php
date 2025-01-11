@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All Posts  </h1>
        <a class="btn btn-success" href="{{route('tag.create')}}"> create post</a>
           </div>
      </div>
    </div>
    <div class="row">

      @if (count($tags) > 0 )
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">tit</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($tags as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->tit}}</td>
                        <td>
                          
                            &nbsp;&nbsp;
                            <a href="{{route('tag.edit',['id'=> $item->id])}}"> <i class="fas fa-2x fa-edit"></i>  </a>&nbsp;&nbsp;
                            <a class="text-success" href="{{route('tag.destroy',['id'=> $item->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>
                            

                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>


          </div>
        @else
        <div class="col">
            <div class="alert alert-danger" role="alert">
                No tags
              </div>
        </div>

        @endif


    </div>
  </div>
@endsection