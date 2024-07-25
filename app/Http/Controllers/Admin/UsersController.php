<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // hiển thị user
    public function user(Request $request){
        $perPage = $request->input('perPage', 5); 
        $user = UserModel::paginate($perPage);
        return view('admin.users.users',compact('user','perPage'));
    }
    //hiển thị form thêm user
    public function add_userform(){
        return view('admin.users.add_users');
    }
    // thêm user 
    public function add_user(Request $request){
        $data= $request->only('username','email','password','role');
        $data['password'] = Hash::make($data['password']); 
        UserModel::create($data);
        return redirect()->route('user')->with('success', 'Bạn đã thêm tài khoản thành công !');
    }
    //hiển thị form sửa user
    public function update_user($id){
        $user =  UserModel::findOrFail($id);
        return view('admin.users.update_user',compact('user'));
    }
    //sửa user 
    public function update_userform(Request $request, $id){
        $user = UserModel::findOrFail($id);
        $data = $request->only('username', 'email', 'password', 'diachi', 'dienthoai', 'role');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('user')->with('success', 'Bạn đã sửa tài khoản thành công!');
    }
    //xoá user 
    public function delete_user($id){
        $account = UserModel::findOrFail($id);
        $account->delete();
        return redirect()->route('user')->with('success', 'Bạn đã xoá tài khoản thành công!');

    }
}
