@extends('layouts.main')
@section('content')
<div class="card text-center">
    <div class="card-header">
        {{$search->Title}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$search->Author}}</h5>
      <p class="card-text">{{$search->Body}}</p>
      {{-- @if (Auth::check() && Auth::user()->id == $show->user_id) --}}
      <a href="#" class="btn btn-primary">Edit</a>
      <a href="#" class="btn btn-danger">Delete</a>
      {{-- @endif --}}
    </div>
  </div>
@endsection
