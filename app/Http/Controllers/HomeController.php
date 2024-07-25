<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use App\Models\NewModel;
use App\Models\BannerModel;

class HomeController extends Controller
{
    //
    public function home() {
        $categories = CategoryModel::where('hidden', '0')->get();
        foreach ($categories as $category) {
            $category->product_count = $category->products()->count();
        }
        $news=ProductsModel::where('dacbiet', '2')->limit(6)->get();
        $sale=ProductsModel::where('dacbiet', '1')->limit(4)->get();
        $blog=NewModel::limit(4)->get();

        return view('components.home', compact('categories','news','sale','blog'));
    }
    
    public function new(){
        return view('pages.new');
    }

}
