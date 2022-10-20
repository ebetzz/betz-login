@extends('simpleLogin::backend.template.templateLogin_v1')

@section('content')

<div class="d-flex justify-content-center mt-5">
    <div class="card card-success shadow-lg">
        <div class="card-header text-center">
            <h1><b>Forgot password</b></h1>
        </div>
        <div class="card-body">
            <p class="login-box-msg">
                input your email and we will send a confirmation<br> to reset your password.
            </p>
            <p class="login-box-msg">
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </p>

            <form action="{{ route('forgotPassword.submit') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Mail my password</button>
                    </div>
                </div>
            </form>

            <div class="mt-3">&nbsp;</div>
            <p class="mb-1">
                <a href="{{ route('login.index') }}">Login to system</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register.index') }}" class="text-center">Register a new user</a>
            </p>
        </div>
    </div>
</div>
@endsection
