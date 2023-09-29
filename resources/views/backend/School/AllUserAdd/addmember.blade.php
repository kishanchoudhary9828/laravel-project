@extends('auth.layouts.appmain')

@section('content')

<div class="register-box">
    <div class="register-logo">
        <a href=""><b>Register</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
            <!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div> -->

            <div class="card-body">
                <form method="POST" action="{{url('studentdata')}}">
                    @csrf

                    <div class="">
                        <!-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> -->

                        <div class="input-group mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Full Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Email Address">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="">
                        <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                        <div class="input-group mb-3">
                            <input id="email" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required autocomplete="address"
                                placeholder=" Address">

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-address-card"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="input-group mb-3">
                            <select id="password" type="text"
                                class="form-control @error('user_type') is-invalid @enderror" name="user_type" required
                                autocomplete="" placeholder="address">
                            <option value="">Select Option</option>
                            <option value="1">Teacher</option>
                            <option value="2">Student</option>
                           
                          </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-address-card"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block"> {{ __('Register') }}</button>
                        </div>
                        <!-- /.col -->
                        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script> -->

@endsection