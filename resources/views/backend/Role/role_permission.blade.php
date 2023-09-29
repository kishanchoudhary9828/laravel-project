@extends('backend.layout.main')

@section('content')

<body>
    <center>
<form action="{{url('save_permi')}}" method="post">
    @csrf
    <select name="role" id="">
    <option value="">select option</option>
        @foreach ($role as $roles)
        <option value="{{$roles->name}}">{{$roles->name}}</option>
        @endforeach
    </select>

    <select name="permission" id="">
        <option value="">select permission</option>
        @foreach ($permission as $permissions)
        <option value="{{$permissions->name}}">{{$permissions->name}}</option>
        @endforeach
    </select> 

    <button type="submit">submit</button>
</form>
</center></body>
@endsection