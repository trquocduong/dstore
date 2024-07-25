<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerModel;

class BannerController extends Controller
{
    //
    public function banner(){
        $banner = BannerModel::orderBy('hide', 'asc')->get();
        return view ('admin.banner.banner',compact('banner'));
    }
    public function add_banner(){
        return view ('admin.banner.add_banner');
    }
    public function update_banner(Request $request,$id){
        $banner = BannerModel::findOrFail($id);
        return view ('admin.banner.update_banner',compact('banner'));
    }
    public function add_bannerform(Request $request)
    {
        $data = $request->only('ghichu', 'hide');
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $data['img'] = 'uploads/' . $imageName;
        }
    
        BannerModel::create($data);
        return redirect()->route('banner')->with('success', 'Thêm banner thành công!');
    }
    public function update_bannerform(Request $request ,$id)
    {
        $banner = BannerModel::findOrFail($id);
        $data = $request->only('ghichu', 'hide');
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $data['img'] = 'uploads/' . $imageName;
        }
    
        $banner->update($data);
        return redirect()->route('banner')->with('success', 'Sửa banner thành công!');
    }

    public function delete_banner(Request $request,$id){
        $banner = BannerModel::findOrFail($id);
        $banner->delete();
        return redirect()->route('banner')->with('success', 'Xoá banner thành công ');
    }
    
}
