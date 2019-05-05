<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Carbon;

use App\Product;
use App\Category;
use App\City;
use App\Procategory;
use App\Upload_image;
use App\Bidding;
use App\Comment;





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
      $category = Category::where('parent_id','=',0)->get();
      return view('panel.selectcategory',['category' => $category]);
    }


    //add product get form
    public function AddProductGet1($category_id)
    {
        $category = Category::with('children')->where('category_id','=',$category_id)->get();
        $city = City::get();
        foreach($category as $categorys)
        {
          if( $categorys->children == '[]'){
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
         $product_id = Product::insertGetId(
            [
                'user_id'=>  $request['user_id'],
                'pprice'=>  $request['pprice'],
                'pcity'=> $request['city'],
                'title_product'=>  $request['title_product'],
                'body_product'=>  $request['body_product'],
                'expiration'=>  $request['expiration'],
             ]);
        //insert category
        Procategory::insert([
          'category_id' => $request['category'],
          'product_id' => $product_id,
        ]);
        //upload image
        if($request->hasFile('upimg')){
            foreach($request->upimg as $upimgs){
                  $counter=rand(0, 10);
                  $filename = time() . $counter .'.' . $upimgs->getClientOriginalExtension();
                  Image::make($upimgs)->resize(500, 500)->save( public_path('/uploads/' . $filename ) );
                  Upload_image::insert(
                  ['product_id' =>  $product_id,
                  'path' => $filename,
                  ]);
            }
          }
        return view('/home');
    }

    //show product by id
    public function ShowProduct($id)
    {
        $product = Product::with('comment','city','bidding')->where('user_id','=',$id)->get();
        $img = Upload_image::get();
        return view('panel.showproduct',['product' => $product , 'img'=> $img ]);
    }

    //show reject product
    public function showrejectproduct($id)
    {
        $product = Product::with('comment','city','bidding')->where([['user_id','=',$id],['reject_manager' , 1]])->get();
        $img = Upload_image::get();
        return view('panel.showrejectproduct',['product' => $product , 'img'=> $img ]);
    }

    //show bindding by id user
    public function Showbidding($id)
    {
        $bidding = Bidding::with('product')->where('user_id','=',$id)->get();
        return view('panel.showbidding',['bidding' => $bidding ]);
    }

    //method delete product
    public function DeleteProduct($product_id)
    {
        $delete1 = Product::where('product_id','=',$product_id)->delete();
        return redirect::route('ShowProduct',['id'=>Auth::id()])->with('status','delete product');
    }

    //updata product get form
    public function updataproductGet($product_id)
    {
        $product = Product::get()->where('product_id','=',$product_id);
        $upload = Upload_image::get()->where('product_id','=',$product_id);
        $category = Category::pluck('category');
        return view('panel.updataproduct',['product' => $product , 'upload' => $upload , 'category' => $category]);
    }

    //updata produt by post product
    public function updataproductPost($product_id, Request $request)
    {
        $category = Category::where('category','=',$request['category'])->get(['category_id']);
        Product::where('product_id', $product_id)->update([
            'name' => $request['name'],
            'pprice' => $request['pprice'],
            'color' => $request['color'],
            'description' => $request['description'],
            'shipping_goods'=> 0,
            'updated_at' => carbon::now(),
            'expiration_at'=> '2018-06-30 16:29:30',
            ]);

        Procategory::where('product_id', $product_id)->update([
            'category_id'  =>$category[0]->category_id,
        ]);

        if($request->hasFile('upimg')){
            $upimg = $request->file('upimg');
            $filename = time() . '.' . $upimg->getClientOriginalExtension();
            Image::make($upimg)->resize(500, 500)->save( public_path('/uploads/' . $filename ) );
            Upload_image::where('product_id','=', $product_id)->update(
                ['path' => $filename,]);
          }
        return redirect()->action('HomeController@ShowProduct',['id' => Auth::id()]);
      }

      //method set bidding fot product
      public function Bidding(Request $request)
      {
          Bidding::insert([
              'user_id' => $request['user_id'],
              'product_id' => $product_id = $request['product_id'],
              'bprice' => $bprice = $request['bprice'],
          ]);
          return redirect()->action('Indexcontroller@singlepage',['product_id' => $product_id])->with('status','پیشنهاد قیمت شما با {{ $bprice }}موفقیت ثبت شد');
      }

      //mothod send comment
      public function sendcomment( Request $request )
      {
        Comment::insert([
            'user_id' => $request['user_id'],
            'product_id' => $product_id = $request['product_id'],
            'body' =>  $request['body'],
            'replay' => $request['body'],
            'user_id2' => $request['user_id'],
        ]);
        return redirect()->action('Indexcontroller@singlepage',['product_id' => $product_id])->with('status','نظر شما با موفقیت ثبت شد.');
      }

      //method select city
      public function editecity()
      {
        $city = City::get();
        return view('selectcity',['city' => $city]);
      }

      //auction swinner
      public function auctionswinner($user_id)
      {
          $bidding = Bidding::with('product')->where('user_id','=',$user_id )->max('bprice');
          $city = City::get();
          return view('selectcity',['city' => $city]);
      }

}
