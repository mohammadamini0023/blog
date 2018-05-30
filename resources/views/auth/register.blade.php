@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- //value name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="ali" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        {{-- //value family --}}
                        <div class="form-group row">
                            <label for="family" class="col-md-4 col-form-label text-md-right">{{ __('Family') }}</label>

                            <div class="col-md-6">
                                <input id="family" type="text" class="form-control" placeholder="zamani" name="family" value="{{ old('family') }}" required autofocus>
                            </div>
                        </div>

                        {{-- //value email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="exampel@yahoo.com" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        {{-- //value password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="123456" name="password" required>
                            </div>
                        </div>

                        {{-- //Confirm-password --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" placeholder="123456" name="password_confirmation" required>
                            </div>
                        </div>


                        {{--// value phone --}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" maxlength="13" minlength="10" class="form-control" placeholder="0913-000-11-22" name="phone" value="{{ old('phone') }}" required autofocus>
                            </div>
                        </div>

                        {{-- //value address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="adress" type="text" class="form-control" placeholder="isfahan ahmad abad st p10" name="adress" value="{{ old('address') }}" required autofocus>
                            </div>
                        </div>

                        {{-- //button submit --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
