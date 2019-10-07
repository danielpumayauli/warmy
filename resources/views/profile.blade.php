<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="WA">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

  <link rel="stylesheet" href="css/bootstrap-image-checkbox.css">
  <style type="text/css">
.bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: white;
}

.label-info {
    background-color: #5bc0de;
}

.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}

.bootstrap-tagsinput {
  width: 100% !important;
}



.gallery-selector__cta-header {
  color: black;
    font-size: 30px;
    line-height: 37px;
}

.gallery-selector__cta-sub-header {

  
    color: dimgray;
    font-size: 22px;
    font-weight: normal;
    line-height: 27px;
}


.caption {
  color: #FFFFFF;
 position: absolute;
 top: 45%;
 left: 0;
 width: 100%;
}

  </style>

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
                data-user_image="{{ $request->user_image }}"
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
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('img/theme/team-1-800x800.jpg') }}">
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
        
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="ni ni-single-02 text-yellow"></i> Mi Perfil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/my-circles">
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

      </div>
    </div>


  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" style="background-color: #7C5CC4">
      <div class="container-fluid">
        <!-- Brand -->
        <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">MI PERFIL</h4>
        
     
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
                data-user_image="{{ $request->user_image }}"
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
                <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="/storage/image/{{ Auth::user()->image }}">

                  

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
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 data-info-person">DATOS PERSONALES</h3>
                </div>


                <div class="col text-right">
                  <button type="button" data-id="{{ Auth::user()->id }}" class="open-EditProfileDialog btn btn-link" data-toggle="modal" data-target="#editModal" ><i class="fa fa-edit"></i>  Editar Foto</button>
                  
                </div>

      

   

              </div>
            </div>
            <div class="table-responsive">







              <!-- Add personal details from this user here! -->
              <div class="card card-profile shadow" style="padding-top: 5rem; overflow-x: hidden;">
                <div class="row justify-content-center">
                  <div class="col-lg-3 order-lg-2">
                    
                  </div>
                </div>



                <div class="card-profile-image">
                  <a href="#">
                    <img  class="rounded-circle" src="/storage/image/{{ Auth::user()->image }}">
                  </a>
                  
                </div>

                
                <div class="card-body pt-0 pt-md-4">
           <h2>
          Hola, {{ Auth::user()->name }}<span class="font-weight-light"></span>
           </h2>
     
   </div>
            
          
                <div class="card-body pt-0 pt-md-4">
                  <div class="row">
                    <div class="col">
                      <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      
                      </div>
                    </div>
                  </div>
                  <div class="text-left">

                          
                  <h2>Información de la cuenta</h2>
                   Email (privado)
            <div class="form-group">
        <input type="text" value="{{ Auth::user()->email }}" class="form-control" disabled />
      </div>

      <h2> Información del perfil   </h2>

                             
             <div class="form-group" id="groupfirstName">
            <label class="" for="firstName">Nombre <small>(mostrado públicamente)</small></label>
            <input class="form-control input-lg edit-profile-input short" type="text" id="firstName" name="firstName" value="{{ Auth::user()->name }}">        </div>
            
            <div class="form-group" id="grouplastName">
            <label class="" for="lastName">Apellidos <small>(mostrado públicamente)</small></label>
            <input class="form-control input-lg edit-profile-input short" type="text" id="lastName" name="lastName" value="{{ Auth::user()->lastName }}">        </div>
                 

            <div class="form-group" id="grouplastName">
            <label class="" for="lastName">DNI<small></small></label>
            <input class="form-control input-lg edit-profile-input short" type="text" id="dni" name="dni" value="{{ Auth::user()->dni }}">        </div>
            


            <div class="form-group">
            <label for="aboutMe">Quién soy</label>
            <textarea placeholder="" id="aboutMe" name="aboutMe" class="form-control" rows="3"></textarea>        </div>  

     
            <div class="custom-control custom-radio mb-3">
            <input name="custom-radio-2" class="custom-control-input" id="customRadio5" type="radio">
            <label class="custom-control-label" for="customRadio5">Hombre</label>
            </div>

            <div class="custom-control custom-radio mb-3">
            <input name="custom-radio-2" class="custom-control-input" id="customRadio6" checked="" type="radio">
            <label class="custom-control-label" for="customRadio6">Mujer</label>
            </div>
  

      
            <button type="button" class="btn btn-primary btn-sm float-right">Actualizar</button>
            
                  
                  
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
    <div class="modal-header d-block">
    <header class="gallery-selector__header-container">
        <h1 class="gallery-selector__cta-header">
        Escoge uno o más temas 
        </h1>
        <h2 class="gallery-selector__cta-sub-header">
        Esto nos ayudará a recomendarte proyectos
        </h2>
      </header>
        </div>

      <div class="modal-body">

      <form method="post" action="{{url('/categories')}}">

      <div class="row">
    <div class="col-md-3">
        <div class="custom-control custom-checkbox image-checkbox">
            <input type="checkbox" class="custom-control-input" id="ck1a" value='1' name="sports[]">
            <label class="custom-control-label" for="ck1a">


            <div class="thumbnail text-center">
                <img src="img/annie-spratt.jpg" alt="#" class="img-fluid">

                <div class="caption">
                <p>Laboral</p>
                </div>
            </div>


            </label>



        </div>
    </div>
    <div class="col-md-3">
        <div class="custom-control custom-checkbox image-checkbox">
            <input type="checkbox" class="custom-control-input" id="ck1b" value='2' name="sports[]">
            <label class="custom-control-label" for="ck1b">
            <div class="thumbnail text-center">
                <img src="img/luca-bravo.jpg" alt="#" class="img-fluid">
                <div class="caption">
                <p>StartUp</p>
                </div>
            </label>
        </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="custom-control custom-checkbox image-checkbox">
            <input type="checkbox" class="custom-control-input" id="ck1c" value='1' name="sports[]">
            <label class="custom-control-label" for="ck1c">
            <div class="thumbnail text-center">
                <img src="img/muneeb-syed.jpg" alt="#" class="img-fluid">
                <div class="caption">
                <p>Comercial</p>
                </div>
            </label>
        </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="custom-control custom-checkbox image-checkbox">
            <input type="checkbox" class="custom-control-input" id="ck1d" value='1' name="sports[]">
            <label class="custom-control-label" for="ck1d">
            <div class="thumbnail text-center">
                <img src="img/vladimir-kudinov.jpg" alt="#" class="img-fluid">
                <div class="caption">
                <p>Social</p>
                </div>
            </label>
        </div>
        </div>
    </div>
