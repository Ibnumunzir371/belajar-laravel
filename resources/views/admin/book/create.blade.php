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
        <form action="{{route('book-store')}}" method="post">
            @csrf
            <h1>FORM</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input name="name" type="text" class="form-control" id="name" >
                @error('name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input name="author" type="text" class="form-control" id="author">
                @error('author')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Tahun Terbit</label>
                <input name="year" type="text" class="form-control" id="year">
                @error('year')
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
    <form action="{{route('book-store')}}" method="post">
        @csrf
        <h1>FORM</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Buku</label>
            <input name="name" type="text" class="form-control" id="name" >
            @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <select class="form-control" name="category_id" id="category_id">
                <option label="pilih category"></option>
                @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('name')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input name="author" type="text" class="form-control" id="author">
            @error('author')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Tahun Terbit</label>
            <input name="year" type="text" class="form-control" id="year">
            @error('year')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection