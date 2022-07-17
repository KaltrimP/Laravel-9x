
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
@extends('layouts.main')
@section('content')

    {{-- <a href="/create_post" class="btn btn-primary m-3" >+ New Post</a> --}}
   {{-- @foreach ($posts as $p)
       <h1>{{$p->Title}}</h1>
       <h1>{{$p->Author}}</h1>
       <h1>{{$p->Body}}</h1>
   @endforeach --}}
   <div class="card text-center">
    <div class="card-header">
        {{$show->Title}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$show->Author}}</h5>
      <p class="card-text">{{$show->Body}}</p>
      @if (Auth::check() && Auth::user()->id == $show->user_id)
      {{-- <a href="#" class="btn btn-outline-primary">Edit</a>
      <a href="#" class="btn btn-outline-danger">Delete</a> --}}
      @endif
    </div>
  </div>
  @endsection


