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

                        @foreach($category as $categorys)
                        <ul>
                            <a href="{{ route('AddProductGet1',['category_id'=>$categorys->category_id]) }}"><li>{{$categorys->category}}</li></a>
                        </ul>
                        @endforeach
                        
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
