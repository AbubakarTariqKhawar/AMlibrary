<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Book;
use App\Models\Renting_detail;

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

    public function createBook(Request $request){

        try {
            $bookname = $request->bookname;
            $bookcategory = $request->bookcategory;
            $bookprice = $request->bookprice;
            $booklink = $request->booklink;
            $bookdescription = $request->bookdescription;
            $bookpicture = $request->bookpicture;

            // Create a new book using the received data
            $book = new Book();
            $book->BooName = $bookname;
            $book->BooCatId = $bookcategory;
            $book->BooPrice = $bookprice;
            $book->BooLink = $booklink;
            $book->BooDescription = $bookdescription;
            $book->BooPicture = $bookpicture;

            // Save the book to the database
            $book->save();

            // Optionally, you can return the created book as a response
            return response()->json('The book has been created');

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

    public function deleteBook(Request $request){

        try {
            $bookId = $request->bookId;

            $book = Book::find($bookId);

            if ($book) {
                $RentBook = Renting_detail::where('RedBooId', $bookId)->first();
                if($RentBook){
                    return response()->json('This book cannot be deleted because it has been borrowed.');
                }else{
                    $book->delete();

                    return response()->json('The Book has been deleted successfully');
                }

            } else {
                return response()->json('The Book does not exist', 404);
            }

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


    public function editBook(Request $request){

        try {
            $bookId = $request->bookId;
            $bookname = $request->bookname;
            $bookcategory = $request->bookcategory;
            $bookprice = $request->bookprice;
            $booklink = $request->booklink;
            $bookdescription = $request->bookdescription;
            $bookpicture = $request->bookpicture;

            $book = Book::find($bookId);

            if ($book) {

                $book->BooName = $bookname;
                $book->BooCatId = $bookcategory;
                $book->BooPrice = $bookprice;
                $book->BooLink = $booklink;
                $book->BooDescription = $bookdescription;
                $book->BooPicture = $bookpicture;

                $book->save();

                return response()->json('The book has been edited');
            } else {
                return response()->json('The book does not exist', 404);
            }

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
