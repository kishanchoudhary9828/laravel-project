@extends('backend.layout.main')

@section('content')


<div class="content-wrapper">
    <div class="container">
        <h2 class="text-center">Roles| Add</h2>
        <br>

        <form action="{{url('rolestore')}}" method="post" class="form-group" style="width:70%; margin-left:15%;" >
            @csrf
           

            <label class="form-group">Name:</label>
            <input type="text" class="form-control" placeholder="Role Name" name="name" required><br>

            <button type="submit" value="Add student" class="btn btn-primary">Submit</button>

    </div>
</div>
@endsection