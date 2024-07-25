<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    //

    public function inventory(){
        return view('admin.inventory.inventory');
    }
    public function add_user(){
        return view('admin.inventory.add_inventory');
    }
    public function update_inventory(){
        return view('admin.inventory.update_inventory');
    }
}
