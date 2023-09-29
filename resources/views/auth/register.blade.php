@extends('auth.layouts.appmain')

@section('content')

<div class="register-box">
    <div class="register-logo">
        <a href=""><b>Admin</b></a>
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
                <form method="POST" action="{{ route('register') }}">
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

                    <div class="input-group mb-3">
                        <input id="mobilenumber" type="number"
                            class="form-control @error('mobilenumber') is-invalid @enderror" name="mobilenumber"
                            value="{{ old('mobilenumber') }}" required autocomplete="mobilenumber" autofocus
                            placeholder="Mobile Number">

                        @error('mobilenumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-phone"></span>
                            </div>
                        </div>
                    </div>


                    <div class="">
                        <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                        <div class="input-group mb-3">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required autocomplete="address"
                                placeholder="Address">

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-address-card"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                        <div class="input-group mb-3">
                            <!-- <input id="" type="text"  name="" value="{{ old('country') }}" required autocomplete="country" placeholder="Country">
                               -->
                            @php $country= Helper::country() @endphp

                            <select name="country_id" id="country_dd"
                                class="form-control @error('country') is-invalid @enderror">
                                <option value="">Country</option>
                                @foreach($country as $countries)
                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                @endforeach

                            </select>
                            @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-flag"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                        <div class="input-group mb-3">
                            <!-- <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state_id" value="{{ old('state') }}" required autocomplete="state" placeholder="State"> -->

                            <select name="state_id" id="state_dd" class="form-control">
                                <option value="">State</option>
                            </select>

                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-city"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <select name="city_id" id="city_dd" class="form-control">
                            <option value="">City</option>

                        </select>
                        @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-city"></span>
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
                        <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> -->

                        <div class="input-group mb-3">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
        <div class="form-group">
          
           <select name="role" id="" class="form-control">
            <option value="">Select Role</option>

            @foreach ($role as $roles)
           
            <option value="{{$roles->name}}">{{$roles->name}}</option>
            @endforeach
           </select>
        </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $('#country_dd').on('change', function () {
            var idCountry = this.value;
            $("#state_dd").html('');
            $.ajax({
                url: "{{url('statenameget')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state_dd').html('<option value=""> State</option>');
                    $.each(result, function (key, value) {
                        $("#state_dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city_dd').html('<option value=""> City</option>');
                }
            });
        });
        $('#state_dd').on('change', function () {
            var idState = this.value;

            $("#city_dd").html('');
            $.ajax({
                url: "{{url('citynameget')}}",
                type: "POST",
                data: {
                    state_id: idState,

                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city_dd').html('<option value=""> City</option>');
                    $.each(res, function (key, value) {
                        $("#city_dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection