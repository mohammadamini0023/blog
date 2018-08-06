<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Carbon;


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
     // contoriller show page AddProductPost
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
             'created_at' => carbon::now(),
             'updated_at' => carbon::now(),
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
        $product = \App\Product::get()->where('user_id','=',$id);
        $upload  = \App\Upload_image::get();
        return view('panel.showproduct',['product' => $product , 'upload' => $upload]);
    }

    public function DeleteProduct($user_id , $product_id)
    {
        $delete1 = \App\Product::where('product_id','=',$product_id)->delete();
        $product = \App\Product::get()->where('user_id','=',$user_id);
        $upload = DB::table('upload_image')->get();
        return view('panel.showproduct',['product' => $product , 'upload' => $upload ])->with('status','delete product');
    }

    public function updataproductGet($product_id)
    {
        $product = DB::table('product')->get()->where('product_id','=',$product_id);
        $upload = DB::table('upload_image')->get()->where('product_id','=',$product_id);
        $category = DB::table('category')->pluck('category');
        return view('panel.updataproduct',['product' => $product , 'upload' => $upload , 'category' => $category]);
    }

    public function updataproductPost($product_id, Request $request)
    {
        $category = DB::table('category')->where('category','=',$request['category'])->get(['category_id']);
        DB::table('product')->where('product_id', $product_id)->update([
            'name' => $request['name'],
            'pprice' => $request['pprice'],
            'color' => $request['color'],
            'description' => $request['description'],
            'shipping_goods'=> 0,
            'updated_at' => carbon::now(),
            'expiration_at'=> '2018-06-30 16:29:30',
            ]);

            DB::table('procategory')->where('product_id', $product_id)->update([
                'category_id'  =>$category[0]->category_id,
            ]);


            if($request->hasFile('upimg')){
                $upimg = $request->file('upimg');
                $filename = time() . '.' . $upimg->getClientOriginalExtension();
                Image::make($upimg)->resize(500, 500)->save( public_path('/uploads/' . $filename ) );
                DB::table('upload_image')->where('product_id','=', $product_id)->update(
                    [
                     'path' => $filename,
                     ]);
                    }

            return redirect()->action('HomeController@ShowProduct',['id' => Auth::id()]);
            }

}
