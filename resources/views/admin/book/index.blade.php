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
        <a href="{{route("book-create")}}"><button class="btn btn-success">+ tambahkan data</button></a>
        <table class="table table-striped mt-3">
    <thead>
        <tr>
        <th scope="col">No</th> 
        <th scope="col">Nama</th>
        <th scope="col">Penulis</th>
        <th scope="col">Tahun Terbit</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $key => $item)
        <tr>
        <th scope="row">{{$key + 1}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->author}}</td>
        <td>{{$item->year}}</td>
        <td>
            <a class="btn btn-primary" href="{{route("book-edit", $item->id)}}">
                Edit
            </a>
            <form action="{{route("book-delete", $item->id)}}"
                method="post" style="display: inline"
                class="form-check-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                type="submit">Hapus</button>
            </form>
        </td>
        </tr>
        @endforeach     
    </tbody>
    </table>
        
    </div>
    
</body>
</html> --}}

@extends('backend.master')

@section('content')
<div class="card card-body">
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            @if (Auth::user()->role == "admin")
            <a href="{{route("book-create")}}"><button class="btn btn-primary">+ tambahkan buku</button></a>
            @endif
        </div>
        <div class="col-sm-6">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                    <input value="{{Request::get('name')}}" name="name" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
            </div>
        </form>
    </div>
    {{-- <div>
        
    </div>
    <div>
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                    <input value="{{Request::get('name')}}" name="name" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
            </div>
        </form>
    </div> --}}
    <table class="table table-striped mt-3">
        <thead>
            <tr>
            <th scope="col">No</th> 
            <th scope="col">Nama Buku</th>
            <th scope="col">Category</th>
            <th scope="col">Penulis</th>
            <th scope="col">Tahun Terbit</th>
            @if (Auth::user()->role == "admin")
            <th scope="col">Action</th>
            @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $key => $item)
            <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->author}}</td>
            <td>{{$item->year}}</td>
            @if (Auth::user()->role == "admin")
            <td>
                <a class="btn btn-primary" href="{{route("book-edit", $item->id)}}">
                    Edit
                </a>
                <a class="btn btn-success" href="{{route("book-show", $item->id)}}">
                    Detail
                </a>
                <form action="{{route("book-delete", $item->id)}}"
                    method="post" style="display: inline"
                    class="form-check-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"
                    type="submit">Hapus</button>
                </form>
                
            </td>
            @endif
            </tr>
            @endforeach     
        </tbody>
        </table>   

        <div class="mt-2 float-right">
            {{ $books->links()}}
        </div> 

        @if(session('status'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: "{{session('status')}}",
          });
        </script>
        @endif
@endsection
