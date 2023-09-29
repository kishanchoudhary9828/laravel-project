<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="nav-icon fas fa-users" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('profile')}}" class="d-block">{{ Auth::user()->name }}</a>
          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
      <li  class="nav-item">
              @can ('indexreview') <a href="{{url('indexreview')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Dashboard
              </p>
            </a>@endcan
               </li>
             
          <li class="nav-item menu-open">
          
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users dropdown-toggle "  data-toggle="dropdown"></i>
              <p>
               Manage User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('createuser')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
                  
              </li>
              <li class="nav-item">
                <a href="{{route('allUsers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All User View</p>
                </a>
              </li>
          
            </ul>
          </li>
          
         
        
          
          <li class="nav-item menu-open">
          
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-users dropdown-toggle "  data-toggle="dropdown"></i>
            <p>
             Role Managment
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('addrole')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Role</p>
                
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('viewrole')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Role Permission view</p>
              </a>
            </li>
        
          </ul>
        </li>
        
          
        <li class="nav-item menu-open">
          
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-users dropdown-toggle "  data-toggle="dropdown"></i>
            <p>
             Permission Managment
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('permissionadd')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Permission</p>
                
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('viewrole')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Role Permission view</p>
              </a>
            </li>
        
          </ul>
        </li>
   
               
          <li class="nav-item menu-open">
          
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-blog"></i>
              <p>
               Blogs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('blogadd')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Blogs</p>
                  
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('blogview')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Blogs</p>
                </a>
              </li>
           
            </ul>
          </li>
          
          <li class="nav-item menu-open">
          
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-blog"></i>
              <p>
               Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('categoryadd')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                  
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('viewcate')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
           
            </ul>
          </li>
        
          <li class="nav-item menu-open">
          
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Banner
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('bannercreate')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Banner</p>
                
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>School Member view</p>
              </a>
            </li>
     
        
            

          </ul>
        </li>
        <li class="nav-item menu-open">
        <a href="{{url('contectview')}}" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Contect Enquire
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          </li>
        </ul>
       <ul >
    
          </ul>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>