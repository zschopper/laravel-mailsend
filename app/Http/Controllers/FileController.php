<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        return view('fileUpload');
    }

    public function store(Request $request)
    {
        // the base unit is in kilobytes:
        $request->validate([
            'file' => 'required|mimes:txt,pdf,xlx,csv|max:2048',
        ]);
        //if you'd like to keep original file name:
        $fileName = $request->file->getClientOriginalName();
        // if you want to give it a unique file name:
        // $fileName = time() . '.' . $request->file->extension();


        $request->file->move(public_path('uploads'), $fileName);

        /*
             Write Code Here for
             Store $fileName name in DATABASE from HERE
         */
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
}
