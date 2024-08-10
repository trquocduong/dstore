<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CmtController extends Controller
{
    //

    public function cmt(){
        $cmt1=Comment::where('hiden',1)->get();
        $cmt2=Comment::where('hiden',0)->get();
        return view('admin.cmt.cmt',compact('cmt1','cmt2'));
    }
    public function block($id)
    {
        $cmt = Comment::find($id);
        $cmt->hiden=0;
        $cmt->save();
        return redirect()->back()->with('error', 'Đã chặn!');
    }
    public function delete($id){
        $cmt=Comment::find($id);
        $cmt->delete();
        return redirect()->back()->with('error', 'Đã xoá!');
    }

}
