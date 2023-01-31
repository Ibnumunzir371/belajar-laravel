<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function create(){
        $category = category::all();
        return view('admin.book.create', compact("category"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'category_id' => 'required',
        ]);


        // untuk memunculkan pesan 
        //,[
        //     "name" =>"harus di isi"
        // ]
        book::create($request->all()); 

        return redirect()->route("book-index")->with('status','Sukses insert data book');
    } 

    public function edit($id){
        $category = category::all();
        $book = book::where("id", $id)->first();
        return view("admin.book.edit", compact("book","category"));
    }

    public function index(Request $request){
        //untuk menampilkan semua data
        $books = book::paginate(5);
        $filterkeyword = $request->get('name');
        
         if($filterkeyword){
            $books = book::where("name","LIKE", "%$filterkeyword%")->paginate(5);
        }     
        //kode untuk menampilkan debugging/untuk mengetes apakah data berhasil ditangkap
        //return response()->json($books); 
        return view('admin.book.index', compact("books"));
    }

    public function destroy($id){
        $book = book::where("id", $id)->first();
        $book->delete();

        return redirect()->route("book-index")->with('status','Sukses delete data book');
    }

    public function update(Request $request , $id){
        // $this->validate($request, [
        //     'name' => 'required',
        //     'author' => 'required',
        //     'year' => 'required',
        // ]);
    
        $book = book::where("id", $id)->first();
        $book->update($request->all());

        return redirect()->route("book-index")->with('status','Sukses update data book');

    }
}
