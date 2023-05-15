<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renting_detail;

class RentingDetailController extends Controller
{
    public function rentdetailorder(Request $request){

        try {

            $rentId = $request->rentId;
            $bookId = $request->bookId;
            $cantatity = $request->cantatity;
            $bookprice = $request->bookprice;

            $rentD = new Renting_detail();

            $rentD->RedRenId = $rentId;
            $rentD->RedBooId = $bookId;
            $rentD->RedQuantity = $cantatity;
            $rentD->RedPrice = $bookprice;

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
}
