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
            <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
          </div>
        </div>
    </div>
  </div>
