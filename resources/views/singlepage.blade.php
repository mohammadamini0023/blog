<html>

<head>
    <link rel="stylesheet" href="css/persianDatepicker-default.css">
</head>

<body>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @extends('layouts.app')
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

            @if (Auth::check())
            ثبت قیمت :
            <form action="{{ route('Bidding',['product_id'=>$products->product_id]) }}" method="POST">
                    {!! csrf_field() !!}
                <input type="text" name="bprice" id="bprice">
                <input type="hidden" name="user_id" value="{{ auth::id() }}">
                <input type="hidden" name="product_id" value="{{ $product_id=$products->product_id }}">
                <button type="submit" class="btn btn-primary">ثبت قیمت</button>
            </form>
            @else
            <a href="{{ route('register') }}">برای ثبت قیمت و شرکت در مزایده عضو شوید</a>
            @endif
            @endforeach

        </div>
    </div>
    <div>
            <table class="table">
                    <thead>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>bidding</th>
                        <th>date\time</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($bidding as $biddings)
                      <tr>
                        <td>{{$biddings->user[0]->name}}</td>
                        <td>{{$biddings->user[0]->family}}</td>
                        <td>{{$biddings->bprice}}</td>
                        <td>{{$biddings->created_at}}</td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
    </div>
    <div>
        @if (Auth::check())
        <form action="{{ route('sendcomment',['product_id'=>$products->product_id]) }}" method="POST">
            <div class="form-group">
                    {!! csrf_field() !!}
              <label for="exampleInputEmail1">comment : </label>
              <input type="hidden" name="product_id" value="{{ $product_id }}">
              <input type="hidden" name="user_id" value="{{ auth::id() }}">
              <textarea name="body" class="form-control" id="comment" cols="10" rows="5"></textarea>
              <button type="submit" class="btn btn-primary">enter comment</button>
            </div>
        </form>
        @else
        <a href="{{ route('register') }}">برای ثبت نظر عضو سایت شوید. </a>
        @endif
    </div>

    <div>
        <div class="detailBox">
                <div class="titleBox">
                  <label>Comment Box</label>
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                </div>
                <div class="commentBox">

                    <p class="taskDescription">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="actionBox">
                    <ul class="commentList">
                        @foreach($comment as $comments)
                        <li>
                            <div class="commentText">
                                <p class="">{{ $comments->user[0]->name }}</p> <span class="date sub-text">{{ $comments->created_at }}1</span>
                                <p>{{$comments->body}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
    </div>

</body>

</html>
`
