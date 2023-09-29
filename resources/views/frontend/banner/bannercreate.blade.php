
@extends('frontend.layout.frontmain')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <h1>Add Blog</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blog Form</li>
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
                <h3 class="card-title">Blogs</h3>
              </div>
<!-- 
          @if(Session::has('success'))
              <div class="alert alert-success">
                  {{Session::get('success')}}
              </div>
          @endif -->
              <!-- /.card-header -->
              <!-- form start -->

              


              <form action="{{url('storeblogdata')}}" method= "post" enctype="multipart/form-data" >
                @csrf
                <div>
              <div class="card-body">
              <!-- <div class="form-group"> -->
                    <label for="exampleInputName">Title</label>
                    <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Title" name="title" value="{{ old('title') }}">
                  </div>
                  @error('title') <span style=color:red >{{$message}}</span> @enderror

                 <div class="card-body">
                  <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder= 'slug' > -->
                  </div> 
                  
                  

                  <div class="form-group">
                    <label for="exampleInputPassword1">Sub Heading</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sub Heading" name="sub_heading" value="{{ old('Sub_heading') }}">
                  </div>
                  @error('sub_heading') <span style=color:red >{{$message}}</span> @enderror
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Short Description</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Short description" name="short_description" value="{{ old('Short_description') }}">
                  </div>
                  @error('short_description') <span style=color:red >{{$message}}</span> @enderror

                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Description" name="description" value="{{ old('description') }}">
                  </div>
                  @error('description') <span style=color:red >{{$message}}</span> @enderror
                 
                  <label for="exampleInputPassword1">Status</label><br>
                  <select name="status" id="" class="form-control" >
                    <option value="1" class="form-control">active</option>
                    <option value="0">inactive</option>
                  </select>
                  @error('status') <span style=color:red >{{$message}}</span> @enderror

                  <br>
                 <label for="image">Image</label>
                 <input type="file" id='image' name='image' >

                 
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
            $('#country').on('change', function () {
                var idCountry = this.value;
                $("#state").html('');
                $.ajax({
                    url: "{{url('getstates')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(result, function (key, value) {
                            $("#state").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state').on('change', function () {
                var idState = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('getcities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>


@endsection
