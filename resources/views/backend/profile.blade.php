
@extends('backend.layout.main')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <a href="{{url('adminchangepassword')}}">
              <li class="breadcrumb-item active">Change Password</li>
              </a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General info</h3>
              </div>
<!-- 
          @if(Session::has('success'))
              <div class="alert alert-success">
                  {{Session::get('success')}}
              </div>
          @endif
              <!-- /.card-header -->
              <!-- form start -->

              


              <form action="{{url('profileupdated',Auth::user()->id)}}" method= "post" >
                @csrf
              <div class="card-body">
                
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Name" name="name" value='{{ Auth::user()->name }}'>
                  </div>
                  @error('name') <span style=color:red >{{$message}}</span> @enderror

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value='{{ Auth::user()->email }}'>
                  </div>
                  @error('email') <span style=color:red >{{$message}}</span> @enderror

                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile Number</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Mobile No." name="mobilenumber" value="{{ Auth::user()->mobilenumber }}">
                  </div>
                  @error('mobilenumber') <span style=color:red >{{$message}}</span> @enderror

                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Address" name="address" value="{{ Auth::user()->address}}">
                  </div>
                  @error('address') <span style=color:red >{{$message}}</span> @enderror
                 
                 

                  
                  <label for="exampleInputPassword1">Country</label><br>
                  <select name="country_id" id="country_dd" class="form-control">
                  <option value="">Select Country</option>
                  @foreach ($country as $countries)
                  <option value="{{$countries->id}}" @if (Auth::user()->country_id==$countries->id) selected @endif >{{$countries->name}}</option>
                  @endforeach
                      
                     
                      
                  </select>
                  
         
                  <label for="exampleInputPassword1">State</label><br>
                    <select name="state_id" id="state_dd"  class="form-control">
                      <option value="">Select State</option>
                      @foreach($states as $state)
                    <option value="{{$state->id}}" @if (Auth::user()->state_id==$state->id) selected @endif >{{$state->name}}</option>
                    @endforeach
                  </select>

                   
                  <label for="exampleInputPassword1">City</label><br>
                    <select name="city_id" id="city_dd"  class="form-control">
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}" @if (Auth::user()->city_id==$city->id) selected @endif>{{$city->name}}</option>
                    @endforeach
                  </select>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            
            <!-- /.card -->

            <!-- Input addon -->
           
              <!-- /.card-header -->
              <!-- form start -->
           
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->








  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script>
        $(document).ready(function () {
            $('#country_dd').on('change', function () {
                var idCountry = this.value;
                $("#state_dd").html('');
                $.ajax({
                    url: "{{url('getstate')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state_dd').html('<option value="">Select State</option>');
                        $.each(result, function (key, value) {
                            $("#state_dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city_dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state_dd').on('change', function () {
                var idState = this.value;
                $("#city_dd").html('');
                $.ajax({
                    url: "{{url('getcity')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city_dd').html('<option value="">Select City</option>');
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
