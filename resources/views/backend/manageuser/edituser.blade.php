  @extends('backend.layout.main')

  @section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-12">
        <div class="col-sm-12">
          <h1>Update Form</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Update Form</li>
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
              <h3 class="card-title">Please Update Your Information</h3>
            </div>

            <!-- @if(Session::has('success'))
              <div class="alert alert-success" >
                  {{Session::get('success')}}
              </div>
          @endif -->
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('user_update',$id)}}" method="post">
              @csrf

              <div class="card-body">
                
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Name" name="name"
                    value="{{$user->name}}">
                </div>
                @error('name') <span>{{$message}}</span> @enderror

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                      name="email" value="{{$user->email}}">
                  </div>
                  @error('email') <span>{{$message}}</span> @enderror
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile Number</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Number"
                      name="mobilenumber" value="{{$user->mobilenumber}}">
                  </div>
                  @error('mobilenumber') <span>{{$message}}</span> @enderror

                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Address"
                      name="address" value="{{$user->address}}">
                  </div>
                  @error('address') <span>{{$message}}</span> @enderror
                  

                  
                  <label for="exampleInputPassword1">Status</label>+
                  
                  
                 <select name="status" class="form-control" id="" >
                  
                 
                  <option value="1" @if ($user->status==1) selected @endif>Active</option>
                 
                  <option value="0" @if ($user->status==0) selected @endif   >Inactive</option>
             
                 </select>
                  <!-- /.card-body -->
                  @error('address') <span>{{$message}}</span> @enderror




                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Country</label>
                  
                     <select name="country_id" class="form-control" id="country_id" >
                  
                     @foreach ($countries as $country)
                     <option value="{{ $country->id }}" @if ($user->country_id==$country->id) selected @endif >{{ $country->name }}</option>
                    @endforeach
                     </select>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select State</label>
                  
                     <select name="state_id" class="form-control" id="state_id" >
                         @foreach ($states as $state)
                     <option value="{{$state->id}}" @if ($user->state_id==$state->id) selected @endif >{{$state->name}}</option>
                     @endforeach
                     </select>

                  </div>
                   
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select City</label>
                      
                     <select name="city_id" class="form-control" id="city_id" >
                    @foreach($cities as $city)
                     <option value="{{$city->id}}" @if ($user->city_id==$city->id) selected @endif >{{$city->name}}</option>
                    @endforeach
                     </select>

                  </div>

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
<!-- Bootstrap 4 -->
<!-- <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- bs-custom-file-input -->
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<!-- Page specific script -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script>
        $(document).ready(function () {
            $('#country_id').on('change', function () {
                var idCountry = this.value;
                $("#state_id").html('');
                $.ajax({
                    url: "{{url('getstatesdata')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state_id').html('<option value="">Select State</option>');
                        $.each(result, function (key, value) {
                            $("#state_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city_id').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state_id').on('change', function () {
                var idState = this.value;
                $("#city_id").html('');
                $.ajax({
                    url: "{{url('getcitiesdata')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city_id').html('<option value="">Select City</option>');
                        $.each(res, function (key, value) {
                            $("#city_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>



</script>



@endsection