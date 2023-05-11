<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookPicController extends Controller
{
    public function uploadBookPic(Request $request)
    {

        if ($request->hasFile('bookpicture')) {
            $file = $request->file('bookpicture');

            //$fileName = $file->getClientOriginalName();getClientOriginalExtension

            $fileName = $file->getClientOriginalName();

            $filePath = public_path('img/books') . '/' . $fileName;

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file->move(public_path('img/books'), $fileName);

            return response()->json(['fileName' => $fileName]);
        }else{
            return response()->json(['error' => 'File not found.'], 400);
        }

    }
}
