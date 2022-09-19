<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin-Dashboard</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  
</head>

<body id="page-top">
  
  <!-- Page Wrapper -->
  <div id="wrapper">
    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
        <a class="nav-link" href="{{route('employees.index')}}">
          <span>Employee Management</span></a>
        </li>
        
        
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSystem" aria-expanded="true"
          aria-controls="collapseSystem">
          <i class="fas fa-fw fa-cog"></i>
          <span>System Management</span>
        </a>
        <div id="collapseSystem" class="collapse" aria-labelledby="headingSystem" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('country')}}">Country</a>
            <a class="collapse-item" href="{{route('state')}}">State</a>
            <a class="collapse-item" href="{{route('city')}}">City</a>
            <a class="collapse-item" href="{{route('departments.index')}}">Department</a>
          </div>
        </div>
      </li>
      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
        aria-controls="collapseUser">
        <i class="fas fa-fw fa-cog"></i>
        <span>User Management</span>
      </a>
      <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('users.index')}}">User</a>
          <a class="collapse-item" href="cards.html">Role</a>
          <a class="collapse-item" href="cards.html">Permission</a>
        </div>
      </div>
    </li>
  </ul>
  <!-- End of Sidebar -->
  
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    
    <!-- Main Content -->
    <div id="content">
      
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          
          
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->username}}</span>
              <img class="img-profile rounded-circle" src="{{url('img/undraw_profile.svg')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
        
      </nav>
        <!-- End of Topbar -->
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          
          @yield('content')
        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- End of Main Content -->
      
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
      
    </div>
    <!-- End of Content Wrapper -->
    
  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
          
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  
</body>

</html>