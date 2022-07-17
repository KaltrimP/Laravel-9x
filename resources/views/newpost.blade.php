<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <form action="/create_store" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input name="Title" value="{{ old('Title') }}" type="text" class="form-control w-25 @error('Title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('Title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          {{-- <div id="emailHelp" class="form-text text-danger">Wrong input, Please try again!</div> --}}
          @enderror
        </div>
        <div class="mb-3">
            <select  class="btn btn-secondary btn-lg dropdown m-2 text-white pr-5 pt-2 @error('Author') is-invalid @enderror" name="Author" id="">
                <option value="{{ old('Author') }}" selected>{{ old('Author') }}</option>
                @foreach ($auths as $id => $author )
                <option value="{{ $author }}">{{ $author }}</option>
                @endforeach
            </select>
            @error('Author')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          {{-- <label for="exampleInputPassword1" class="form-label">Author</label>
          <input name="Author" type="text" class="form-control" id="exampleInputPassword1"> --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Body</label>
            <input name="Body" value="{{ old('Body') }}" type="longtext" class="form-control @error('Body') is-invalid @enderror  w-25 justify-content-center" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
          @error('Body')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>
