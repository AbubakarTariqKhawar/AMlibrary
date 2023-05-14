<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role_user;

class RoleUserController extends Controller
{
    public function getAllRoleUser(){

        try {
            $roles = Role_user::all();
            $data = compact('roles');
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

    public function updateUserRole(Request $request){

        try {
            $userId = $request->userid;
            $roleId = $request->roleid;

            $roleUser = Role_user::where('user_UseId', $userId)->where('role_RolId', $roleId)->first();

            if ($roleUser) {
                return response()->json('The RoleUser already exists', 404);
            } else {
                $newRoleUser = new Role_user();
                $newRoleUser->user_UseId = $userId;
                $newRoleUser->role_RolId = $roleId;
                $newRoleUser->save();

                return response()->json('The New RoleUser has been added');
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


    public function deleteUserRole(Request $request){

        try {
            $userId = $request->userid;
            $roleId = $request->roleid;

            $roleUser = Role_user::where('user_UseId', $userId)->where('role_RolId', $roleId)->first();

            if ($roleUser) {

                $roleUser->delete();

                return response()->json('The RoleUser has been deleted successfully');

            } else {
                return response()->json('The RoleUser does not exist', 404);
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
