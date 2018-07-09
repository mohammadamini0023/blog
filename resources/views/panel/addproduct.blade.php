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
                            <fieldset enabled>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input type="text" id="price" name="pprice" class="form-control" placeholder="price">
                                </div>
                                <div class="form-group">
                                    <label for="color">color</label>
                                    <select id="color" name="color" class="form-control">
                                        <option>green</option>
                                        <option>yellow</option>
                                        <option>red</option>
                                        <option>blue</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category">category</label>
                                    <select id="category" name="category" class="form-control">
                                        @foreach($category as $categoris)
                                        <option value="{{$categoris}}" >{{$categoris}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Upload image</span>
                                    </div>
                                    <div class="custom-file">
                                      <input type="file" name="upimg" class="custom-file-input" id="inputGroupFile01">
                                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                  </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" name="description" id="description "  placeholder="enter discription"></input>
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
