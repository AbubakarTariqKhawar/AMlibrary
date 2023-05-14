<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Bank;
use App\Models\Renting;
use App\Models\Role_user;

class UserController extends Controller
{
    public function login(Request $request){

        $credentials =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            $success = true;
            $message = "User logged in successfully";
        }else{
            $success = false;
            $message = "Unauthorized user";
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
            $user->name = $request->name;
            $user->UseSureName = $request->surname;
            $user->UsePhone = $request->phone;
            $user->UseRolId = $request->role;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->UsePic = $request->userPic;
            $user->save();

            $success = true;
            $message = "User successfully registered";
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
            $message = "Successful logout";
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

    public function updateUser(Request $request){

        try {
            $userId = $request->userId;
            $name = $request->name;
            $surname = $request->surname;
            $email = $request->email;
            $phone = $request->phone;
            $password = $request->password;
            $profilePic = $request->profilePic;

            $userUpdate = User::where('UseId', $userId)->first(); // Retrieve the user by UserId

            // Update the user's attributes
            $userUpdate->name = $name;
            $userUpdate->UseSureName = $surname;
            $userUpdate->email = $email;
            $userUpdate->UsePhone = $phone;
            $userUpdate->password = Hash::make($password);
            $userUpdate->UsePic = $request->profilePic;

            $userUpdate->save();

            $user = User::all();

            $data = compact('user');
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

    public function getallUsers(){

        try {
            $users = User::all();
            $data = compact('users');
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


    public function deleteUSer(Request $request){

        try {
            $userid = $request->id;

            $user = User::find($userid);

            if ($user) {
                $RentBook = Renting::where('RenUseId', $userid)->first();
                $Bank = Bank::where('BanUseId', $userid)->first();
                $Role_user = Role_user::where('user_UseId', $userid)->first();

                if($RentBook || $Bank || $Role_user){
                    return response()->json('This User cannot be deleted because it has being used.');
                }else{
                    $user->delete();

                    return response()->json('The User has been deleted successfully');
                }

            } else {
                return response()->json('The User does not exist', 404);
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

    public function editUSerPass(Request $request){

        try {
            $id = $request->id;
            $pass = $request->pass;


            $user = User::find($id);

            if ($user) {

                $user->password = Hash::make($pass);

                $user->save();

                return response()->json('The User has been edited');
            } else {
                return response()->json('The User does not exist', 404);
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




    public function getUserRoles()
    {
        $user = Auth::user();
        $roles = $user->roles;

        return response()->json(['roles' => $roles]);
    }
}
