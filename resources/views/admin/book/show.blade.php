{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <form action="{{route("book-update", $book->id)}}" method="post">
            @csrf
            @method("put")
            <h1>FORM</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input name="name" type="text" value="{{$book->name}}" class="form-control" id="name" >
                @error('name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input name="author" type="text" value="{{$book->author}}" class="form-control" id="author">
                @error('name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Tahun Terbit</label>
                <input name="year" type="text" value="{{$book->year}}" class="form-control" id="year">
                @error('name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
</body>
</html> --}}

@extends('backend.master')

@section('content')
<div class="card card-body">
    <form action = "" method="POST">
        <div align = "center">
            <h1>Detail Book</h1>
        </div>

        <p>{{$book->name}}</p>
        <p>{{$book->category->name}}</p>
        <p>{{$book->author}}</p>
        <p>{{$book->year}}</p>
    </form>
</div>
@endsection