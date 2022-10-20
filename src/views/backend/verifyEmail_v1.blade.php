@extends('simpleLogin::backend.template.templateLogin_v1')

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="card card-success shadow-lg">
        <div class="card-header text-center">
            <h1>Welcome, <b>{{ $user }}</b></h1>
        </div>
        <div class="card-body">

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
                @if(session('message'))
                <div class="alert alert-success" role="alert">
                    <ul class="list-unstyled">
                        <li>{{ session('message') }}</li>
                    </ul>
                </div>
                @endif
            </p>

            <label for="">your email:</label>
            <h4 id="email" class="text-center">{{ $email }}</h4>
            <div class="mt-3">&nbsp;</div>

            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-block">Resend verify Email</button>
            </form>
            <form class="mt-1" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-secondary btn-block">Take me back to login page</button>
            </form>
        </div>
    </div>
</div>
@endsection
