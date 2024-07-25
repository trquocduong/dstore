<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    //

    public function voucher(){
        return view('admin.voucher.voucher');
    }
    public function add_voucher(){
        return view('admin.voucher.add_voucher');
    }
    public function update_voucher(){
        return view('admin.voucher.update_voucher');
    }
}
