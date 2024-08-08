<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerModel;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use App\Models\CartModel;
use App\Models\NewModel;
use App\Models\Orders;
use App\Models\OrdersItem;
use App\Models\VoucherModel;
use App\Models\Favorite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    //
    public function detail_category($id){
    $products = ProductsModel::where('iddm', $id)->paginate(12);
    $banner = BannerModel::where('hide', '1')->first();
    return view('products.detail_category',compact('products','banner'));

    }
    public function detail_product($id){
        $products=ProductsModel::findOrFail($id);
        $pro_duct = ProductsModel::limit(6)->get();
        return view('products.detail_product',compact('products','pro_duct'));
    }
    public function fillter(Request $request){
        $categoryId = $request->iddm;
        $banner = BannerModel::where('hide', '1')->first();
        $category=CategoryModel::findOrFail($categoryId);
        $views=ProductsModel::where("dacbiet",1)->get();
        $products=$category->products;
        $categories=CategoryModel::where('hidden', '0')->get();
        return view('products.products',compact('products','categories','views','banner'));
    }
    public function fillterview(Request $request){
        $categoryId = $request->iddm;
        $banner = BannerModel::where('hide', '1')->first();
        $category=CategoryModel::findOrFail($categoryId);
        // $products=$category->products;
        $products = ProductsModel::with('category')
        ->whereHas('category', function ($query) {
            $query->where('hidden', 0);
        })
        ->orderByDesc('id')
        ->paginate(6);
        $views=$category->products;
        $categories=CategoryModel::where('hidden', '0')->get();
        return view('products.products',compact('products','categories','views','banner'));
    }
    public function products(){
        $products=ProductsModel::all();
        $views=ProductsModel::where("dacbiet",1)->get();
        $categories=CategoryModel::where('hidden', '0')->get();
        $banner = BannerModel::where('hide', '1')->first();
        return view('products.products',compact('banner','categories','views','products'));
    }
    public function getHeart(Request $request, $id)
    {
        ProductsModel::findOrFail($id);
        Favorite::updateOrCreate(
            [
                'user_id' => Auth::id(),'product_id' => $id
            ],
            [
                'user_id' => Auth::id(),'product_id' => $id
            ],
        );
        return redirect()->route('home')->with('success', 'Sản phẩm đã được thêm vào yêu thích!');
    }

    public function showHeart()
    {
        $favorites = Favorite::with('product')->where('user_id', Auth::id())->get();
        return view('products.favorite', compact('favorites'));
    }
    public function removeHeart($id)
    {
        Favorite::where('user_id', Auth::id())->where('product_id',$id)->delete();
        return redirect()->route('heartadd')->with('success', 'Sản phẩm đã được xóa khỏi yêu thích!');
    }
    public function getCart(Request $request, $id) {
        $product = ProductsModel::findOrFail($id);
        // dd($request->all());
        $cart = CartModel::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $id
            ],
            [
                'name' => $request->name,
                'img' => $request->img,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'size' => $request->size
            ]
        );
        if (!$cart->wasRecentlyCreated) {
            $cart->quantity += 1;
            $cart->save();
        }
        return redirect()->route('home')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    
    public function showCart(){
        $cart=CartModel::with('product')->where('user_id',Auth::id())->get();
        $total= $cart->reduce(function($carry ,$item ){
        return $carry + ($item->price * $item->quantity);},0);
        return view('products.cart',compact('cart','total'));
    }
    public function removeItem($id) {
        $cartItem = CartModel::find($id); 
        if (!$cartItem) {
            return redirect()->route('cartadd')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng!');
        }
        $cartItem->delete(); 
        return redirect()->route('cartadd')->with('success', 'Sản phẩm đã được xoá khỏi giỏ hàng!');
    }
    public function clearCart() {
        $userId = auth()->id(); 
        CartModel::where('user_id', $userId)->delete();
        return redirect()->route('cartadd')->with('success', 'Giỏ hàng đã được xoá thành công!');
    }
    public function search(Request $request)
    
    {
        $banner = BannerModel::where('hide', '1')->first();
        $keyword = $request->input('query');
        $products = ProductsModel::where('name', 'like', '%' . $keyword . '%')
                            ->get();
        return view('products.search_results', [
                                'products' => $products,
                                'keyword' => $keyword,
                                'banner' => $banner
                            ]);
    }
