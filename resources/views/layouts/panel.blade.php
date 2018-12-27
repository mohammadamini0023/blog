<div class="container">
    @yield('panel')
    <div class="row">
        <div class="col-2">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
              menu
            </a>
            <a href="{{ route('AddProductGet') }}" class="list-group-item list-group-item-action">Add Product</a>
            <a href="{{ route('ShowProduct',['id'=>Auth::id()]) }}" class="list-group-item list-group-item-action">show product</a>
            <a href="{{ route('Showbidding',['id'=>Auth::id()]) }}" class="list-group-item list-group-item-action"> bindding sell</a>
            <a href="{{ route('showrejectproduct',['id'=>Auth::id()]) }}" class="list-group-item list-group-item-action disabled">reject product</a>
            <a href="{{ route('editecity') }}" class="list-group-item list-group-item-action disabled">edite city</a>
            <a href="{{ route('auctionswinner',['id'=>Auth::id()]) }}" class="list-group-item list-group-item-action disabled">Auctions winner</a>

          </div>
        </div>
    </div>
  </div>
