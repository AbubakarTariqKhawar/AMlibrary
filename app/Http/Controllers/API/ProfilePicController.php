<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilePicController extends Controller
{
    public function uploadProfilePic(Request $request)
    {

        if ($request->hasFile('profilePic')) {
            $file = $request->file('profilePic');
            $UseId = $request->input('UseId');

            //$fileName = $file->getClientOriginalName();getClientOriginalExtension

            $fileName = $UseId . '_' . $file->getClientOriginalName();

            $filePath = public_path('img/user') . '/' . $fileName;

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file->move(public_path('img/user'), $fileName);

            return response()->json(['fileName' => $fileName]);
        }else{
            return response()->json(['error' => 'File not found.'], 400);
        }



        /*
        if ($request->hasFile('profilePic')) {
            echo "<pre>";
            echo "im in";
            echo "</pre>";
            $file = $request->file('profilePic');
            $fileName = $file->getClientOriginalName();
            //$file->move(public_path('img/user'), $fileName);

            return response()->json(['fileName' => $fileName]);
        }

        return response()->json(['error' => 'File not found.'], 400);
        */
    }
}
