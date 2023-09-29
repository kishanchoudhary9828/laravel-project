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
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">View Blog</li>
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
                Description
              </th>
             
              <th style="width: 30%">
                Status
              </th>
              <th style="width: 1%" class="text-center">
                Action
              </th>
             @foreach($category as $cate)
            </tr>
            <tr>
                <td> <img src="{{asset('uploadImage/'.$cate->image)}}" alt="profile pic" height="100" width="100"> </td>
                <td>{{$cate->id}}</td>
                <td>{{$cate->title}}</td>
                <td>{{$cate->description}}</td>
                <td>
                  <label for="" class="switch">
                  <input type="checkbox" class="switch" data-id="{{$cate->id}}" data-on="Active" data-off="InActive" {{$cate->status ? 'checked' : '' }}>
                  <span class="slider round"></span> </label>
                </td>
               </td> 
            </tr>
            @endforeach
          
          </thead>
          <tbody>
         
            <label class="switch">
 
 
</label>
            
          
          </tbody>
        </table>
        </a>
        </td>

  </section>
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
            url: '/categorystatus',
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