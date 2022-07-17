<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    @extends('layouts.main')
    @section('content')
    @if (Auth::check())
    <a href="/create_post" class="btn btn-primary m-3" >+ New Post</a>
    @endif
   <style>
   </style>
   @if ($message = session('message'))
       <div class="alert alert-success">{{ $message }}</div>
   @endif
   @if (session('info'))
       <div class="alert alert-danger">{{ session('info') }}</div>
   @endif
   @foreach ($posts as $p)
   <div class="card mt-2 mx-4" style="background-color: #6998c8;">
        <div class="card-header text-light bg-dark text-sm-center">
            <a style="text-decoration:none; color:coral;" href="{{ route('show.post', $p->id) }}">            {{$p->Title}}            </a>
        </div>
        <div class="card-body ">
            <p class="card-text">{{$p->Body}}</p>
            <h5 class="card-title text-center h6"><a style="text-decoration: none;" href="{{ url ('/post/'. $p->id)}}">By {{$p->Author}}</a></h5>
            @if (Auth::check() && Auth::user()->id == $p->user_id)
            <a class="d-inline-block" href="{{ url('/post/edit/'. $p->id) }}" ><svg xmlns="http://www.w3.org/2000/svg" width=27" height="27" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg></a>
            <a href="{{ url('/post/delete/'.$p->id) }}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" onclick="confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg></a>
            @endif
        </div>
  </div>
  @endforeach
  <div class="pagination">
      {{ $posts->links() }}
  </div>
  @endsection
@section('title', 'Home Sweet Home')
