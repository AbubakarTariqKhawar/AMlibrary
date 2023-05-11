<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Book;

class BookController extends Controller
{
    public function getallbooks(){

        try {
            $books = Book::all();
            $data = compact('books');
            return response()->json($data);

        } catch(\Illuminate\Database\QueryException $ex) {

            $success = false;
            $message = $ex->getMessage();
            $response = [
                'success' => $success,
                'message' => $message,
            ];
            return response()->json($response);
        }
    }

    public function gethomebook(){

        try {
            $books = Book::take(4)->get();
            $data = compact('books');
            return response()->json($data);
            //return view('app')->with($data);

        } catch(\Illuminate\Database\QueryException $ex) {

            $success = false;
            $message = $ex->getMessage();
            $response = [
                'success' => $success,
                'message' => $message,
            ];
            return response()->json($response);
        }


    }

    public function pickoneBook(Request $request)
    {
        try {
            $bookId = $request->id;
            $book = Book::find($bookId);
            $data = compact('book');
            return response()->json($data);

        } catch(\Illuminate\Database\QueryException $ex) {

            $success = false;
            $message = $ex->getMessage();
            $response = [
                'success' => $success,
                'message' => $message,
            ];
            return response()->json($response);
        }
    }

    public function searchbook(Request $request){

        try {
            $bookName = $request->bookName;
            $books = Book::where('BooName', 'like', '%' . $bookName . '%')->get();
            $data = compact('books');
            return response()->json($data);

        } catch(\Illuminate\Database\QueryException $ex) {

            $success = false;
            $message = $ex->getMessage();
            $response = [
                'success' => $success,
                'message' => $message,
            ];
            return response()->json($response);
        }
    }

    public function getBookByCategory(Request $request){

        try {
            $catId = $request->CatId;
            $books = Book::where('BooCatId', $catId)->get();
            $data = compact('books');
            return response()->json($data);

        } catch(\Illuminate\Database\QueryException $ex) {

            $success = false;
            $message = $ex->getMessage();
            $response = [
                'success' => $success,
                'message' => $message,
            ];
            return response()->json($response);
        }
    }

    public function getBookLink(Request $request){

        try {
            $bookId = $request->bookId;
            $book = Book::where('BooId', $bookId)->get();
            $data = compact('book');
            return response()->json($data);

        } catch(\Illuminate\Database\QueryException $ex) {

            $success = false;
            $message = $ex->getMessage();
            $response = [
                'success' => $success,
                'message' => $message,
            ];
            return response()->json($response);
        }
    }

}
