<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Models\File;

class MaterialAttaching extends Controller
{
    public function createForm()
    {
        return view('material_attaching/material_attaching');
    }

    public function fileUpload(Request $req)
    {
        $req->validate([
            'Subject' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpeg,jpg,png|max:2048'
        ]);

        $fileModel = new File;
        if ($req->file()) {
            $fileModel->leave_application_id = $req->input('leave_app_id');
            $fileModel->subject = $req->input('Subject');
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
