@extends('layouts.app') @extends('layouts.panel')
@foreach($product as $products)
{{ ( $products ) }}
{{-- <a href="{{ route('updataproductGet',['product_id'=>$products->product_id]) }}">delete</a>
<a href="#">update</a> --}}

<hr>
@endforeach
