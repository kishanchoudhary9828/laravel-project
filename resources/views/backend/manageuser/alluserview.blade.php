@extends('backend.layout.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm-12">
          <h1>Projects</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Projects</li>
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
        <h3 class="card-title">Projects</h3>

        <!-- 

           @if(Session::has('success'))
              <div class="alert alert-success" >
                  {{Session::get('success')}}
              </div>
          @endif


          @if(Session::has('error'))
              <div class="alert alert-danger">
                  {{Session::get('error')}}
              </div>
          @endif  -->

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
                id
              </th>
              <th style="width: 20%">
                Name
              </th>
              <th style="width: 30%">
                Email
              </th>
              <th style="width: 30%">
                Mobile Number
              </th>
              <th style="width: 30%">
                Address
              </th>
              <th style="width: 30%">
                Country
              </th>
              <th style="width: 30%">
                State
              </th>
              <th style="width: 30%">
                City
              </th>
              <th style="width: 30%">
                Status
              </th>
              <th style="width: 8%" class="text-center">
                Action
              </th>

            </tr>
          </thead>
          <tbody>
         
          
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->mobilenumber}}</td>
              <td>{{$user->address}}</td>
              <td>{{$user->getCountry->name}}</td>
              <td>{{$user->getState->name}}</td>
              <td>{{$user->getCity->name}}</td>
              
              <td >
                 <!-- <input class="toggle-class"  type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive"  {{ $user->status ? 'checked' : '' }} -->
                 <label class="switch">
  <input type="checkbox" class="switch" data-id="{{$user->id}}" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }} >
  <span class="slider round"></span>
</label>
            <!-- @if ($user->status==1)
                   active
                @else
                inactive
                @endif -->
              </td>

              <td class="project-actions text-right">

                <a class="fas fa-edit" style="font-size:20px" href="{{url('user_edit',$user->id)}}"></a>
                <a  class="fas fa-trash-alt delete-confirm" style="font-size:20px;color:red" href="{{ url('user_delete', $user->id) }}"
                  ></a>
  
    
              </td>
            </tr>
            @endforeach



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
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery -->


<script src="{{asset('assets/dist/js/demo.js')}}"></script>


</body>

</html>



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
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>






@endsection