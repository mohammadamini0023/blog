<html>

<head>
    <link rel="stylesheet" href="css/persianDatepicker-default.css">
</head>

<body>
    @extends('layouts.app') @extends('layouts.panel')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">Dashboard</div></div>
            @foreach($product as $products)
            @foreach($upload as $uploads)
            @if($uploads->product_id == $products->product_id)
            <img src="{{ asset('/uploads/'.$uploads->path) }}" alt="">

            @endif
            @endforeach
            <h2>{{ $products->name }}</h2>
            <h3>{{ $products->pprice }}</h3>
            <h4>{{ $products->color }}</h4>
            <a href="{{ route('deleteproduct',['product_id'=>$products->product_id,'user_id'=>Auth::id()]) }}"><h6>delete</h6></a>
            <a href="{{ route('updataproductGet',['product_id'=>$products->product_id]) }}"><h6>update</h6></a>
            @endforeach
        </div>
    </div>

</body>

</html>
`
