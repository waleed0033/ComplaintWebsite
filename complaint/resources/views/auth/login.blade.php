@extends('layout.app')

@section('content')

    <div class="container mh-100 align-items-center">
        <div class="row justify-content-sm-center h-100 mt-5">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">Email Address</label>
                                <input id="email" type="email" class="form-control @error('msg') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>
                                @error('msg')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">Password</label>
                                    <a href="#" class="float-end">
                                        Forgot Password?
                                    </a>
                                </div>
                                <input id="password" type="password"
                                       class="form-control @error('msg') is-invalid @enderror" name="password" required>
                            </div>

                            <div class="mb-3">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                <input type="hidden" class="@error('g-recaptcha-response') is-invalid @enderror">
                                @error('g-recaptcha-response')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
                            Don't have an account? <a href="{{ route('register') }}" class="text-dark">Create One</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
