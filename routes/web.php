<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CmtController;
use App\Http\Controllers\Admin\VoucherController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/new', 'new')->name('new');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
        // Route::get('/detail', 'detail')->name('detail');

    // Route::get('/services', 'services')->name('services');

    // Route::get('/cart', 'cart')->name('cart');
    // Route::get('/personal', 'personal')->name('personal');
    // Route::get('/heart', 'heart')->name('heart')->middleware('auth');
    // Route::get('/change', 'change')->name('change');
    // Route::get('/news', 'news')->name('news');
});
Route::post('/checkout/voucher', [ProductController::class, 'apply'])->name('apply.voucher');
Route::prefix('/')->controller(AuthController::class)->group(function ()  {
    Route::get('/admin', 'admin')->name('admin');
    Route::get('/login', 'login')->name('login');
    Route::get('/reset', 'reset')->name('reset');
    Route::post('/authlogin', 'authlogin')->name('authlogin');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/loginadmin', 'loginadmin')->name('loginadmin');
    Route::post('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
});
Route::prefix('/')->controller(ProductController::class)->group(function ()  {
    Route::get('/detail_category/{id}', 'detail_category')->name('detail_category');
    Route::get('/detail_product/{id}', 'detail_product')->name('detail_product');
    Route::get('/products', 'products')->name('products');
    Route::post('/', 'fillter')->name('fillter');
    Route::post('/fillterview', 'fillterview')->name('fillterview');
    Route::get('/heartadd', 'showHeart')->name('heartadd');
    Route::post('/heart/add/{id}', 'getHeart')->name('add.favorite');
    Route::get('/heart/remove/{id}', 'removeHeart')->name('heart.remove');
    Route::post('/cart/{id}', 'getCart')->name('cart');
    Route::get('/cartadd', 'showCart')->name('cartadd');
    Route::delete('/cart/{id}', 'removeItem')->name('cart.remove');
    Route::delete('/cart_clear', 'clearCart')->name('cart_clear');
    Route::get('/search', 'search')->name('product.search');
    Route::get('/checkout', 'checkoutForm')->name('checkout.form');
    Route::post('/checkout',  'checkout')->name('checkout.process');
    Route::get('/order/{id}', 'showOrder')->name('order.show');
    Route::get('/bill', 'Bill')->name('bill');
    Route::get('/billdt/{id}', 'BillDetail')->name('billdt');
    Route::patch('/update-quantity/{id}', 'updateQuantity')->name('updateQuantity');
    Route::get('/payment-page', 'showPaymentPage')->name('payment.page');
    Route::post('/payment-continue', 'continuePayment')->name('payment.continue');
    Route::post('/payment-update','updatePayment')->name('payment.update');
});

//----------------------------------------------------------------admin ----------------------------------------------------------------
Route::prefix('/')->controller(ProductsController::class)->group(function () {
    Route::get('/product', 'product')->name('product');
    Route::get('/add_products', 'add_products')->name('add_products');
    Route::post('/productadd', 'productadd')->name('productadd');
    Route::get('/update_products/{id}', 'update_products')->name('update_products');
    Route::put('/edit_product/{id}', 'edit_product')->name('edit_product');
    Route::delete('/delete_product/{id}',  'delete_product')->name('delete_product');
});
Route::prefix('/')->controller(UsersController::class)->group(function () {
    Route::get('/user', 'user')->name('user');
    Route::get('/add_user', 'add_userform')->name('user.add');
    // Route::get('/search', 'search')->name('search');
    Route::post('/add_user/post', 'add_user')->name('add_user');
    Route::get('/update/{id}', 'update_user')->name('update_user');
    Route::put('/update_user/{id}', 'update_userform')->name('update_user');
    Route::delete('/delete_user/{id}', 'delete_user')->name('delete_user');
});
Route::prefix('/')->controller(CategoryController::class)->group(function () {
    Route::get('/category', 'category')->name('category');
    Route::get('/add_category', 'add_category')->name('add_category');
    Route::post('/add_category/form', 'add_categoryform')->name('add_categoryform');
    Route::get('/category_update/{id}', 'category_update')->name('category_update');
    Route::put('/update/{id}', 'update')->name('update');
    Route::put('/hide_category/{id}', 'hide')->name('hide_category');
    Route::put('/unhide_category/{id}', 'unhide')->name('unhide_category');
});
Route::controller(BillController::class)->group(function () {
    Route::get('/bill', 'bill')->name('bill');
    Route::post('/bills/{id}/approve', 'approve')->name('bills.approve');
    Route::delete('/bills/{id}/cancel', 'cancel')->name('bills.cancel');// huỷ đơn
    Route::delete('/bills/{id}', 'destroy')->name('bills.destroy');//xoá
});
Route::prefix('/')->controller(BannerController::class)->group(function () {
    Route::get('/banner', 'banner')->name('banner');
    Route::get('/add_banner', 'add_banner')->name('add_banner');
    Route::post('/add_bannerform', 'add_bannerform')->name('add_bannerform');
    Route::get('/update_banner/{id}', 'update_banner')->name('update_banner');
    Route::put('/update_bannerform/{id}', 'update_bannerform')->name('update_bannerform');
    Route::delete('/delete_banner/{id}', 'delete_banner')->name('delete_banner');
});
Route::prefix('/')->controller(CmtController::class)->group(function () {
    Route::get('/cmt', 'cmt')->name('cmt');
    Route::get('/update_cmt/{id}', 'update_cmt')->name('update_cmt');
    Route::put('/edit_cmt/{id}', 'edit_cmt')->name('edit_cmt');
});
Route::prefix('/')->controller(VoucherController::class)->group(function () {
    Route::get('/voucher', 'voucher')->name('voucher');
    Route::get('/update_voucher/{id}', 'update_voucher')->name('update_voucher');
    Route::put('/edit_voucher/{id}', 'edit_voucher')->name('edit_voucher');
});
Route::prefix('/')->controller(NewsController::class)->group(function () {
    Route::get('/news', 'news')->name('news');
    Route::get('/add_new', 'add_new')->name('add_new');
    Route::post('/add_new', 'add_news')->name('add_new');
    Route::delete('/delete_new/{id}', 'delete_news')->name('delete_new');
    Route::get('/news_update/{id}', 'news_update')->name('news_update');
    Route::put('/update_news/{id}', 'update_news')->name('update_news');
});