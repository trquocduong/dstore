<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //
    public function bill(){
        return view ('admin.bill.bill');
    }
}
