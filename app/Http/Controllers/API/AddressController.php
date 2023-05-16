<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Renting;

class AddressController extends Controller
{
    public function pickalladdress(Request $request){

        try {
            $userId = $request->userId;

            $address = Address::where('AddUseId', $userId)->get();
            $data = compact('address');
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

    public function updateaddress(Request $request){

        try {
            $addId = $request->addressId;
            $addressD = $request->address;


            $address = Address::find($addId);

            if ($address) {

                $address->AddAddres = $addressD;

                $address->save();

                return response()->json('The Address has been edited');
            } else {
                return response()->json('The Address does not exist', 404);
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

    public function deletemyaddress(Request $request){

        try {
            $addressId = $request->id;

            $myadd = Address::find($addressId);

            if ($myadd) {
                $RentBook = Renting::where('RenAddId', $addressId)->first();
                if($RentBook){
                    return response()->json('This address cannot be deleted because it has being used.');
                }else{
                    $myadd->delete();

                    return response()->json('The address has been deleted successfully');
                }

            } else {
                return response()->json('The address does not exist', 404);
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


    public function createaddress(Request $request){

        try {
            $userid = $request->userid;
            $addresss = $request->address;

            $address = new Address();
            $address->AddUseId = $userid;
            $address->AddAddres = $addresss;

            $address->save();

            return response()->json('The address has been created');

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

    public function getlastaddressId(){

        try {

            $address = Address::latest()->value('AddId');
            $data = compact('address');
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
