<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Response;
use Cookie;
use Redirect;

use App\Product;
use App\City;
use App\Upload_image;


class IndexController extends Controller
{
    //show index and if set cookie
    public function showindex(Request $request)
      {
        if ($request->has('entercity')) {
            return redirect::route('showindex2')->withcookie(cookie::forever('city',$request['entercity']));
        }

        elseif($request->cookie('city') == null){
          $city = City::get();
        return view('selectcity',['city' => $city]);
        }
    }

    //show product in page
    public function showindex2(Request $request )
    {
      $mycity = $request->cookie('city');
      $product = Product::get()->where('pcity','=',$mycity , 'confirm_manager',1);
      return view ('welcome',['product' => $product ]);
      // if ($request->hasCookie('city')) {
      // }
      // else{
      //     return redirect::route('showindex');}

    }

    //show single page
    public function Singlepage($product_id)
        {
            $product = Product::with('comment','city','bidding')->get()->where('product_id','=',$product_id);
            $upload  = Upload_image::get()->where('product_id','=',$product_id);
            return view('singlepage',['product' => $product , 'upload' => $upload ]);
        }
}
