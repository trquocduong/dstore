<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\BillModel;
use App\Models\Orders;
use App\Models\CategoryModel;
use App\Models\User;




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
            $user = User::count();
            $products = ProductsModel::count();
            $categories = CategoryModel::count();
            $bills = BillModel::count();
            $needadd =ProductsModel::where('quantity','0')->orderBy('id')->get();
            $billadd =BillModel::where('status','1')->orderBy('id')->get();
            return view('admin.components.home',compact('user', 'products', 'categories', 'bills','needadd','billadd'));
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
    public function profile()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập xem thông tin người dùng.');
        }
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $validateData = $request->except('img'); // Exclude image fields from validation
        // Check if the main image was uploaded
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $validateData['img'] = $imageName;
        }
        // Update the product
        $user = UserModel::findOrFail(Auth::id());
        $user->update($validateData);
        return redirect()->route('profile')->with('success', 'Sửa thồng tin người dùng thành cồng!');
    }

    public function profile_order()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập xem lịch sử đơn hàng');
        }
        $orders = BillModel::where('iduser', Auth::id())
            ->orderBy('status', 'asc')
            ->get();
            $user = Auth::user();
        return view('pages.profile_order', compact('orders','user'));
    }
    public function BillDetail($id) {
        $order = Orders::with(['orderItems.product'])->findOrFail($id);
        return view('pages.profile_detail_order', compact('order'));
    }
    public function change_password(){
        return view('auth.change_pass');
    }
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Mật khẩu hiện tại không đúng.');
                }
            }],
            'new_password' => ['required', 'string', 'confirmed'],
            'new_password_confirmation' => ['required'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('status', 'Mật khẩu đã được thay đổi thành công.');
    }
}
