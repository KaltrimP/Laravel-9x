<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','The App')</title>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        .container-fluid {
            color: white;
        }
    </style>
    <nav class="sticky-sm-top navbar navbar-expand-lg bg-primary">
        <div class="container-fluid pr-5">
          <a class="navbar-brand text-light" href="{{ route('home') }}">GK</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active  text-light" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                @if (!Auth::check())
                <a class="nav-link  text-light" href="{{ route('login') }}">Log In</a>
                @endif
              </li>
              <li class="nav-item">
                @if (!Auth::check())
                <a class="nav-link  text-light" href="{{ route('register') }}">Sign Up</a>
                @endif
              </li>
              <li class="nav-item">
                @if (Auth::check())
                <a class="nav-link  text-light" href="{{ route('logout.user') }}">Log Out</a>
                 <li class="nav-item">
                @endif
                 @if (Auth::check())
                     <a class="nav-link  text-light" href="{{ route('myposts') }}">My Posts</a>
                @endif
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Link
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              {{-- <select class="custom-select bg-primary text-white border-0" name="company_id" id="filter_company_id">
                <option value="" selected>All Authors</option>
                @foreach ($drDown as $id => $Author)
                <option value="{{ $id }}">{{ $Author }}</option>
                @endforeach
              </select> --}}
            </ul>
            <form class="d-flex" role="search" method="GET" action="{{ route('home') }}">
              <input class="form-control me-2"name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-info" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    @yield('content')
    <script src="{{ asset('./resources/js/newapp.js') }}"></script>
</body>
</html>
