<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmtController extends Controller
{
    //

    public function cmt(){
        return view('admin.cmt.cmt');
    }
    public function add_cmt(){
        return view('admin.cmt.add_cmt');
    }
    public function update_cmt(){
        return view('admin.cmt.update_cmt');
    }
}
