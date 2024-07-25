<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view ('auth.register');
    }

    public function store(Request $request){
        $request->validate(
            [
                'username' => 'required|string|max:250',
                'email' => 'required|string|max:250|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]
        );
        UserModel::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success','Operation completed successfully.');;

    }

    public function admin(){
        if(Auth::check() && Auth::user()->role == 1){
            // thống kê tài khoản 
        //     $account= AccountModel::count();
        //     // thống kê danh mục 
        //     $category= CategoryModel::count();
        //     // thống kê sản phẩm 
        //    $product = ProductModel::count();
        //    // thống kê đơn hàng 
        //    $order = Orders::count();
        //    // duyệt sản phẩm
        //    $orders = Orders::with(['orderItems.product'])
        //    ->where('status', 'Chờ xác nhận')
        //    ->get();
            return view('admin.components.home');
        }
        return redirect()->route("loginadmin");

    }

    public function login(){
        return view ('auth.login');
    }
    public function reset(){
        return view ('resetpass');
    }
    public function authlogin(Request $request){
        $crenden = $request->validate(
            [
                'email' =>'required|email',
                'password' =>'required',
            ]
        );
        if(Auth::attempt($crenden)){
            $request->session()->regenerate();
            return redirect()->route('home')->withSuccess('Bạn đã đăng nhập thành công ');
        }
        return back()->withErrors([
            'email' => 'email của bạn đã sai ',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->with('success','Bạn đã đăng xuất khỏi tài khoản ');

    }
    public function loginadmin(){

        return view('admin.auth.login');
    }
    public function dashboard(Request $request){
        $creden = $request->validate(
            [
                'email' =>'required|email',
                'password' =>'required',
            ]
        );
        if(Auth::attempt($creden)){
               $user=Auth::user();
               if($user->role==1){
                return redirect()->route("admin")->with('success','Thành công ');;
               }
               else{
                return redirect()->route("loginadmin")->with('error','Email hoặc mật khẩu không chính xác');   
            }
        }
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác',
        ])->onlyInput('email');

    }
}
