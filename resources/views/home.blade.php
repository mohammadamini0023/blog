@extends('layouts.app')
@extends('layouts.panel')
@section('panel')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





