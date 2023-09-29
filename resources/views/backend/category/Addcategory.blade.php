
@extends('backend.layout.main')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <h1>Category</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Form</li>
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
                <h3 class="card-title">Category</h3>
              </div>
<!-- 
          @if(Session::has('success'))
              <div class="alert alert-success">
                  {{Session::get('success')}}
              </div>
          @endif -->
              <!-- /.card-header -->
              <!-- form start -->

              


              <form action="{{url('categorystore')}}" method= "post" enctype="multipart/form-data" >
                @csrf
                <div>
               
                   
                 
              <div class="card-body">
              <!-- <div class="form-group"> -->
                    <label for="exampleInputName">Title</label>
                    <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Title" name="title" value="{{ old('title') }}">
                
                  </div>

                  @error('title') <span style=color:red >{{$message}}</span> @enderror
                  <div class="card-body">
                    <label for="">Category</label>
                  <select name="parent_id" id="category" class= "form-control">
                  <option value="0">Parent</option>

                    @foreach($dropcategory as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                    </select>
                   </div>
                 <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputPassword1">Sub Category</label>
                    <select name="sub_category" id="subcategory" class="form-control">
                      <option value="">sub_category</option>
                    </select>
                  </div>
                  

                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="description" name="description" value="{{ old('description') }}">
                  </div>
                  @error('category') <span style=color:red >{{$message}}</span> @enderror
                 
            
                  <label for="exampleInputPassword1">Status</label><br>
                  <select name="status" id="" class="form-control" >
                    <option value="1" class="form-control">active</option>
                    <option value="0">inactive</option>
                  </select>
                  @error('status') <span style=color:red >{{$message}}</span> @enderror

                  <br>
                  <div>
                 <label for="image">Image</label>
                 <input type="file" id='image' name='image' >
                 
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script>
        $(document).ready(function () {
            $('#category').on('change', function () {
                var subcate = this.value;
                $("#subcategory").html('');
                $.ajax({
                    url: "{{url('subcategorys')}}",
                    type: "POST",
                    data: {
                        category_sub: subcate,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                      $('#subcategory').html('<option value="">Select State</option>')
                        $.each(result, function (key, value) {
                            $("#subcategory").append('<option value="' + value
                                .id + '">' + value.sub_category + '</option>');
                        });
                      
                    }
                });
            });
       
        });
        
    </script>


@endsection
