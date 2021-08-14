@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href="#" class="logo logo-admin"><img src="/assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo" /></a>
                                    <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Sama Card</h4>
                                    <p class="text-muted mb-0">Sign in to continue to Sama Card Dashboard.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="p-3 pt-3">

                                    @error('email')
                                    <div class="alert alert-danger border-0" role="alert">  <strong>{{ $message }}</strong>.</div>
                                    @enderror

                                    <form method="POST" class="form-horizontal auth-form my-4" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="input-group mb-3"><input type="email" value="{{ old('email') }}" required class="form-control" name="email" id="email" placeholder="Enter email address" /></div>
                                        </div>
                                        <!--end form-group-->
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <div class="input-group mb-3"><input required type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" /></div>
                                        </div>
                                        <!--end form-group-->
                                        <div class="form-group row mt-4">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-switch switch-success">
                                                    <input type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember" class="custom-control-input" id="customSwitchSuccess2" /> <label class="custom-control-label text-muted" for="customSwitchSuccess2">Remember me</label>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-sm-6 text-right">
                                                <a href="#{{ route('password.request') }}" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end form-group-->
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end form-group-->
                                    </form>
                                    <!--end form-->
                                    <div class="m-3 text-center text-muted">
                                        <p class="">Don't have an account ? <a href="{{ route('register') }}" class="text-primary ml-2"> Resister as {{ env('APP_NAME') }} agent</a></p>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                            <div class="card-body bg-light-alt text-center"><span class="text-muted d-none d-sm-inline-block">{{ env('APP_NAME') }} ©{{ date('Y') }}</span></div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    @endsection