public function checkoutForm() {
    $user = auth()->user();
    $cart = CartModel::where('user_id', $user->id)->get();
    $total = $cart->sum(function($item) {
        return $item->price * $item->quantity;
    });

    return view('pages.checkout', compact('user', 'cart', 'total'));
}

    // public function updateCart(Request $request) {
    //     $user = auth()->user();
    //     $cartItem = CartModel::where('user_id', $user->id)->where('id', $request->id)->first();
    
    //     if ($cartItem) {
    //         $cartItem->quantity = $request->quantitys;
    //         $cartItem->save();
    //     }
    
    //     return redirect()->route('checkout');
    // }
    public function updateQuantity(Request $request, $id)
{
    // Tìm item trong giỏ hàng hoặc cơ sở dữ liệu
    $item = CartModel::findOrFail($id);

    // Cập nhật số lượng dựa trên dữ liệu gửi đến
    $quantity = $request->input('quantity');
    $item->update(['quantity' => $quantity]);

    // Redirect hoặc làm gì đó sau khi cập nhật
    return redirect()->back()->with('success', 'Quantity updated!');
}
public function checkout(Request $request) {
    $userId = auth()->id();
    $cartItems = CartModel::where('user_id', $userId)->get();
    // Kiểm tra xem giỏ hàng có trống không
    if ($cartItems->isEmpty()) {
        return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
    }
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'nguoidat_ten' => 'required|string|max:255',
        'nguoidat_email' => 'required|email|max:255',
        'nguoidat_tl' => 'required|string|max:15',
        'nguoidat_diachi' => 'required|string|max:255',
        'nguoinhan_ten' => 'nullable|string|max:255',
        'nguoinhan_diachi' => 'nullable|string|max:255',
        'nguoinhan_tel' => 'nullable|string|max:15',
        'shipping' => 'required|in:express,standard',
        'payment' => 'required|in:cod,card'
    ]);
    // Tính tổng giá trị giỏ hàng
    $total = $cartItems->reduce(function($carry, $item) {
        return $carry + ($item->price * $item->quantity);
    }, 0);
    // Xử lý mã voucher nếu có
    $discountAmount = 0;
    // Thêm phí vận chuyển
    $shippingFee = $request->input('shipping') === 'express' ? 50000 : 0;
    $total += $shippingFee;

    // Tạo đơn hàng
    $orders = Orders::create([
        'madth' => 'DS' . Str::random(5),
        'iduser' => $userId,
        'nguoidat_ten' => $request->input('nguoidat_ten'),
        'nguoidat_email' => $request->input('nguoidat_email'),
        'nguoidat_tl' => $request->input('nguoidat_tl'),
        'nguoidat_diachi' => $request->input('nguoidat_diachi'),
        'nguoinhan_ten' => $request->input('nguoinhan_ten', null),
        'nguoinhan_diachi' => $request->input('nguoinhan_diachi', null),
        'nguoinhan_tel' => $request->input('nguoinhan_tel', null),
        'status' => $request->input('status'),
        'total' => $total,
        'ship' => $shippingFee,
        'voucher' => $discountAmount,
        'tongthanhtoan' => $total,
        'pttt' => $request->input('payment') === 'card' ? 1 : 0,
    ]);
    // Lưu thông tin sản phẩm vào đơn hàng
    foreach ($cartItems as $item) {
        OrdersItem::create([
            'orders_id' => $orders->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->price,
        ]);
    }
    // Xóa giỏ hàng của người dùng
    CartModel::where('user_id', $userId)->delete();
    return redirect()->route('order.show', $orders->id)->with('success', 'Hóa đơn của bạn đã được tạo.');
}

        public function apply(Request $request)
        {
            $request->validate([
                'voucher_code' => 'nullable|string|max:255',
            ]);
            $userId = auth()->id();
            $user = auth()->user();
            $voucherCode = $request->input('voucher_code');
            $cart = CartModel::where('user_id', $userId)->get();
            $totals = $cart->reduce(function($carry, $item) {
                return $carry + ($item->price * $item->quantity);
            }, 0);// Tổng giá tiền trước khi áp dụng voucher

            if ($voucherCode) {
                $voucher = VoucherModel::where('name', $voucherCode)->first();

                if ($voucher) {
                    $discount = $voucher->discount; // Giảm giá theo phần trăm
                    $total = $totals - ($totals * ($discount / 100));

                    return view('pages.checkout', [
                        'cart' => $cart,
                        'total' => $total,
                        'message' => 'Mã voucher đã được áp dụng thành công! Giảm giá: ' . $discount . '%',
                        'user' => $user
                    ]);
                } else {
                    return redirect()->back()->withErrors(['voucher_code' => 'Mã voucher không hợp lệ'])->withInput();
                }
            }

            return view('pages.checkout', [
                'cart' => $cart,
                'message' => 'Vui lòng nhập mã voucher để áp dụng.',
                'user' => $user
            ]);
        }
        public function showPaymentPage(Request $request) {
            $transactionId = $request->query('transaction_id');
            // Display payment page with transaction details
            return view('pages.payment-page', ['transactionId' => $transactionId]);
        }
        

        public function showOrder($id) {
                $order = Orders::with(['orderItems.product', 'user'])->findOrFail($id);
                $user = auth()->user();
                $cart = CartModel::where('user_id', $user->id)->get();
                return view('pages.order', compact('order','cart'));
            }
    // hiển thị trên trang user 
        public function Bill(Request $request){
                $orders = Orders::with(['orderItems.product', 'user'])->get();
                $user = auth()->user();
                $cart = CartModel::where('user_id', $user->id)->get();
                return view ('bill',compact('orders'));
            }
       // hiển thị trên trang user 
        public function BillDetail($id) {
                $order = Orders::with(['orderItems.product'])->findOrFail($id);
                return view('billdetail', compact('order'));
            }

}
