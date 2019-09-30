<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Perfil - WARMI ARMY</title>
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
          <div class="card shadow">
            <div class="card-header border-0">
              <!-- <h3 class="mb-0">CÍRCULOS DE INTEGRACIÓN</h3> -->

              <!-- Trigger the modal with a button -->
           
              <a href="/circle/create" class="btn btn-primary">

              <i class="fa fa-plus"></i> Nuevo Proyecto</a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">PROYECTO</th>
                    <th scope="col">ACTIVIDAD</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">INTEGRANTES</th>
                    <th scope="col">DISPONIBILIDAD</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  
                 
                  @forelse ($projects as $project)
                    @php {{
                      switch($project->project_participants){
                        case 4 :
                          $alertColor = 'green';
                          break;

                        case 5:
                          $alertColor = 'red';
                          break;
                        
                        default:
                        $alertColor = 'blue';
                          break;
                      }
                    }} @endphp 
                    
                  
                  <tr class="animated fadeInLeft">
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm" id="getCircle" style="cursor: pointer;" 
                                
                                data-name="{{ $project->project_name }}" 
                                data-shortName="{{ $project->project_shortName }}" 
                                data-description="{{ $project->project_description }}" 
                                data-goals="{{ $project->project_goals }}" 
                                data-circle="{{ $project->circle_name }}" 
                                data-author-name="{{ $project->author_name }}" 
                                data-author-lastName="{{ $project->author_lastName }}"
                                data-participants="{{ $project->project_participants }}" 
                                onclick="getInfoProject(this)">{{ $project->project_name }}</span><br>
                                @if($project->circle_name  === 'Laboral')
                                <span class="badge badge-info">{{ $project->circle_name }}</span>
                                @elseif ($project->circle_name  === 'Social')
                                <span class="badge badge-warning" style="background-color: yellow">{{ $project->circle_name }}</span>
                                @elseif ($project->circle_name  === 'Comercial')  

         
<span class="badge badge-danger">{{ $project->circle_name }}</span>

 @elseif ($project->circle_name  === 'StartUp')  
         
<span class="badge badge-success">{{ $project->circle_name }}</span>

                                @endif
                        </div>
                      </div>
                    </th>
                    <td>
                      <a href="/project/{{ $project->project_shortName }}">Ver actividad</a>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="" style="background-color: {{ $alertColor }}"></i> {{ (($project->project_participants == 5) ? 'Completado': 'Por completar') }}
                      </span>
                    </td>
                    <td>
                      <div id="users-{{ $project->project_shortName }}" class="avatar-group">
                        @foreach($usersProjects as $userProject)
                          @if ($userProject->project_id == $project->project_id)
                          <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="{{ $userProject->name . ' ' . $userProject->lastName }}">
                            
                            <img alt="Image placeholder" src="{{ $userProject->image == null ? '/storage/image/user-default.png' : '/storage/image/'.$userProject->image }}" class="rounded-circle">
                          </a>
                          @endif
                        
                        @endforeach
                        <!-- <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="{{ asset('img/theme/team-2-800x800.jpg') }}" class="rounded-circle">
                        </a> -->
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">{{ ($project->project_participants/5)*100 }}%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ ($project->project_participants/5)*100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($project->project_participants/5)*100 }}%; background-color: {{ $alertColor }}"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    
                  </tr>
                  @empty
                  <tr class="animated fadeInLeft">
                  <th scope="row">
                  Usted no está en ningún círculo por el momento.
                  </th>
                  
                  </tr>
                  @endforelse
                  
                  
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="projectInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="projectInfoTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="projectInfoDesc">
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="closeProjectInfo()">Cerrar</button>
              <a id="projectInfoUrl" type="button" class="btn btn-primary" target="_blank">Ver actividad</a>
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
 
    function getInfoProject(e){

      let projectName = $(e).attr("data-name");
      let projectShortName = $(e).attr("data-shortName");
      let projectCircle = $(e).attr("data-circle");
      let projectParticipants = $(e).attr("data-participants");
      let projectIntro = `<p><strong>Creado por:</strong> ${$(e).attr("data-author-name")} ${$(e).attr("data-author-lastName")}</p>
                          <p><strong>Descripción:</strong> <br> ${$(e).attr("data-description")}</p>
                          <p><strong>Objetivos:</strong> <br> ${$(e).attr("data-goals")}</p>
                          <p><strong>N° de Participantes: </strong> ${projectParticipants}</p>`;

      $('#projectInfoTitle').html(projectName);
      $('#projectInfoDesc').html(projectIntro);
      $('#projectInfoUrl').attr('href','/project/'+projectShortName);
      $('#teamSelected').html('<h6 class="navbar-heading text-muted text-center">MI EQUIPO</h6>');
      $(`#users-${projectShortName}`).clone().appendTo('#teamSelected');

      $('#projectInfo').modal({backdrop: 'static', keyboard: false})
      $('#projectInfo').modal('show');
      // 
      

    }

    function closeProjectInfo(){
      $('#teamSelected').html('');
      $('#projectInfo').modal('hide');
    }

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
  </script>
</body>

</html>