<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Perfil - WARMY ARMY</title>
  <!-- Favicon -->
  <link href="{{ asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('css/argon.css?v=1.0.0') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('css/app.css?v=1.0.0') }}" rel="stylesheet">
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main" >
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="/" style="">
        WARMY ARMY
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('img/theme/team-1-800x800.jpg') }}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="/profile" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Mi Perfil</span>
            </a>
            <a href="/my-circles" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Mis Círculos</span>
            </a>
            <a href="../examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="../examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main" style="background: ">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
            WARMY
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/profile">
              <i class="ni ni-single-02 text-yellow"></i> Mi Perfil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="ni ni-planet text-blue"></i> Mis Círculos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/other-circles">
              <i class="ni ni-world text-orange"></i> Otros Círculos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/activity">
              <i class="ni ni-bullet-list-67 text-primary"></i> Mi Actividad
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/messages">
              <i class="ni ni-email-83 text-red"></i> Mensajes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/news">
              <i class="ni ni-single-copy-04 text-info"></i> Noticias
            </a>
          </li>
          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        
        <div id="teamSelected">
        </div>
        <!-- Navigation -->
        <!-- <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
              <i class="ni ni-spaceship"></i> Getting started
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
              <i class="ni ni-palette"></i> Foundation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
              <i class="ni ni-ui-04"></i> Components
            </a>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" style="background-color: #7C5CC4">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/">MIS CÍRCULOS</a>
        <!-- Form -->
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ni ni-bell-55"></i>+</a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Notificaciones</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-bulb-61"></i>
                <span>Solicitud de Nueva persona  </span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-bulb-61"></i>
                <span>Solicitud de nueva persona</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item text-center">
                
                <span>Ver todas</span>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{ Auth::user()->image }}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="/profile" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi Perfil</span>
              </a>
              <a href="/my-circles" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Mis Círculos</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6" style="background: transparent !important;">
      <div class="container-fluid">
       <!-- optional cards -->
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">

        
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Registrar Proyecto</h3>
                </div>
                
                </div>
              </div>
            </div>
            <div class="card-body">
            
            
              
                <div class="pl-lg-4">
                  <div class="row">
   
                    {!! Form::open(['route' => 'circle.store', 'method' => 'post']) !!}
    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-name">T&iacute;tulo</label>
               {{Form::text('name',null,array('required' => 'required', 'class' => 'form-control form-control-alternative'))}}
                      </div>
                    </div>

        <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-circle">C&iacute;rculo de Integraci&oacute;n</label>
                        {{Form::select('circle_id', $warmy_categories, null, ['class' => 'form-control','placeholder' => 'Seleccione Circulo de integración'])}}

                      </div>
                    </div>             



                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Descripci&oacute;n</label>
                        {{Form::textarea('description',null, array('required' => 'required', 'class' => 'form-control', 'rows' => 4, 'cols' => 40))}}
                      </div>
                    </div>

                     <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Metas</label>
                        {{Form::textarea('goals',null, array('required' => 'required', 'class' => 'form-control', 'rows' => 4, 'cols' => 40))}}
                      </div>
                    </div>



                  </div>
        
                </div>
                <center>
                <div class="form-group">       
              <input type="submit" value="Registrar" class="btn btn-primary btn-round">

  


              </center>
            </div>
          </form>
        </div>
        {{ Form::close() }}
      </div>
      
      









     
      
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank">Warmy Army</a>
            </div>
          </div>
         
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('js/argon.js?v=1.0.0') }}"></script>

</body>

</html>