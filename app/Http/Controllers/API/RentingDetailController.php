<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renting_detail;
use App\Models\Book;
use App\Models\Address;
use DateTime;

class RentingDetailController extends Controller
{
    public function rentdetailorder(Request $request){

        try {

            $rentId = $request->rentId;
            $UseId = $request->RedUseId;
            $bookId = $request->bookId;
            $cantatity = $request->cantatity;
            $bookprice = $request->bookprice;
            $Returned = $request->RedReturned;
            $AddId = $request->AddId;


            $rentD = new Renting_detail();

            $rentD->RedRenId = $rentId;
            $rentD->RedUseId = $UseId;
            $rentD->RedBooId = $bookId;
            $rentD->RedQuantity = $cantatity;
            $rentD->RedPrice = $bookprice;
            $rentD->RedReturned = $Returned;
            $rentD->RedAddId = $AddId;
            $rentD->RedCreatedDate = now();

            $rentD->save();

            return response()->json('The rent has been created');

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


    public function getrentedBookByS(Request $request){

        try {
            $userid = $request->userid;
            $return = $request->return;

            $orders = Renting_detail::where('RedUseId', $userid)
                                    ->where('RedReturned', $return)
                                    ->join('book', 'renting_detail.RedBooId', '=', 'book.BooId')
                                    ->join('address', 'renting_detail.RedAddId', '=', 'address.AddId')
                                    ->select('renting_detail.*', 'book.BooPicture', 'book.BooName', 'address.AddAddres')
                                    ->get();

            $data = compact('orders');
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


    public function getrentedBookByAdmin(Request $request){

        try {

            $return = $request->return;

            $orders = Renting_detail::where('RedReturned', $return)
                                    ->join('book', 'renting_detail.RedBooId', '=', 'book.BooId')
                                    ->join('address', 'renting_detail.RedAddId', '=', 'address.AddId')
                                    ->join('users', 'renting_detail.RedUseId', '=', 'users.UseId')
                                    ->select('renting_detail.*', 'book.BooPicture', 'book.BooName', 'address.AddAddres', 'users.name', 'users.UsePic', 'users.email')
                                    ->get();

            $data = compact('orders');
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


    public function updateRentDetail(Request $request){

        try {
            $rentId = $request->rentId;
            $ret = 1;

            $order = Renting_detail::find($rentId);

            if ($order) {

                $order->RedReturnedDate = now();
                $order->RedReturned = $ret;

                $order->save();

                return response()->json('The book has been Returned');
            } else {
                return response()->json('The rentDetail does not exist', 404);
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


    public function updateReturnPrice(Request $request){

        try {
            $rentId = $request->rentId;

            $order = Renting_detail::find($rentId);

            if ($order) {
                $Bdate = new DateTime($order->RedCreatedDate);
                $Rdate = new DateTime($order->RedReturnedDate);
                $price = $order->RedPrice;

                $interval = $Rdate->diff($Bdate);
                $days = $interval->format('%a');

                $finalPrice = $price * $days;

                if ($finalPrice > 0) {
                    $order->RedPrice = $finalPrice;
                    $order->save();

                    return response()->json('The price has been updated');
                }

                return response()->json('The price update failed');
            } else {
                return response()->json('The rentDetail does not exist', 404);
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
