<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function ShowImportantInfo(){
        return "Password is: abcssdd...";
    }

    public function file(){
        return view('admin.file');
    }
}
