<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewModel;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    //

    public function news(){
        $new = NewModel::orderBy('id', 'desc')->get();

        return view('admin.new.new',compact('new'));
    }
    public function add_new(){
        return view('admin.new.add_new');
    }
    public function add_news(Request $request)
    {
        $data = $request->only('title', 'mota','hienthi');
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $data['img'] = 'uploads/' . $imageName;
        }
    
        NewModel::create($data);
        return redirect()->route('news')->with('success', 'Thêm bài viết thành công!');
    }
    
    public function delete_news(Request $request,$id){
        $news = NewModel::findOrFail($id);
        if($news->img && File::exists(public_path($news->img))) {
            File::delete(public_path($news->img));

        }
        $news->delete();
        return redirect()->route('news')->with('success', 'Thành công ');

    }
    public function news_update(Request $request,$id){
        $news = NewModel::findOrFail($id);
        return view('admin.new.update_new',compact('news'));
    }
    public function update_news(Request $request,$id){
        $news = NewModel::findOrFail($id);
        $data=$request->only('title','mota','ngaynhap');
        if($news->img && File::exists(public_path($news->img))) {
            File::delete(public_path($news->img));

        }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $data['img'] = 'uploads/' . $imageName;
        } 
        $news->update($data);
        return redirect()->route('news')->with('success', 'Thành công ');

    }
}
