<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Otros Círculos - WARMI ARMY</title>
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
  <link rel="stylesheet" href="assets/css/projects.css">

</head>

<body>
  <style>
    a.list-group-item {
      height:auto;
      min-height:220px;
    }
    a.list-group-item.active small {
        color:#fff;
    }
    .stars {
        margin:20px auto 1px;    
    }
    .list-group-item-text {
      font-size:10px;
    }
    #searchCircle::placeholder{
      color: lightgrey;
    }
  </style>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main" >
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="/profile" style="">
        WARMI ARMY
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
            @if($numRequest !== 0)
            <span class="badge badge-danger" style="background:white">+{{$numRequest}}</span>
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
              @forelse ($request_projects as $request)
              <a class="dropdown-item" style="cursor:pointer"
                data-request="{{ $request->request_id }}" 
                data-project_id="{{ $request->project_id }}"
                data-project_name="{{ $request->project_name }}"
                data-user_id="{{ $request->user_id }}"
                data-user_name="{{ $request->user_name }} {{ $request->user_lastName }}"
                data-user_image="{{ ($request->user_image == null) ? '/storage/image/user-default.png' : $request->user_image}}"
                data-user_career="{{ $request->user_career }}"
                data-user_email="{{ $request->user_email }}" 
                data-user_looking="{{ $request->user_looking }}" 
                onclick="seeRequestProject(this)">
                <i class="ni ni-bulb-61"></i>
                <span><strong>{{$request->user_name}} {{$request->user_lastName}}</strong> solicitó unirse a <strong>{{$request->project_name}}</strong>  </span>
              </a>              
              @empty
              <div class="dropdown-item text-center">
                <span>No hay solicitudes por el momento</span>
              </div>
              
              @endforelse
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle" style="background-color: transparent;">
                <img alt="Image placeholder" src="{{ (Auth::user()->image == null) ? '/storage/image/user-default.png' : '/storage/image/'.Auth::user()->image }}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            
              <a href="/profile" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi Perfil</span>
              </a>
              <a href="/my-circles" class="dropdown-item">
                <i class="ni ni-planet"></i>
                <span>Mis Círculos</span>
              </a>
              <a href="/other-circles" class="dropdown-item">
                <i class="ni ni-world"></i>
                <span>Otros Círculos</span>
              </a>
              <a href="/activity" class="dropdown-item">
                <i class="ni ni-bullet-list-67"></i>
                <span>Actividad</span>
              </a>
              <a href="/messages" class="dropdown-item">
                <i class="ni ni-email-83"></i>
                <span>Mensajes</span>
              </a>
              <a href="/news" class="dropdown-item">
                <i class="ni ni-single-copy-04"></i>
                <span>Noticias</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}"  
			            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
			            class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Salir</span>
              </a>
			        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main" style="background: ">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
            WARMI
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/profile">
              <i class="ni ni-single-02 text-yellow"></i> Mi Perfil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/my-circles">
              <i class="ni ni-planet text-blue"></i> Mis Círculos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
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
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" style="background-color: #7C5CC4">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">OTROS CIRCULOS</a>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ni ni-bell-55"></i>
            
            @if($numRequest !== 0)
            <span class="badge badge-danger" style="background:white">+{{$numRequest}}</span>
            @endif
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Notificaciones</h6>
              </div>
              @forelse ($request_projects as $request)
              <a class="dropdown-item" style="cursor:pointer"
                data-request="{{ $request->request_id }}" 
                data-project_id="{{ $request->project_id }}"
                data-project_name="{{ $request->project_name }}"
                data-user_id="{{ $request->user_id }}"
                data-user_name="{{ $request->user_name }} {{ $request->user_lastName }}"
                data-user_image="{{ ($request->user_image == null) ? '/storage/image/user-default.png' : $request->user_image}}"
                data-user_career="{{ $request->user_career }}"
                data-user_email="{{ $request->user_email }}" 
                data-user_looking="{{ $request->user_looking }}" 
                onclick="seeRequestProject(this)">
                <i class="ni ni-bulb-61"></i>
                <span><strong>{{$request->user_name}} {{$request->user_lastName}}</strong> solicitó unirse a <strong>{{$request->project_name}}</strong>  </span>
              </a>
              
              @empty
              <div class="dropdown-item text-center">
                <span>No hay solicitudes por el momento</span>
              </div>
              
              @endforelse
              
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle" style="background-color: transparent;">
                  <img alt="Image placeholder" src="{{ (Auth::user()->image == null) ? '/storage/image/user-default.png' : '/storage/image/'.Auth::user()->image }}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <a href="/profile" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi Perfil</span>
              </a>
              <a href="/my-circles" class="dropdown-item">
                <i class="ni ni-planet"></i>
                <span>Mis Círculos</span>
              </a>
              <a href="/other-circles" class="dropdown-item">
                <i class="ni ni-world"></i>
                <span>Otros Círculos</span>
              </a>
              <a href="/activity" class="dropdown-item">
                <i class="ni ni-bullet-list-67"></i>
                <span>Actividad</span>
              </a>
              <a href="/messages" class="dropdown-item">
                <i class="ni ni-email-83"></i>
                <span>Mensajes</span>
              </a>
              <a href="/news" class="dropdown-item">
                <i class="ni ni-single-copy-04"></i>
                <span>Noticias</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}"  
			            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
			            class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Salir</span>
              </a>
			        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 " style="background: transparent !important;">
          <div class="container-fluid">
          <!-- optional cards -->
          </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
          
          <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0 data-info-person">EXPLORAR CÍRCULOS</h3>
                      
                    </div>
                    <!-- Form -->
                    <div class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                      <div class="form-group mb-0">
                        <div class="input-group input-group-alternative" style="border-color: #7C5CC4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search" style="color: #7C5CC4"></i></span>
                          </div>
                            <input id="userId" type="hidden" value="{{ Auth::user()->id }}">
                            <input id ="searchCircle" name="searchCircle" class="form-control" placeholder="Buscar círculos" type="text" style="color: #32325d;" onkeypress="return findEvent(event)">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <div style="width: 100%; background: ">
                  <!-- <span style="font-size: 12px; padding-left: 0.6rem;">Aqui se muestran círculos disponibles por categoría. Elija uno según sus intereses</span> -->
                    
                      <!-- LISTA -->
                      <div id="all-projects" class="container">                      
                        <div class="row project__disponible">                          
                          <div class="col-sm-6 col-md-3">
                            <h4 class="text-center data-info-person">Comercial</h4>                                                        
                            @forelse($groups[0] as $comercial)
                            <div class="list-group">
                              <div class="list-group-item" style="border-color: rgba(251, 175, 190, .5) ">
                                <div class="row">
                                  <div class="col-md-12">

                                    <div class="row" style="padding-bottom:5px;">
                                      <div class="col-md-12">
                                      <h4 class="list-group-item-heading" style="display: inline-block; float:left; padding-right: 10px;">{{ $comercial->name }}</h4>
                                      @if($comercial->request_state === 0)
                                      <button class="btn btn-primary" style="font-size:8px; padding: 3px;" disabled>Solicitud <br> Enviada</button>
                                      @else
                                      <form method="post" action="{{url('/project/registerUser')}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="project_id" value="{{$comercial->id}}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <button class="btn btn-primary" style="font-size:8px; padding: 3px;">Agregarme</button>
                                      </form>
                                      @endif
                                      </div>
                                    </div>
                                      <p class="list-group-item-text">
                                      {{ $comercial->description }}             
                                      </p>
                                      <small style="font-size:10px">{{ $comercial->participants }} {{ (($comercial->participants > 1) ? 'participantes':'participante' ) }}</small>
                                  </div>                                
                                                                
                                </div>
                              </div>
                            </div>
                            @empty
                            <div class="list-group text-center">
                              <br><small>Aún no hay circulos comerciales para mostrar</small><br>
                              <a href="circle/create" class="btn btn-primary" style="font-size:8px; padding: 3px;">Crear uno nuevo</a>
                            </div>
                            @endforelse
                          </div>
                          <div class="col-sm-6 col-md-3">
                            <h4 class="text-center data-info-person">Laboral</h4>
                            @forelse($groups[1] as $laboral)
                            <div class="list-group">
                              <div class="list-group-item" style="border-color: rgba(136, 230, 247, .5);">
                                <div class="row">
                                  <div class="col-md-12 col-lg-8">
                                      <h4 class="list-group-item-heading"> {{ $laboral->name }} </h4>
                                      <p class="list-group-item-text">
                                      {{ $laboral->description }}                      
                                      </p>
                                      <small style="font-size:10px">{{ $laboral->participants }} {{ (($laboral->participants > 1) ? 'participantes':'participante' ) }}</small>
                                  </div>                                
                                  <div class="col-sm-12 col-md-4 text-center" >
                                    @if($laboral->request_state === 0)
                                    <button class="btn btn-primary" style="font-size:8px; padding: 3px;" disabled>Solicitud <br> Enviada</button>
                                    
                                    @else
                                    <form method="post" action="{{url('/project/registerUser')}}">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="project_id" value="{{$laboral->id}}">
                                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                      <button class="btn btn-primary" style="font-size:8px; padding: 3px;">Agregarme</button>
                                    </form>
                                    @endif
                                      
                                  </div>                                
                                </div>
                              </div>
                            </div>
                            @empty
                            <div class="list-group text-center">
                              <br><small>Aún no hay circulos comerciales para mostrar</small><br>
                              <a href="circle/create" class="btn btn-primary" style="font-size:8px; padding: 3px;">Crear uno nuevo</a>
                            </div>
                            @endforelse
                          </div>
                          <div class="col-sm-6 col-md-3">
                            <h4 class="text-center data-info-person">Social</h4>
                            @forelse($groups[2] as $social)
                            <div class="list-group">
                              <div class="list-group-item" style="border-color:rgba(240, 255, 132, 0.5);">
                                <div class="row">
                                  <div class="col-md-12 col-lg-8">
                                      <h4 class="list-group-item-heading"> {{ $social->name }} </h4>
                                      <p class="list-group-item-text">
                                        {{ $social->description }}            
                                      </p>
                                      <small style="font-size:10px">{{ $social->participants }} {{ (($social->participants > 1) ? 'participantes':'participante' ) }}</small>
                                  </div>                                
                                  <div class="col-sm-12 col-md-4 text-center" >
                                    @if($social->request_state === 0)
                                    <button class="btn btn-primary" style="font-size:8px; padding: 3px;" disabled>Solicitud <br> Enviada</button>
                                    
                                    @else
                                    <form method="post" action="{{url('/project/registerUser')}}">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="project_id" value="{{$social->id}}">
                                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                      <button class="btn btn-primary" style="font-size:8px; padding: 3px;">Agregarme</button>
                                    </form>
                                    @endif
                                  </div>                                
                                </div>
                              </div>
                            </div>
                            @empty
                            <div class="list-group text-center">
                              <br><small>Aún no hay circulos comerciales para mostrar</small><br>
                              <a href="circle/create" class="btn btn-primary" style="font-size:8px; padding: 3px;">Crear uno nuevo</a>
                            </div>
                            @endforelse
                          </div>    
                          <div class="col-sm-6 col-md-3">
                            <h4 class="text-center data-info-person">StartUp</h4>
                            @forelse($groups[3] as $startup)
                            <div class="list-group">
                              <div class="list-group-item" style="border-color:rgba(147, 231, 195, .5);">
                                <div class="row">
                                  <div class="col-md-12 col-lg-8">
                                      <h4 class="list-group-item-heading"> {{ $startup->name }} </h4>
                                      <p class="list-group-item-text">
                                        {{ $startup->description }}         
                                      </p>
                                      <small style="font-size:10px">{{ $startup->participants }} {{ (($startup->participants > 1) ? 'participantes':'participante' ) }}</small>
                                  </div>                                
                                  <div class="col-sm-12 col-md-4 text-center" >
                                  @if($startup->request_state === 0)
                                    <button class="btn btn-primary" style="font-size:8px; padding: 3px;" disabled>Solicitud <br> Enviada</button>
                                    
                                    @else
                                    <form method="post" action="{{url('/project/registerUser')}}">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="project_id" value="{{$startup->id}}">
                                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                      <button class="btn btn-primary" style="font-size:8px; padding: 3px;">Agregarme</button>
                                    </form>
                                    @endif
                                  </div>                                
                                </div>
                              </div>
                            </div>
                            @empty
                            <div class="list-group text-center">
                              <br><small>Aún no hay circulos comerciales para mostrar</small><br>
                              <a href="circle/create" class="btn btn-primary" style="font-size:8px; padding: 3px;">Crear uno nuevo</a>
                            </div>
                            @endforelse
                          </div>      
                        </div>
                      </div>
                      <!-- FIN LISTA -->

                  </div>
                  <!-- Add personal details from this user here! -->
                  
                </div>
              </div>
            </div>
            
          </div>

          <!-- Modal -->
          <div class="modal fade" id="requestProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="requestProject_title"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="requestProject_body">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                  <form method="post" action="{{url('/project/approveUser')}}">
                    {{ csrf_field() }}
                    <input id="input_request_id" type="hidden" name="input_request_id">
                    <input id="input_project_id" type="hidden" name="input_project_id">
                    <input id="input_user_id" type="hidden" name="input_user_id">
                    <input type="hidden" name="input_user_approved" value="{{ Auth::user()->id }}">
                    <button class="btn btn-primary">Aceptar Solicitud</button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>

          <!-- Footer -->
          <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
              <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                  &copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank">Warmi Army</a>
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
  <script>
    function seeRequestProject(e){
      let request = $(e).attr("data-request");
      let project_id = $(e).attr("data-project_id");
      let project_name = $(e).attr("data-project_name");
      let user_id = $(e).attr("data-user_id");
      let user_name = $(e).attr("data-user_name");
      let user_image = $(e).attr("data-user_image");
      let user_career = $(e).attr("data-user_career");
      let user_email = $(e).attr("data-user_email");
      let user_looking = $(e).attr("data-user_looking");


      let body = `<div class="row">                    
                  <div class="media align-items-center pl-5">
                    <a href="#" class="avatar rounded-circle mr-3" data-toggle="tooltip" data-original-title="">
                      <img alt="" src="${user_image}">
                    </a>
                    <div class="media-body">
                      <span class="mb-0 text-sm">Email: ${user_email}</span><br>
                      <span class="mb-0 text-sm">Carrera: ${user_career}</span><br>
                      <span class="mb-0 text-sm">En búsqueda de: ${user_looking}</span><br>   
                    </div>
                  </div>
                </div>`;

      $('#requestProject_title').html(user_name+' desea unirse al proyecto <strong>'+project_name+'</strong>');
      $('#requestProject_body').html(body);
      $('#input_request_id').val(request);
      $('#input_project_id').val(project_id);
      $('#input_user_id').val(user_id);


      $('#requestProject').modal({backdrop: 'static', keyboard: false})
      $('#requestProject').modal('show');
      
     }
    /* Se ejecuta busqueda de Círculo */
    function findEvent(event){
      if(event.which == 13 || event.keyCode == 13){
        let busqueda = document.getElementById('searchCircle').value;
        let userId = document.getElementById('userId').value;

        console.log('en js: ',busqueda);

          $.ajax({
              type:'GET',
              url: '/other-circles/findCircle',
              data:{
                  busqueda    :   busqueda,
                  userId      :   userId
              },
              success: function(respuesta) {
                data = JSON.parse(respuesta);

                console.log(data);
                if(data.error == 0){
                  document.getElementById('all-projects').innerHTML = data.html;
                }else{
                  console.log('ocurrio un error, vuelva a intentarlo');
                }
              },
              error: function() {
                  console.log("No se ha podido obtener la información");
                  }
          });		
        
      }
    }
  </script>
</body>

</html>