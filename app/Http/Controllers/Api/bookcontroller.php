<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;

class bookcontroller extends Controller
{
    public function index(Request $request){
        //untuk menampilkan semua data
        $books = book::with("category")->paginate(5);
        $filterkeyword = $request->get('name');
        
         if($filterkeyword){
            $books = book::where("name","LIKE", "%$filterkeyword%")->paginate(5);
        }
        
        return response()->json(
            [
                "succes" =>true,
                "message" => "succes get data book",
                "data" => $books
            ],200
            );
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
        $book = book::create($request->all()); 

        return response()->json(
            [
                "succes" =>true,
                "message" => "succes create data book",
                "data" => $book
            ],200
            );
    }
    
    public function destroy($id){
        $book = book::where("id", $id)->first();
        $book->delete();

        return response()->json(
            [
                "succes" =>true,
                "message" => "succes delete data book",
            ],200
            );
    }


}
