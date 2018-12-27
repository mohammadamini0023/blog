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


    // contoroller show page AddProduct
    public function AddProductGet()
    {
        $category = DB::table('category')->where('parent_id','=',0)->get();
        return view('panel.selectcategory',['category' => $category]);
    }



    public function AddProductGet1($category_id)
    {
        $category = \App\Category::with('children')->where('category_id','=',$category_id)->get();
        $city = DB::table('city')->get();
        foreach($category as $categorys)
        {
            if( $categorys->children == '[]')
                {

                    return view('panel.addproduct',['city' => $city , 'category' => $categorys->category_id]);
                }
                $subcategory=$categorys->children;
                return view('panel.selectcategory' , [ 'category' => $subcategory ]);
            }
        }



     // contoriller show page AddProductPost
    public function AddProductPost(Request $request)
    {


        //insert product in table product
         $product_id = DB::table('product')->insertGetId(
            [
                'user_id'=>  $request['user_id'],
                'pprice'=>  $request['pprice'],
                'pcity'=> $request['city'],
                'title_product'=>  $request['title_product'],
                'body_product'=>  $request['body_product'],
                'expiration'=>  $request['expiration'],
             ]);

             //insert category
             DB::table('procategory')->insert([
                 'category_id' => $request['category'],
                 'product_id' => $product_id,
             ]);
             //upload image
              if($request->hasFile('upimg')){
                foreach($request->upimg as $upimgs){
                        $counter=rand(0, 10);
                        $filename = time() . $counter .'.' . $upimgs->getClientOriginalExtension();
                        Image::make($upimgs)->resize(500, 500)->save( public_path('/uploads/' . $filename ) );
                        DB::table('upload_image')->insert(
                        ['product_id' =>  $product_id,
                        'path' => $filename,
                        ]);
                        }
                }

            return view('/home');
    }





    public function ShowProduct($id)
    {
        $product = \App\Product::with('comment','city','bidding')->where('user_id','=',$id)->get();
        $img = \App\Upload_image::get();
        return view('panel.showproduct',['product' => $product , 'img'=> $img ]);
    }


    public function showrejectproduct($id)
    {
        $product = \App\Product::with('comment','city','bidding')->where([['user_id','=',$id],['reject_manager' , 1]])->get();
        $img = \App\Upload_image::get();
        return view('panel.showrejectproduct',['product' => $product , 'img'=> $img ]);
    }


    public function Showbidding($id)
    {
        $bidding = \App\Bidding::with('product')->where('user_id','=',$id)->get();

        return view('panel.showbidding',['bidding' => $bidding ]);
    }





    public function DeleteProduct($product_id)
    {
        $delete1 = \App\Product::where('product_id','=',$product_id)->delete();
        return redirect::route('ShowProduct',['id'=>Auth::id()])->with('status','delete product');
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





            public function Bidding(  Request $request)
            {
                DB::table('Bidding')->insert([
                    'user_id' => $request['user_id'],
                    'product_id' => $product_id = $request['product_id'],
                    'bprice' => $bprice = $request['bprice'],
                ]);
                return redirect()->action('Indexcontroller@singlepage',['product_id' => $product_id])->with('status','پیشنهاد قیمت شما با {{ $bprice }}موفقیت ثبت شد');
            }






            public function sendcomment( Request $request )
            {
                DB::table('comment')->insert([
                    'user_id' => $request['user_id'],
                    'product_id' => $product_id = $request['product_id'],
                    'body' =>  $request['body'],
                    'replay' => $request['body'],
                    'user_id2' => $request['user_id'],
                ]);
                return redirect()->action('Indexcontroller@singlepage',['product_id' => $product_id])->with('status','نظر شما با موفقیت ثبت شد.');

            }

            public function editecity()
            {
                $city = \App\City::get();
                return view('selectcity',['city' => $city]);
            }

            public function auctionswinner($user_id)
            {
                $bidding = \App\Bidding::with('product')->where('user_id','=',$user_id )->max('bprice');
                dd($bidding);

                $city = \App\City::get();
                return view('selectcity',['city' => $city]);
            }

}