</div>



      </div>


      

      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary">Guardar preferencias</button>
      </div>
    </div>
  </div>
</div>
                    
</form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 data-info-person">CONTACTOS</h3>                  
                </div>
                <!-- <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Ver todos</a>
                </div> -->
              </div>
            </div>

            <div class="card-body">
              <!-- Add new contacts for this user here! -->
              @forelse($contacts as $contact)
                <div class="row">
                  <div class="col-md-3" >
                    <a href="#" class="avatar avatar-sm" style="margin:0 auto" data-toggle="tooltip" data-original-title="{{ $contact->name . ' ' . $contact->lastName }}">
                      <img alt="{{ $contact->name }}" src=" /storage/image/{{ $contact->image }}" class="rounded-circle" style="width:100%">
                    </a>
                  </div>
                  <div class="col-md-9" >
                    <p>{{ $contact->name .' '.$contact->lastName }}<br>
                    <i style="font-size: 12px; "> Del círculo: {{ $contact->project_name }}</i></p>
                  </div>
                  <hr>
                  
                  
                </div>
              @empty
                <div>
                  <p>Aún no tienes contactos en tus proyectos.</p>
                </div>
              @endforelse                  
                
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

      <!-- Modal -->
      <div class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="form-photo" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="modal-header">
                <h5 class="modal-title" id="requestProject_title">Actualizar imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img id="img-preview">
                
                <input id="user_photo" type="hidden" name="user_photo" value="{{ Auth::user()->id }}">
                <input id="photo" type="file" class="form-control" name="photo" >
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                  
                <button class="btn btn-primary">Actualizar Imagen</button>
                              
              </div>

            </form>
          </div>
        </div>
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

  <!-- Edit Modal -->
<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
        {{ Form::open(['route' => ['profile.update', 1], 'method' => 'PUT','files' => true] ) }}

      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Editar Foto</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
     
            <input type="hidden" name="profile_id">

            <div class="col-md-12">
                                <div class="form-group">
                                    <label title="Opcional"><strong>Seleccione foto en formato Png o Jpeg</strong> </label>
                                    <input type="file" name="image" class="form-control">
                                    @if($errors->has('image'))
                                        <span>
                                           <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>

     
        <div class="form-group">       
            <input type="submit" value="Actualizar Foto" class="btn btn-primary">
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <!-- Argon JS -->
  <script src="{{ asset('js/argon.js?v=1.0.0') }}"></script>
  <script>
  // $('#exampleModal').show();
  

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

     $(document).ready(function() {
    $('.open-EditProfileDialog').on('click', function(){
      var url ="profile/"  
      var id = $(this).data('id').toString();
      url = url.concat(id).concat("/edit");
      //alert(url);

      $.get(url, function(data){
        $("#editModal input[name='name']").val(data['name']);
        $("#editModal input[name='profile_id']").val(data['id']);
    
      });
    });
});


$(document).ready(function() {
    $('.open-EditProfileDialog2').on('click', function(){
      var url ="profile/"  
      var id = $(this).data('id').toString();
      url = url.concat(id).concat("/edit");
      //alert(url);

      $.get(url, function(data){
        $("#editModal input[name='name']").val(data['name']);
        $("#editModal input[name='profile_id']").val(data['id']);
    
      });
    });
});




     function seeModalUploadImage(e){

      $('#editImage').modal('show');
     }

     $('#form-photo').on('submit', function(e) {
        e.preventDefault();
        console.log('di clic en form');

        let formData = new FormData(this);
        //formData.append('file', file);
        //formData.append('_token', $('input[name=_token]').val());
        let user_photo = $('#user_photo').val();	
        let photo = $('#photo').prop("files");
        console.log(photo);
        
        console.log(user_photo); 

        $.ajax({
              type:'POST',
              dataType: "json",
              contentType: "application/json; charset=utf-8",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: '/profile/test',
              data:{
                //formData
                user_photo: user_photo,
                //photo: photo,
              },
             // cache:false,
              //contentType: false,
              //processData: false,
              
              success:function(data){
                data = JSON.parse(data);
                console.log('Validation true!',data);
                
                  
              },
              error: function(jqXHR, text, error){
                  alert('No se pudo Añadir los datos<br>' + error);
              }
          });	
      });  

  
     
  </script>

<?php

if(Auth::user()->is_active ==0 )
{

echo "<script language='JavaScript' type='text/javascript'>
$(document).ready(function() {
  $('#exampleModal').modal('show');
 });
</script>";

}

   ?>


</body>

</html>