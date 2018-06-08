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
                        <form method="POST" action="">
                            <fieldset enabled>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input type="text" id="price" class="form-control" placeholder="price">
                                </div>
                                <div class="form-group">
                                    <label for="color">color</label>
                                    <select id="color" class="form-control">
                                        <option>green</option>
                                        <option>yellow</option>
                                        <option>red</option>
                                        <option>blue</option>
                                    </select>
                                </div>
                                <input type="text" id="example1">
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <textarea class="form-control" name="description " id="description " cols="30" rows="10" placeholder="enter discription"></textarea>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
                                    <label class="form-check-label" for="disabledFieldsetCheck">
                                        Can't check this
                                    </label>
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
