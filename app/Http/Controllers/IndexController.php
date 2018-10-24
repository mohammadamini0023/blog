<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;

class IndexController extends Controller
{
public function showindex(Request $request)
  {
        if ($request->has('entercity')==true) {
            $product = \App\Product::orderby('created_at', 'desc')->paginate(4);
            $img = \App\Upload_image::get();
            return Response()->view('welcome',[])
                ->withCookie(cookie()->forever('city', $request['entercity']));
        }
      elseif($request->cookie('city') == null){
          $city = \App\City::get();
        return view('selectcity',['city' => $city]);

      }
    }

    public function showindex1(Request $request)
    {
       return $value = $request->cookie('city');
    }

public function Singlepage($product_id)
    {
        $product = \App\Product::get()->where('product_id','=',$product_id);
        $upload  = \App\Upload_image::get();
        $bidding = \App\Bidding::get()->where('product_id','=',$product_id);
        $comment = \App\Comment::get()->where('product_id','=',$product_id);
        return view('singlepage',['product' => $product , 'upload' => $upload , 'bidding' => $bidding , 'comment' => $comment]);
    }
}
