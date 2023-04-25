<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request){

        $credentials =[
            'UseEmail' => $request->email,
            'UsePassword' => $request->password
        ];

        if(Auth::attempt($credentials)){
            $success = true;
            $message = "Usuario logeado correctamente";
        }else{
            $success = false;
            $message = "Usuario no autorizado";
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }

    public function register(Request $request){

        try{
            $user = new User();
            $user->Usename = $request->name;
            $user->UseSureName='';
            $user->UsePhone=0;
            $user->UseRolId=1;
            $user->UseEmail = $request->email;
            $user->UsePassword = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = "Usuario registrado correctamente";
        }catch(\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }


        $response=[
            'success' => $success,
            'message' => $message,
        ];

        return response()->json($response);

    }

    public function logout(){

        try{
            Session::flush();

            $success = true;
            $message = "Logout correcto";
        }catch(\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }

        $response=[
            'success' => $success,
            'message' => $message,
        ];

        return response()->json($response);
    }
}
