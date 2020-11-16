<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu"  role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('template.plantilla2') }}" class="nav-link">Pagina Principal</a>
        </li>
      </ul>
  
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="search" nombre="search" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <li class="nav-item d-none d-sm-inline-block">
      <ul class="navbar-nav ml-auto">
          
      </ul>
      </li>
      <!-- User Account Menu -->
      <ul class="navbar-nav ml-auto">
          <div class="nav-link dropdown no-arrow">
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a  class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <?php if((Auth::user()->imagen) == null ): ?>
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" style="max-width:30px" alt="User Image">
                <?php else: ?>
                  <img src="images/{{ Auth::user()->imagen }}" class="img-circle" style="max-width:30px" alt="User Image">
                <?php endif; ?>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
              </a>
              
              <ul class="dropdown-menu">
  
                  <!-- Menu Footer-->
                  <li class="user-footer">
  
                    <div class="text-center">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('salir-form').submit();" class="btn btn-default btn-flat btn-salir">Cerrar Sesion</a>
                      <form action="{{ route('logout') }}" method="POST" style="display: none;" id="salir-form">
                        {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
              </ul>
          </div>
          </ul>
  
  
  
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Analisis Financiero</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    @guest
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    @else
                    <div class="image">
  
                      <!-- <img src="{{asset('imagenes/'.Auth::user()->imagen) }}" class="img-circle elevation-2"> -->
                      <?php if((Auth::user()->imagen) == null ): ?>
                        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" height: 100px;
                      width: 100px; alt="User Image">
                      <?php else: ?>
                        <img src="images/{{ Auth::user()->imagen }}" class="img-circle" style="max-width:30px" alt="User Image">
                      <?php endif; ?>
  
                  </div>
                    {{ Auth::user()->name }}
                    @endguest
                </a>
  
            </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Cuentas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <li><a href="{{ route ('cuentas.index') }}" class="nav-link">
                    <i class="fas fa-donate"></i>
                    <p>Añadir Cuentas a un catalogo</p>
                  </a></li>
                </li>
                <li class="nav-item">
                  <li><a href="{{ route ('tipocuentas.index') }}" class="nav-link">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <p>Tipo Cuentas</p>
                  </a>
                </li>
                </li>
                
              </ul>
            </li>
          </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  Empresas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <li><a href="{{ route ('empresas.index') }}" class="nav-link">
                    <i class="fas fa-industry"></i>
                    <p>Empresas</p>
                  </a></li>
                </li>
                <li class="nav-item">
                  <li><a href="{{ route ('empresas.index2') }}" class="nav-link">
                  <i class="fas fa-money-check-alt"></i>
                  <p>Listado de Catalogos</p>
                </a></li>
              </li>
              </ul>
              
      
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
               @yield('title')
              </div><!-- /.col -->
             @yield('crear')
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @if (session('info'))
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-md-offset-2">
                  <div class="alert alert-info">
                      {{ session('info') }}
                  </div>
              </div>
          </div>
      <div
    
        @endif
       
        <div class="content">
          @yield('content')
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
          ANF115
      </div>
      <!-- Default to the left -->
      <strong>Sistema Analisis Financiero <a href="https://adminlte.io"></a>.</strong>
    </footer>
  </div>
  <!-- ./wrapper -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/js/adminlte.min.js"></script>
</body>
</html>
