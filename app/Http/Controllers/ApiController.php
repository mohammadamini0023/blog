<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showcategoryget(){
        $category = \App\Category::with('children')->where('parent_id','=',0)->get();
        return response()->json($category,200);
    }
    public function showcategorypost(request $request ){
        $category = \App\Category::with('children')->where('parent_id',$request['category_id'])->get();
        return response()->json($category,200);
    }
}
