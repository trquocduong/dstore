<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Relations\Relation;

class ProductsController extends Controller
{
    //
    public function product( Request $request)
    {
      $perPageProducts = $request->input('perPage', 5);

      // Lấy danh sách sản phẩm có mối quan hệ với danh mục và trường hidden = 0
      $products = ProductsModel::with('category')
                  ->whereHas('category', function ($query) {
                      $query->where('hidden', 0);
                  })
                  ->orderByDesc('id')
                  ->paginate($perPageProducts);

      return view('admin.products.product', compact('products','perPageProducts'));
    }
    
    public function add_products(){
      $category = CategoryModel::get();
       return view('admin.products.add_products',compact('category'));
    }
    public function update_products(Request $request ,$id){
      $category=CategoryModel::all();
      $products=ProductsModel::findOrFail($id);
       return view('admin.products.update_products',compact('products','category'));
    }
    public function productadd(Request $request){
      $category=CategoryModel::all();
      $data= $request->only('name',
      'price',
      'hide',
      'dacbiet',
      'view',
      'bestseller',
      'quantity',
      'iddm');
      if ($request->hasFile('img')) {
          $file = $request->file('img');
          $imageName = time() . '.' . $file->getClientOriginalExtension();
          $file->move(public_path('uploads'), $imageName);
          $data['img'] = 'uploads/' . $imageName;
      } else {
          $data['img'] = null;
      }
      ProductsModel::create($data); 
      return redirect()->route('product')->with('success', 'Thành công ');
  }
      public function delete_product($id) {
         $product = ProductsModel::findOrFail($id);
         if ($product->img && File::exists(public_path($product->img))) {
            File::delete(public_path($product->img));
         }
         $product->delete();
         return redirect()->route('product')->with('success', 'Xoá thành công sản phẩm và hình ảnh.');
      }

      public function edit_product(Request $request, $id){
         $category=CategoryModel::all();
         $product = ProductsModel::findOrFail($id);
         $data= $request->only('name', 
         'price',
         'hide',
         'dacbiet',
         'view',
         'bestseller',
         'quantity',
         'iddm');
         if ($request->hasFile('img')) {
            if ($product->img && file_exists(public_path($product->img))) {
               File::delete(public_path($product->img));
            }
            $file = $request->file('img');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $data['img'] = 'uploads/' . $imageName;
         } 
         $product->update($data); 
         return redirect()->route('product')->with('success', 'Thành công ');
      }
}
