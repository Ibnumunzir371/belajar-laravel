<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function create(){
        return view('admin.book.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
        ]);


        // untuk memunculkan pesan 
        //,[
        //     "name" =>"harus di isi"
        // ]
        book::create($request->all()); 

        return redirect()->route("book-index");
    } 

    public function edit($id){
        
        $book = book::where("id", $id)->first();
        return view("admin.book.edit", compact("book"));
    }

    public function index(){
        //untuk menampilkan semua data
        $books = book::all();
        //kode untuk menampilkan debugging/untuk mengetes apakah data berhasil ditangkap
        //return response()->json($books); 
        return view('admin.book.index', compact("books"));
    }

    public function destroy($id){
        $book = book::where("id", $id)->first();
        $book->delete();

        return redirect()->route("book-index");
    }

    public function update(Request $request , $id){
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
        ]);

        $book = book::where("id", $id)->first();
        $book->update($request->all());

        return redirect()->route("book-index");

    }
}
