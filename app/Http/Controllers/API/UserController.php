<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request){
        $credential=[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credential)){
            $success = true;
            $message = 'Usuario logeado correctamente';

        }else{
            $success = false;
            $message = 'Usuario no logeado';

        }

        $response = [
            'success' => $success,
            'message' => $message,

        ];
        return response()->json($response);
    }

    public function register(Request $request){
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = 'Usuario registrado correctamente';
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
            $message = 'logout correctly';

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
