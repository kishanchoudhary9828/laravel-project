@extends('backend.layout.main')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <h1>Update Blog</h1>
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

          <form action="{{url('updateblogs',$id)}}" method="post" enctype="multipart/form-data">
            @csrf

     
            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Title" name="title"
                  value="{{$blog->title}}">
              </div>
              @error('title') <span>{{$message}}</span> @enderror


             
              <div class="form-group">
                <label for="exampleInputName">Slug</label>
                <input type="text" class="form-control" id="exampleInputName" placeholder="Enter slug" name="slug"
                  value="{{$blog->slug}}">
              </div>
              @error('slug') <span>{{$message}}</span> @enderror

              
                <div class="form-group">
                  <label for="exampleInputEmail1">Sub Heading</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Sub Heading"
                    name="sub_heading" value="{{$blog->sub_heading}}">
                </div>
                @error('sub_heading') <span>{{$message}}</span> @enderror
                <div class="form-group">
                  <label for="exampleInputPassword1">Short Description</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Short Description"
                    name="short_description" value="{{$blog->short_description}}">
                </div>
                @error('short_description') <span>{{$message}}</span> @enderror

                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Description"
                    name="description" value="{{$blog->description}}">
                </div>
                @error('description') <span>{{$message}}</span> @enderror
                

                
                <label for="exampleInputPassword1">Status</label>
                
               <select name="status" class="form-control" id="" >
                
               
                <option value="1" @if ($blog->status==1) selected @endif>Active</option>
               
                <option value="0" @if ($blog->status==0) selected @endif>Inactive</option>
           
               </select>
                <!-- /.card-body -->
             <br>
                <div>
               
                <label for="image">Image</label>
                 <input type="file" id='image' name='image'   >
                 <img src="{{asset('uploadImage/'.$blog->image)}}"  height="50" width="50">
                 </div>
                
                  

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>
          </form>
          
       

        <!-- /.card -->

        <!-- general form elements -->

        <!-- /.card -->

        <!-- Input addon -->

        <!-- /.card-header -->
        <!-- form start -->

      </div>
      <!-- /.card -->

   
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->

  <!-- /.row -->
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
</div>
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
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script>
$(document).ready(function () {
  toastr.options.timeOut = 10000;
  @if (Session:: has('error'))
toastr.error('{{ Session::get('error') }}');
@elseif(Session:: has('success'))
toastr.success('{{ Session::get('success') }}');
@endif
      }); -->

</script>



@endsection