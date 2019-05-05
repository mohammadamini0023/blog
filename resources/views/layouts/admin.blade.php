<div class="container">
    @yield('admin')
    <div class="row">
        <div class="col-2">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
              menu
            </a>
            <a href="{{ route('CreateCategoryGet') }}" class="list-group-item list-group-item-action">create category</a>
            <a href="{{ route('showcategory') }}" class="list-group-item list-group-item-action">show category</a>
            <a href="{{ route('createcity') }}" class="list-group-item list-group-item-action">create city</a>
            <a href="{{ route('showcity') }}" class="list-group-item list-group-item-action disabled">show city</a>
            <a href="{{ route('showcheckproduct') }}" class="list-group-item list-group-item-action disabled">check product</a>
          </div>
        </div>
    </div>
  </div>
