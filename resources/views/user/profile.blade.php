@extends('layouts.app')

@section('content')
@php
  $geder = ['Male', 'Female']
@endphp

<div class="container">


  @if(count($errors)>0)
    $@foreach ($errors->all() as $item)
      <div class="alert alert-danger" role="alert">
        A simple danger alert—check it {{ $item }}!
      </div>
    @endforeach
  @endif
    <form method="POST" action="{{route('profile.update')}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1"> facebook </label>
          <input type="text" name="facebook" class="form-control"  value="{{$user->profile->facebook}}">
          </div>
        


        
        <div class="form-group">
          <label for="exampleFormControlSelect1">gender</label>
          <select class="form-control" name="gender">
            @foreach ($geder as $item)
            <option value="{{$item}}" {{ ($user->profile->gender == $item) ? 'selected':'' }}>{{$item}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio</label>
          <textarea class="form-control"  name="bio" id="exampleFormControlTextarea1" rows="3">{!! $user->profile->bio !!}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="password">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Confirm password</label>
            <input type="password" class="form-control" name="cpassword" id="exampleFormControlInput1" placeholder="confirm password">
          </div>
          <div class="form_group">
              <button type="submit" class="btn btn-success">Update</button>
          </div>
      </form>
</div>
@endsection