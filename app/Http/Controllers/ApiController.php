<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\City;

class ApiController extends Controller
  {
    //show index1 for user show all product
    public function ProCategoryIndex()
    {
      $product=Product::orderBy('created_at','DESC')->where('confirm_manager',1)->with('Upload_image','City','Bidding')->paginate(8);
      return response()->json($product,200);
    }

    //show index1 for user show all category
    public function showcategoryget(request $request){
        $category = Category::with('children')->where('parent_id',$request -> get('category_id',0))->get();
        return response()->json($category,200);
    }

    //show product for select categorys
    public function ProCategorySelect(request $request){
    $category_id = $request->get('category_id',0);
    $category = Category::where('parent_id',$category_id)->with('children')->get();

    $numcategory=count($category);
    $numberSubCategory=0;
    $subCategory;

    if($category_id==0){
      $products=Product::where('confirm_manager','=',1)->with('Upload_image','City','Bidding')->orderByDesc('pprice')->paginate(8);
      return response()->json($products,200);
    }

    else if($category->isEmpty()){
      $products=Product::where([['procategory','=', $category_id],['confirm_manager','=',1]] )->with('Upload_image','City','Bidding')->orderByDesc('pprice')->paginate(8);
      return response()->json($products,200);
    }

    else{
      for ($i=0; $i < $numcategory ; $i++) {
          $numberchildren=count($category[$i]->children);
          if ($category[$i]->children->isEmpty()) {
              $subCategory[$numberSubCategory]=$category[$i]->category_id;
              $numberSubCategory++;
            }
          else {
            for ($j=0; $j < $numberchildren ; $j++) {
              $subCategory[$numberSubCategory]=$category[$i]->children[$j]->category_id;
              $numberSubCategory++;
              }
            }
          }
      }
    $products=Product::whereIn('procategory', $subCategory)->where('confirm_manager','=',1)->with('Upload_image','City','Bidding')->orderByDesc('pprice')->paginate(8);
    return response()->json($products,200);
  }

  //show city
  public function getcity(){
      $city=City::orderBy('city','DESC')->get();
      return response()->json($city,200);
  }



}
