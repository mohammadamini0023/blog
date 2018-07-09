<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     // contoroller show home auth
    public function index()
    {
        return view('home');
    }
    // contoriller show page AddProduct
    public function AddProductGet()
    {
        $category = DB::table('category')->pluck('category');
        return view('panel.addproduct',['category' => $category]);
    }

    public function AddProductPost(Request $request)
    {
      $category = DB::table('category')->where('category','=',$request['category'])->get(['category_id']);

        //insert product in table product
         $id = DB::table('product')->insertGetId(
            [
            'name' =>  $request['name'],
            'pprice'=>  $request['pprice'],
             'color' =>  $request['color'],
             'user_id'=>  $request['user_id'],
             'description'=>  $request['description'],
             'shipping_goods'=> 0,
             'expiration_at'=> '2018-06-30 16:29:30',
             ]);
             //insert category
             DB::table('procategory')->insert([
                 'category_id' => $category[0]->category_id,
                 'product_id' => $id,
             ]);
             //upload image
              if($request->hasFile('upimg')){
                $upimg = $request->file('upimg');
                $filename = time() . '.' . $upimg->getClientOriginalExtension();
                Image::make($upimg)->resize(500, 500)->save( public_path('/uploads/' . $filename ) );
                DB::table('upload_image')->insert(
                    ['product_id' =>  $id,
                     'path' => $filename,
                     ]);
            }
            return view('/home');
    }

    public function ShowProduct($id)
    {
        $product = DB::table('product')->get()->where('user_id','=',$id);
        $upload = DB::table('upload_image')->get();
        return view('panel.showproduct',['product' => $product , 'upload' => $upload ]);
    }




}
