<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //
    public function category(Request $request){
        // $category= CategoryModel::orderBy('id','desc')->get();
        $perPageCatrgory = $request->input('perPage', 5); 
        $category = CategoryModel::paginate($perPageCatrgory);
        return view ('admin.category.category',compact('category','perPageCatrgory'));
    }
    public function add_category(){
        return view('admin.category.add_category');
    }
    public function add_categoryform(Request $request){
        $data= $request->only('name',
        'name',
        'home',
        'ghichu',
       );
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $data['img'] = 'uploads/' . $imageName;
        } else {
            $data['img'] = null;
        }
        CategoryModel::create($data); 
        return redirect()->route('category')->with('success', 'Bạn đã thêm danh mục thành công !');
    }
    public function category_update(request $request, $id){
        $category= CategoryModel::findOrFail($id);
        return view ('admin.category.update_category',compact('category'));
    }
    public function hide($id) {
        $category = CategoryModel::findOrFail($id);
        $category->hidden = true;// cột hidden = 0
        $category->save();
        return redirect()->route('category')->with('success', 'Bạn đã ẩn danh mục thành công!');
    }
    public function unhide($id) {
        $category = CategoryModel::findOrFail($id);
        $category->hidden = false;// cột hidden = 1
        $category->save();
        return redirect()->route('category')->with('success', 'Bạn đã mở danh mục thành công!');
    }
    public function update(Request $request,$id){
        $category =CategoryModel::findOrFail($id);
        $data= $request->only('name', 
        'name',
        'home',
        'ghichu',);
        if ($request->hasFile('img')) {
           if ($category->img && file_exists(public_path($category->img))) {
              File::delete(public_path($category->img));
           }
           $file = $request->file('img');
           $imageName = time() . '.' . $file->getClientOriginalExtension();
           $file->move(public_path('uploads'), $imageName);
           $data['img'] = 'uploads/' . $imageName;
        } 
        $category->update($data); 
        return redirect()->route('category')->with('success', 'Thành công ');

    }
}
