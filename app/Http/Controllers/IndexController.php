<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Response;
use Cookie;
use Redirect;



class IndexController extends Controller
{



public function showindex(Request $request)
  {
        if ($request->has('entercity')) {
            return redirect::route('showindex2')->withcookie(cookie::forever('city',$request['entercity']));
        }

      elseif($request->cookie('city') == null){
          $city = \App\City::get();
        return view('selectcity',['city' => $city]);
      }
    }

    public function showindex2(Request $request )
    {
        if ($request->hasCookie('city')) {
            $mycity = $request->cookie('city');
            $product = \App\Product::get()->where('pcity','=',$mycity , 'confirm_manager',1);
            return view ('welcome',['product' => $product ]);
        }
        else{
            return redirect::route('showindex');

        }
    }




public function Singlepage($product_id)
    {
        $product = \App\Product::with('comment','city','bidding')->get()->where('product_id','=',$product_id);
        $upload  = \App\Upload_image::get()->where('product_id','=',$product_id);

        return view('singlepage',['product' => $product , 'upload' => $upload ]);
    }
}
