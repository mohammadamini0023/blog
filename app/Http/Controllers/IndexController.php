<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function showindex()
  {
      $product = \App\Product::orderby('created_at', 'desc')->paginate(4);
      $img = \App\Upload_image::get();
      return view('welcome',['product' => $product , 'img' => $img]);
    }

    public function Singlepage($product_id)
    {
        $product = \App\Product::get()->where('producct_id','=',$product_id);
        $upload  = \App\Upload_image::get();
        return view('singlepage',['product' => $product , 'upload' => $upload]);
    }
}
