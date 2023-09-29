@extends('backend.layout.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm-12">
          <h1>View Blog</h1>
        </div>
        <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control " type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">{{ date("d/m/Y") }}</a></li>
            <li class="breadcrumb-item active">{{now()->format('d-m-Y H:i')}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">View Blog</h3>

     
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
            <th style="width: 1%">
                Image
              </th>
              <th style="width: 1%">
                id
              </th>
              <th style="width: 1%">
                Title
              </th>
              <th style="width: 1%">
                slug
              </th>
              <th style="width: 1%">
                Sub Heading
              </th>
              <th style="width: 1%">
                Short description
              </th>
              <th style="width: 1%">
                Description
              </th>
             
              <th style="width: 30%">
                Status
              </th>
              <th style="width: 1%" class="text-center">
                Action
              </th>

            </tr>
          </thead>
          <tbody>
         
          @foreach($blog as $blogs)
          <tr>
            <td><img src="{{asset('uploadImage/'.$blogs->image)}}" alt="profile Pic" height="100" width="100"></td>
            <td>{{$blogs->id}}</td>
            <td>{{$blogs->title}}</td>
            <td>{{$blogs->slug}}</td>
            <td>{{$blogs->sub_heading}}</td>
            <td>{{$blogs->short_description}}</td>
            <td>{{$blogs->description}}</td>
            <td>
            <label class="switch">
  <input type="checkbox" class="switch" data-id="{{$blogs->id}}" data-on="Active" data-off="InActive" {{ $blogs->status ? 'checked' : '' }} >
  <span class="slider round"></span>
</label>
            
            <!-- @if($blogs->status==1){{ date("Y/m/d") }}
              Active
              @else
              Inactive
              @endif -->
            </td>

            <td>
              <a class='fas fa-edit' style='font-size:20px' href="{{url('editblogs',$blogs->id)}}"></a>
              <a class="fas fa-trash-alt delete-confirm"  style='font-size:20px;color:red' href="{{url('deletedblog',$blogs->id)}}"></a>
          
            </td>
          </tr>

         @endforeach
          </tbody>
        </table>
        </a>
        </td>
        
  </section>
  
  
  {!! $blog->links() !!}

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- AdminLTE App -->
<!-- <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>




<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
  $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
      title: 'Are you sure?',
      text: 'This record and it`s details will be permanantly deleted!',
      icon: 'warning',
      buttons: ["Cancel", "Yes!"],
    }).then(function (value) {
      if (value) {
        window.location.href = url;
      }
    });
  });
</script>
<script>
  $(function() {
    $('.switch').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
        
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changesStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>




</body>

</html>


@endsection