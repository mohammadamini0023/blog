<html>

<head>
    <link rel="stylesheet" href="css/persianDatepicker-default.css">
    <script src="js/persianDatepicker.min.js">
    </script>
</head>

<body>
    @extends('layouts.app') @extends('layouts.panel') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                     <form method="POST" action="{{ route('AddProductPost')}}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                    <input type="hidden" name="user_id" value="{{ auth::id() }}">
                    <input type="hidden" name="category" value="{{$category}}">

                            <fieldset enabled>
                                <div class="form-group">
                                    <label for="city">city</label>
                                    <select id="city" name="city" class="form-control">
                                    @foreach($city as $citys)
                                        <option value="{{ $citys->city_id }}">{{ $citys->city }}</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input type="text" id="price" name="pprice" class="form-control" placeholder="price">
                                </div>

                                <div>
                                    <label for="title_product">title product</label>
                                    <input type="text" name="title_product" id="">
                                </div>

                                <div>
                                    <label for="body_product">body product</label>
                                    <input type="text" name="body_product" id="">
                                </div>

                                <div>
                                    <label for="expiration"></label>
                                    <input type="text" name="expiration" id="">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Upload image</span>
                                    </div>
                                    <div class="custom-file">
                                      <input type="file" name="upimg[]" class="custom-file-input" id="inputGroupFile01" multiple >
                                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                  </div>



                                <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script src="js/main.js" type="text\javascript"></script>
</body>

</html>
`
