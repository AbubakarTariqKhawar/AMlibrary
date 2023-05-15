<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renting;

class RentingController extends Controller
{
    public function rentbookorder(Request $request){

        try {

            $rentuserId = $request->rentuserId;
            $rentaddId = $request->rentaddId;
            $paidPrice = $request->paidPrice;
            $RenPaid = $request->RenPaid;
            $BooRecived = $request->BooRecived;

            $rent = new Renting();

            $rent->RenUseId = $rentuserId;
            $rent->RenAddId = $rentaddId;
            $rent->RenPaidPrice = $paidPrice;
            $rent->RenCreatedDate = now();
            $rent->RenPaid = $RenPaid;
            $rent->BooRecived = $BooRecived;

            $rent->save();

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


    public function getlastRentId(){

        try {

            $rent = Renting::latest()->value('RenId');
            $data = compact('rent');
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
