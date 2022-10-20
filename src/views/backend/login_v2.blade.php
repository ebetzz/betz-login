@extends('simpleLogin::backend.template.templateLogin_v1')

@section('header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/Flip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>

@endsection

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
                            <svg width=100 height=150 version="1.0" xmlns="http://www.w3.org/2000/svg" width="760.000000pt" height="1020.000000pt" viewBox="0 0 760.000000 1020.000000" preserveAspectRatio="xMidYMid meet">
                                <metadata>
                                    Created by potrace 1.16, written by Peter Selinger 2001-2019
                                </metadata>
                                <g transform="translate(0.000000,1020.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                    <path class="fadeaway" fill="#3f77bc" d="M2750 8445 l-1124 -1124 34 -37 c47 -48 181 -136 255 -167 123 -51
188 -62 360 -61 144 0 169 3 248 27 213 65 275 112 642 486 170 174 385 392
477 486 l167 170 193 -190 c106 -104 525 -520 930 -924 l738 -734 -178 -185
c-97 -101 -222 -231 -277 -287 l-100 -104 -624 635 -624 635 -29 -28 c-41 -39
-131 -176 -163 -248 -54 -123 -70 -207 -69 -365 1 -116 5 -161 23 -225 27
-102 85 -222 146 -305 27 -36 769 -788 1649 -1671 l1601 -1606 8 996 c4 548 6
1385 5 1861 l-4 865 -34 62 c-29 52 -231 260 -1135 1170 -605 610 -1296 1307
-1535 1550 -239 244 -440 443 -445 443 -6 0 -516 -506 -1135 -1125z" />
                                    <path class="fadeaway" fill="#208d43" d="M621 7554 c-12 -43 -14 -2853 -2 -3419 l6 -310 30 -60 c26 -53 183
-214 1265 -1300 679 -682 1368 -1378 1530 -1548 161 -169 297 -306 301 -305 4
2 517 507 1139 1122 l1131 1119 -38 40 c-96 98 -269 184 -428 212 -202 35
-406 9 -570 -73 -136 -67 -188 -113 -676 -599 l-486 -484 -919 915 -919 914
290 291 c159 160 293 290 296 289 4 -2 253 -255 554 -563 301 -308 569 -582
596 -610 l49 -49 36 34 c174 166 274 459 244 718 -19 167 -80 321 -179 452
-28 36 -767 782 -1644 1659 l-1595 1594 -11 -39z" />
                                </g>
                            </svg>
                            <h2>Login</h2>
                        </div>
                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">Password</label>
                                    <a href="{{ route('forgotPassword.index') }}" class="float-end">
                                        Forgot Password?
                                    </a>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" required>
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
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Don't have an account? <a href="{{ route('register.index') }}" class="text-dark">Create One</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
<script>
    gsap.registerEffect({
        name: "fade"
        , defaults: {
            duration: 2
        }
        , effect: (targets, config) => {
            return gsap.to(targets, {
                duration: config.duration
                , opacity: 0
            });
        }
    });

    gsap.registerEffect({
        name: "fadeOut"
        , defaults: {
            duration: 2
        }
        , effect: (targets, config) => {
            return gsap.to(targets, {
                duration: config.duration
                , opacity: 1
            });
        }
    });

    document.querySelectorAll(".fadeaway").forEach(function(part) {
        part.addEventListener("mouseenter", function() {
            gsap.effects.fade(this);
        });
    });
    document.querySelectorAll(".fadeaway").forEach(function(logo) {
        logo.addEventListener("click", function() {
            gsap.effects.fadeOut(this);
        });
    });

</script>

@endsection
