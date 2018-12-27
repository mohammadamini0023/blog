<!doctype html>
<html lang="en">
    <head>
        <title>lara</title>
        <meta charset="utf8">
    </head>
    <body>

            @foreach($product as $products)
                {{ var_dump($products) }} <br>
                <a href="{{ route('singlepage',['product_id'=>$products->product_id]) }}">other</a>
                <hr>
                @endforeach





    </body>
</html>
