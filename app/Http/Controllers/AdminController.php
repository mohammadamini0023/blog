<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use \App\Product;
use \App\Category;
use \App\City;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //show index page
    public function index()
    {
        $product = Product::where('confirm_manager',0)->get();
        return view('admin.home',['product' => $product]);
    }

    //show category
    public function showcategory()
    {
        $category = Category::get()->where('parent_id',0);
        $category1 = Category::with('children')->get()->where('parent_id','!=',0);
        return view('admin.showcategory' , [ 'category' => $category , 'category1' => $category1]);
    }

    //get category
    public function CreateCategoryGet()
    {
        $category = Category::get();
        return view('admin.createcategory' , [ 'category' => $category ]);
    }

    //create category and post category
    public function CreateCategoryPost(request $request )
    {
        Category::insert([
            'category' =>  $request['namecategory'],
            'parent_id' => $request['parentcategory'],
        ]);
        return redirect()->action('AdminController@showcategory');
    }

    //create City
    public function createcitypost(request $request )
    {
        City::insert([
            'city' =>  $request['city'],
        ]);
        return redirect()->action('AdminController@showcity') ;
    }

    //show list city
    public function showcity(request $request )
    {
        $city = City::get();
        return view('admin.showcity' , [ 'city' => $city ]);
    }

    //page show falow product
    public function showcheckproduct()
    {
        $product = Product::where([['confirm_manager',0] , ['reject_manager',0]])->get();
        return view('admin.showcheckproduct' , [ 'product' => $product ]);
    }

    //method check product
    public function checkproduct($product_id)
    {
        Product::where('product_id', $product_id)->update([
            'confirm_manager' =>  1,
        ]);
        return redirect()->action('AdminController@showcheckproduct') ;
    }

    //method reject product
    public function checkproductreject($product_id)
    {
        Product::where('product_id', $product_id)->update([
            'reject_manager' =>  1,
        ]);
        return redirect()->action('AdminController@showcheckproduct') ;
    }
}
