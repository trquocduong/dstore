<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerModel;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use App\Models\CartModel;
use App\Models\NewModel;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function detail_category(){
        return view('products.detail_category');

    }
    public function detail_product(){
        return view('products.detail_product');
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
                'price' => $request->price
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
}
