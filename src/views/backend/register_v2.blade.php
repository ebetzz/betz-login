@extends('simpleLogin::backend.template.templateLogin_v1')

@section('content')
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5">
                    {{-- empty  --}}
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <div class="fs-4 card-title fw-bold mb-4 text-center">

                            <h2>Register</h2>
                        </div>
                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="fullname">Full Name</label>
                                <input id="fullname" type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ old('fullname') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="username">Username</label>
                                <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-mail Address</label>
                                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password1">Password</label>
                                <input id="password1" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password2">Password</label>
                                <input id="password2" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                            </div>

                            <div class="text-center">
                                @if(session('status'))
                                <span class="text-center">
                                    {{ session('status') }}
                                </span>
                                @endif
                                @if($errors->any())
                                <ul class="list-unstyled text-danger">
                                    @foreach ($errors->all() as $error )
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" name="agreeTerms" id="terms" class="form-check-input">
                                    <label for="terms" class="form-check-label">I agree to the <a href="#">terms</a></label>
                                </div>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Already have account? <a href="{{ route('login.index') }}" class="text-dark">Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
