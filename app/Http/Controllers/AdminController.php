<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = \App\Product::where('confirm_manager',0)->get();
        return view('admin.home',['product' => $product]);
    }

    public function showcategory()
    {
        $category = DB::table('category')->get()->where('parent_id',0);
        $category1 = \App\Category::with('children')->get()->where('parent_id','!=',0);
        return view('admin.showcategory' , [ 'category' => $category , 'category1' => $category1]);
    }

    public function CreateCategoryGet()
    {
        $category = \App\Category::get();
        return view('admin.createcategory' , [ 'category' => $category ]);
    }

    public function CreateCategoryPost(request $request )
    {
        DB::table('category')->insert([
            'category' =>  $request['namecategory'],
            'parent_id' => $request['parentcategory'],
        ]);

        return redirect()->action('AdminController@showcategory');
    }

    public function createcitypost(request $request )
    {
        $test= DB::table('city')->insert([
            'city' =>  $request['city'],
        ]);

        return redirect()->action('AdminController@showcity') ;
    }

    public function showcity(request $request )
    {
        $city = DB::table('city')->get();
        return view('admin.showcity' , [ 'city' => $city ]);
    }




    public function showcheckproduct()
    {
        $product = \App\Product::where([['confirm_manager',0] , ['reject_manager',0]])->get();

        return view('admin.showcheckproduct' , [ 'product' => $product ]);

    }



    public function checkproduct($product_id)
    {

        DB::table('product')->where('product_id', $product_id)->update([
            'confirm_manager' =>  1,

        ]);

        return redirect()->action('AdminController@showcheckproduct') ;

    }


    public function checkproductreject($product_id)
    {

        DB::table('product')->where('product_id', $product_id)->update([
            'reject_manager' =>  1,

        ]);

        return redirect()->action('AdminController@showcheckproduct') ;

    }


}
