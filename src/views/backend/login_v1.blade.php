@extends('simpleLogin::backend.template.templateLogin_v1')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card card-success shadow-lg">
        <div class="card-header text-center">
            <h1><b>Welcome</b>, Please Login</h1>
        </div>
        <div class="card-body">
            <p class="login-box-msg">
                @if(session('status'))
                <div class="alert alert-secondary" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </p>

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            <div class="mt-3">&nbsp;</div>
            <p class="mb-1">
                <a href="{{ route('forgotPassword.index') }}">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register.index') }}" class="text-center">Register a new user</a>
            </p>

        </div>
    </div>
</div>

@endsection
