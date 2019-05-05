@extends('layouts.app') @extends('layouts.admin')
@foreach($product as $products)
{{ $products }} <br>
<a href="{{ route('checkproduct',['product_id'=>$products->product_id]) }}">submit</a>
<a href="{{ route('checkproductreject',['product_id'=>$products->product_id]) }}">reject</a>
<hr>
@endforeach
