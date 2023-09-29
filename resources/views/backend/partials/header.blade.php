
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('QRCODE')}}" class="nav-link">QRCODE</a>
        
      </li>
      <li>
      <a class="btn btn-primary" href="{{url('generate-pdf')}}">Export to PDF</a>
      </li>
      <li>
        <a href="{{url('subscribeview')}}">email</a>
      </li>
      <ul>
      <li><a href="{{url('livewire')}}">Livewire</a></li></ul>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
    

      <!-- Notifications Dropdown Menu -->
    
     
      <li class="nav-item">


      <!-- Example single danger button -->
<div class="btn-group">
  <!-- <button type="button" class=" btn btn-primary fa fa-user dropdown-toggle "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
  <a href="" class=" btn btn-primary fa fa-user dropdown-toggle "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
  <!-- </button> -->
  <div class="dropdown-menu">
    <a class=" btn btn-dark dropdown-item" href="{{route('profile')}}">My Profile</a>
    <a class=" btn btn-outline-dark dropdown-item" href="{{url('adminchangepassword')}}">Change Password</a>
    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </fo  rm>
  
  </div>
</div>
        
        <!-- <a href="{{route('logout')}}" class>logout</a> -->
       
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>