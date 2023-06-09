@extends('layouts.auth-master')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="card shadow-lg" style="width: 25rem;">
                <form method="post" action="{{ route('login.perform') }}">
                    <div class="card-header text-bg-danger p-3">
                        <img src="https://www.businesslist.ph/img/ph/j/1541558349-26-purplebug-inc.png" alt="" width="130px" height="30px">
                    </div>
                    <div class="card-body">
                        @include('layouts.partials.messages')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group form-floating mb-3">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="required" autofocus>
                            <label for="floatingName">Email</label>
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

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                        <div>
                            Don't have an account? <a href="{{ route('register.show') }}">Sign Up</a>
                        </div>
                        @include('auth.partials.copy')
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
