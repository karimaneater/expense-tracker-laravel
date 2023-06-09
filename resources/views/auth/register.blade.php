@extends('layouts.auth-master')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="card shadow-lg" style="width: 25rem;">
                <form method="post" action="{{ route('register.perform') }}">
                    <div class="card-header text-bg-danger p-3">
                        <img src="https://www.businesslist.ph/img/ph/j/1541558349-26-purplebug-inc.png" alt="" width="130px" height="30px">
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group form-floating mb-3">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
                            <label for="floatingName">Name</label>
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-floating mb-3">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                            <label for="floatingEmail">Email address</label>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-floating mb-3">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                            <label for="floatingPassword">Password</label>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                            <label for="floatingConfirmPassword">Confirm Password</label>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

                        <div>
                            Already have an account? <a href="{{ route('login.show') }}">Login</a>
                        </div>
                        @include('auth.partials.copy')
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection
