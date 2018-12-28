<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Viajate MX | @yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('/images/logotipo.png')}}" />

    {{-- Toast --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/quoting/toastr.css')}}">
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{asset('/css/sweetalert2.min.css')}}">
    {{-- Google Maps --}}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"></script>
    {{-- Calendar --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
 <style>
        #preloader{
	display: none;
	background: rgba(255,255,255,0.7);
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 1100 !important;
}
    #preloader > .bar {
  display: inline-block;
  padding: 0px;
  text-align: left;
  left: 50%;
  top: 50%;
  position: absolute;
  width: 150px;
  height: 20px;
  border: 1px solid rgba(255,255,255,0.7);
  background-size: 28px 28px;
}
    </style>
    @yield('style')
</head>

<body>
    <div id="preloader">
        <div class="bar">
            <i class="fa fa-plane fa-spin" style="font-size:100px"></i>
        </div>
    </div>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-dark">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ url('/inicio') }}">
                    <!--<img src="../../images/logo-web.png" alt="logo" />-->Sistema VIAJATEmx</a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/inicio') }}"><img src="{{asset('/images/logo-mini.svg')}}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{asset('/images/faces/face1.png')}}" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout mr-2 text-primary"></i>
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-email-outline"></i>
                            <span class="count-symbol bg-warning"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                            <h6 class="p-3 mb-0">Mensajes</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../images/faces/face4.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a
                                        message</h6>
                                    <p class="text-gray mb-0">
                                        1 Minutes ago
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../images/faces/face2.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a
                                        message</h6>
                                    <p class="text-gray mb-0">
                                        15 Minutes ago
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../images/faces/face3.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture
                                        updated</h6>
                                    <p class="text-gray mb-0">
                                        18 Minutes ago
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <h6 class="p-3 mb-0 text-center">4 nuevos mensajes</h6>
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="count-symbol bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0">Solicitudes Recientes</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                    <p class="text-gray ellipsis mb-0">
                                        Just a reminder that you have an event today
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-settings"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                    <p class="text-gray ellipsis mb-0">
                                        Update dashboard
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-link-variant"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                    <p class="text-gray ellipsis mb-0">
                                        New admin wow!
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{url('/admin/solicitudes')}}">
                                <h6 class="p-3 mb-0 text-center">Ver todas las solicitudes</h6>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{asset('/images/faces/face1.png')}}" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                                <span class="text-secondary text-small">Administrador</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::url()== url('/inicio') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/inicio') }}">
                            <span class="menu-title">Panel de control</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#sistema" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Sistema</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-desktop-mac menu-icon"></i>
                        </a>
                        <div class="collapse" id="sistema">
                            <ul class="nav flex-column sub-menu">
                                @can('ver_proveedores')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/proveedores') ? 'active' : '' }}"
                                        href="{{url('/proveedores')}}">Proveedores</a></li>
                                @endcan
                                @can('ver_rutas')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/rutas') ? 'active' : '' }}"
                                        href="{{url('/rutas')}}">Rutas</a></li>
                                @endcan
                                @can('ver_tarjetas_credito')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/admin/tarjetas') ? 'active' : '' }}"
                                        href="{{url('/admin/tarjetas')}}">Cuentas</a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#config" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Configuración</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-settings menu-icon"></i>
                        </a>
                        <div class="collapse" id="config">
                            <ul class="nav flex-column sub-menu">
                                @can('ver_empleados')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/empleados') ? 'active' : '' }}"
                                        href="{{url('/empleados')}}">Empleados</a></li>
                                @endcan
                                @can('ver_roles')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/admin/roles') ? 'active' : '' }}"
                                        href="{{url('/admin/roles')}}">Roles</a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Reportes</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-check-circle menu-icon"></i>
                        </a>
                        <div class="collapse" id="report">
                            <ul class="nav flex-column sub-menu">
                                @can('ver_reporte_ingresos')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/ingresos') ? 'active' : '' }}"
                                        href="{{url('/ingresos')}}">Ingresos</a></li>
                                @endcan
                                @can('ver_reporte_gastos')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/gastos') ? 'active' : '' }}"
                                        href="{{url('/gastos')}}">Gastos</a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#cuentas" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Cuentas</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-card-details menu-icon"></i>
                        </a>
                        <div class="collapse" id="cuentas">
                            <ul class="nav flex-column sub-menu">
                                @can('ver_clientes')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/admin/clientes') ? 'active' : '' }}"
                                        href="{{url('/admin/clientes')}}">Clientes</a></li>
                                @endcan
                                @can('ver_solicitudes')
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/admin/solicitudes') ? 'active' : '' }}"
                                        href="{{url('/admin/solicitudes')}}">Solicitudes</a></li>
                                @endcan
                                <li class="nav-item"><a class="nav-link {{ Request::url()== url('/admin/ventas') ? 'active' : '' }}"
                                        href="{{url('/admin/ventas')}}">Todas las
                                        cuentas</a></li>
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/admin/ventas/pagadas') ? 'active' : '' }}"
                                        href="{{url('/admin/ventas/pagadas')}}">Cuentas
                                        Pagadas</a></li>
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/admin/ventas/adeudo') ? 'active' : '' }}"
                                        href="{{url('/admin/ventas/adeudo')}}">Cuentas
                                        por Cobrar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#invoices" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Facturas</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-qrcode-scan menu-icon"></i>
                        </a>
                        <div class="collapse" id="invoices">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/facturas/expedidas') ? 'active' : '' }}"
                                        href="{{url('/facturas/expedidas')}}">Emitidas</a></li>
                                <li class="nav-item"> <a class="nav-link {{ Request::url()== url('/facturas/pendientes') ? 'active' : '' }}"
                                        href="{{url('/facturas/pendientes')}}">Pendientes</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item sidebar-actions">
                        <span class="nav-link">
                            <div class="border-bottom">
                                <h6 class="font-weight-normal mb-3">Ventas</h6>
                            </div>
                            @can('generar_venta')
                            <button class="btn btn-block btn-lg btn-gradient-primary mt-4" id="generate">+ Agregar
                                nueva</button>
                            @endcan
                        </span>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            @yield('page-header')
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">@yield('page-header-one')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('page-header-two')</li>
                            </ol>
                        </nav>
                    </div>
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                            2018 <a href="#" target="_blank">Viajate MX</a>. Todos los derechos reservados.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hecho a mano y
                            hecho
                            con <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- SweetAlert --}}
    <script src="{{asset('/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('/vendors/js/vendor.bundle.addons.js')}}"></script>
    {{-- Boostrap 4 --}}
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('/js/off-canvas.js')}}"></script>
    <script src="{{asset('/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    @yield('js')
    <script>
        $('#generate').click(function () {
            window.location.href = '/admin/generar/venta';
            return false;
        });

    </script>
</body>

</html>
