{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app-volt')

@section('content')
    <div class="container">
        <div class="text-center">
        </div>
        <p class="text-center">
            <a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                Back to homepage
            </a>
        </p>
        <div class="row justify-content-center form-bg-image"
            style="background-image: url('{{ asset('#') }}');">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                    <div class="text-center text-md-center mb-4 mt-md-0">
                    <img src="images/sedang_1655190484_logo_desa-removebg-preview.png" alt="Logo" class="logo">
                    <h2 class="mb-0 h3">Ketewel Geografic Information System</h2>
                    </div>
                    <form action="{{ route('login') }}" class="mt-4" method="POST">
                        @csrf
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="email">Your Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </span>
                                <input type="email"
                                    class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                    placeholder="example@company.com" name="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End of Form -->
                        <div class="form-group">
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="password">Your Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input type="password" placeholder="Password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                        name="password">
                                    @error('password')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End of Form -->
                            <div class="d-flex justify-content-between align-items-top mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember">
                                    <label class="form-check-label mb-0" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <div><a href="./forgot-password.html" class="small text-right">Lost password?</a></div>
                            </div>
                        </div>
                        <div class="container">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-gray-800" id="signup-button">Sign up</button>
                        </div>
                        <div id="success-message">Anda berhasil login</div>
                    </div>
                    </form>
                    <div class="mt-3 mb-4 text-center">
                        <span class="fw-normal">Visit our social media</span>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <a href="https://web.facebook.com/kantor.perbekelketewel.3" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                            aria-label="facebook button" title="facebook button">
                            <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512">
                                <path fill="currentColor"
                                    d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                </path>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/desaketewel/" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                            aria-label="instagram button" title="instagram button">
                            <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" 
                                    d="M224.1 141c-63.6 0-115.1 51.5-115.1 115.1s51.5 115.1 115.1 115.1 115.1-51.5 115.1-115.1S287.6 141 224.1 141zm0 190.7c-41.9 0-75.6-33.7-75.6-75.6s33.7-75.6 75.6-75.6 75.6 33.7 75.6 75.6-33.7 75.6-75.6 75.6zm146.4-194.3c0 14.9-12 27-27 27-14.9 0-27-12-27-27s12-27 27-27 27 12 27 27zm76.1 27.2c-.4-8.2-1.9-16.2-4.1-23.9-3.9-14.2-12.1-27-23.2-37.5-11.6-11.2-25.3-19.5-39.9-24.4-7.8-2.7-15.8-4.4-23.9-4.8-8.2-.4-16.5-.4-24.7-.4h-100.7c-8.2 0-16.5 0-24.7.4-8.1.4-16.1 2.1-23.9 4.8-14.6 4.9-28.3 13.2-39.9 24.4-11.2 10.5-19.4 23.3-23.2 37.5-2.2 7.7-3.7 15.7-4.1 23.9-.4 8.2-.4 16.5-.4 24.7v100.7c0 8.2 0 16.5.4 24.7.4 8.2 1.9 16.2 4.1 23.9 3.9 14.2 12.1 27 23.2 37.5 11.6 11.2 25.3 19.5 39.9 24.4 7.8 2.7 15.8 4.4 23.9 4.8 8.2.4 16.5.4 24.7.4h100.7c8.2 0 16.5 0 24.7-.4 8.1-.4 16.1-2.1 23.9-4.8 14.6-4.9 28.3-13.2 39.9-24.4 11.2-10.5 19.4-23.3 23.2-37.5 2.2-7.7 3.7-15.7 4.1-23.9.4-8.2.4-16.5.4-24.7V192.6c0-8.2 0-16.5-.4-24.7zM398.8 392.8c-.3 6.8-1.5 13.5-3.5 20-3.2 10.7-9.7 20.3-18.9 27.6-9.7 7.9-21.5 13.1-33.7 15.7-7 1.3-14.1 1.9-21.2 2.2-8.2.3-16.4.3-24.7.3H160.1c-8.2 0-16.5 0-24.7-.3-7-.3-14.1-.9-21.2-2.2-12.2-2.6-24-7.8-33.7-15.7-9.2-7.3-15.7-16.9-18.9-27.6-2-6.5-3.2-13.2-3.5-20-.3-8.2-.3-16.5-.3-24.7V192.6c0-8.2 0-16.5.3-24.7.3-6.8 1.5-13.5 3.5-20 3.2-10.7 9.7-20.3 18.9-27.6 9.7-7.9 21.5-13.1 33.7-15.7 7-1.3 14.1-1.9 21.2-2.2 8.2-.3 16.4-.3 24.7-.3h100.7c8.2 0 16.5 0 24.7.3 7 .3 14.1.9 21.2 2.2 12.2 2.6 24 7.8 33.7 15.7 9.2 7.3 15.7 16.9 18.9 27.6 2 6.5 3.2 13.2 3.5 20 .3 8.2.3 16.5.3 24.7v100.7c0 8.2 0 16.5-.3 24.7z">
                                </path>
                            </svg>
                        </a>
                        <a href="https://ketewel.desa.id/" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                            aria-label="website button" title="website button">
                            <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fas"
                                data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                <path fill="currentColor" 
                                    d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm222.2 172H380.4c-2.5-16.2-6-32-10.3-47.4 44.7 18.5 82.2 52.5 100.1 94.4zm-103.1 0H128.9c-2.4-15.2-4-31.1-4.8-47.4h248.1c-.8 16.3-2.4 32.2-4.7 47.4zM248 34c22.4 0 49.4 40.1 61.9 110.1H186.1C198.6 74.1 225.6 34 248 34zM114.9 50.6C95.4 92.5 83.4 138.5 78.3 186H30.2C45.8 115.5 75.6 61.2 114.9 50.6zM16.9 218h48.9c1.1 16.3 2.8 32.3 5 47.4H20.3c-.9-7.8-1.3-15.8-1.3-23.8 0-8.6.5-17 1.3-25.6zM30.2 326h48.1c5.1 47.5 17.1 93.5 36.6 135.4C75.6 450.8 45.8 396.5 30.2 326zm84.7 47.4h248.1c.8 16.3 2.4 32.2 4.7 47.4H128.9c2.4 15.2 4 31.1 4.8 47.4zm57.6 104c-1.5-7.1-2.8-14.2-3.9-21.4h161.1c-1.1 7.2-2.4 14.3-3.9 21.4-10.6 50.7-30 91.8-43.8 91.8s-33.2-41.1-43.8-91.8zM380.4 362h48.1c-15.6 70.5-45.4 124.8-84.7 135.4 19.5-41.9 31.5-87.9 36.6-135.4zM20.3 294.4h48.6c-2.2 15.1-3.9 31.1-5 47.4H16.9c-.8-8.6-1.3-17-1.3-25.6 0-8 0.4-16 1.3-23.8zm312.1 89.9H186.1C198.6 437.9 225.6 478 248 478c22.4 0 49.4-40.1 61.9-93.7zm33.7-186.3H128.9c2.5 16.2 6 32 10.3 47.4h216.4c4.3-15.4 7.8-31.2 10.3-47.4zm35.1 186.3c19.5-41.9 31.5-87.9 36.6-135.4h48.1c-15.6 70.5-45.4 124.8-84.7 135.4z">
                                </path>
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/channel/UCKRZ-4Am8-SSeq4-C9Z0cOw" class="btn btn-icon-only btn-pill btn-outline-gray-500"
                            aria-label="youtube button" title="youtube button">
                            <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                    d="M549.655 124.083C545.562 108.267 534.28 95.658 519.467 91.57 480.385 79.252 288 79.252 288 79.252s-192.385 0-231.467 12.318c-14.813 4.088-26.095 16.697-30.188 32.513-13.323 50.84-19.347 102.516-19.347 154.918s6.025 104.078 19.347 154.918c4.093 15.816 15.375 28.425 30.188 32.513 39.082 12.318 231.467 12.318 231.467 12.318s192.385 0 231.467-12.318c14.813-4.088 26.095-16.697 30.188-32.513 13.323-50.84 19.347-102.516 19.347-154.918s-6.025-104.078-19.347-154.918zM232 342.857V169.143l142.857 86.857L232 342.857z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <span class="fw-normal">
                            Not registered?
                            <a href="{{ route('register') }}" class="fw-bold">Create account</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection