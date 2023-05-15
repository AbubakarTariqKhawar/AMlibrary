<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renting_detail;

class RentingDetailController extends Controller
{
    public function rentbookorder(Request $request){

        try {

            $rentuserId = $request->rentuserId;
            $rentaddId = $request->rentaddId;

            $rent = new Renting_detail();

            $rent->RenUseId = $rentuserId;
            $rent->RenAddId = $rentaddId;

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
}
