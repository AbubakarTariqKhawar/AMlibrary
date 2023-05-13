<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function pickallBankp(Request $request){

        try {
            $userId = $request->userId;

            $bank = Bank::where('BanUseId', $userId)->get();
            $data = compact('bank');
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


    public function deletebank(Request $request){

        try {
            $bankId = $request->id;

            $bank = Bank::find($bankId);

            if ($bank) {
                $bank->delete();

                return response()->json('The bank has been deleted successfully');

            } else {
                return response()->json('The bank does not exist', 404);
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


    public function updatebankinfo(Request $request){

        try {
            $bankid = $request->bankId;
            $bankuser = $request->bankuserId;
            $banknumber = $request->banknumber;
            $bankowner = $request->bankowner;
            $bankmonth = $request->bankmonth;
            $bankyear = $request->bankyear;
            $bankcvv = $request->bankcvv;



            $bank = Bank::find($bankid);

            if ($bank) {

                $bank->BanCardNumber = $banknumber;
                $bank->BanOwenrName = $bankowner;
                $bank->BanExpireMonth = $bankmonth;
                $bank->BanExpireYear = $bankyear;
                $bank->CVV = Hash::make($bankcvv);


                $bank->save();

                return response()->json('The bank has been edited');
            } else {
                return response()->json('The bank does not exist', 404);
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
