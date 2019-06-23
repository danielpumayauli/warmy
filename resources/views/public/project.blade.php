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
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" style="background-color: #4FBC92">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/">PROYECTO: {{ $publicInfo[0]->name }}</a>
        
        
        <!-- User -->
        @if( isset(Auth::user()->id) )
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
                <span>Mis circulos</span>
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
        @endif
      </div>
  </nav>
    <div class="container">
      <!-- Table -->
      <div class="row" style="margin: 40px 0;">
        <div class="col-md-4">
          @if( isset(Auth::user()->id) )
            <img src="/storage/logo/{{ (($publicInfo[0]->image != null) ? $publicInfo[0]->image : 'default.png') }}" alt="{{ $publicInfo[0]->name }}" style="width:100%;">
          @endif
          <br>
          <div id="description" >
            <span>Descripción:</span>
            <br>
            <p>{{$publicInfo[0]->description}}</p>
          </div>
        </div>
        <div class="col-md-8">
          


          <br>
          <span>Acerca del proyecto:</span>
          
          
        
          @if( !isset(Auth::user()->id) )
          <div style="width: 100%; text-align:center;">
            <a href="/login?project={{$id}}" class="btn btn-info">Ver más</a>
          </div>
          
          @else
          <div class="col-md-6">
            <p>integrantes del proyecto</p>
            @foreach($members as $member)
            <a href="#" class="avatar avatar-lg" data-toggle="tooltip" data-original-title="{{ $member->name . ' ' . $member->lastName }}">
              <img alt="Image placeholder" src="{{ $member->image }}" class="rounded-circle">
            </a>
            @endforeach
          </div>


          <!-- <div class="col-md-6">
            <p>Intereses:</p>
            <p>...</p>
          </div>           -->
            <hr>
          <h2>Publicaciones:</h2>
          @if($userInProject == true)
          <form action="{{ url('/project/posts/'.$id) }}" method="post">
            {{csrf_field()}}
          <div class="row" id="create-post" style="background: white;">
            <div class="col-md-12 mt-3" >
              <div id="textarea-component" class="tab-pane tab-example-result fade active show mb-3" role="tabpanel" aria-labelledby="textarea-component-tab">
                
                  <textarea name="description" class="form-control form-control-alternative" id="description" rows="5" placeholder="Escriba su publicación" style="margin-top: 0px; margin-bottom: 0px; height: 129px;"></textarea>
               
              </div>
            </div>
            <br>
            <div class="col-md-2">
              <div class="custom-control custom-radio mb-3">
                <input name="privacy" class="custom-control-input" value="1" id="customRadio5" type="radio">
                <label class="custom-control-label" for="customRadio5">Público</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="custom-control custom-radio mb-3">
                <input name="privacy" class="custom-control-input" value="2" id="customRadio6" checked="" type="radio">
                <label class="custom-control-label" for="customRadio6">Privado</label>
              </div>
            </div>
            <div class="col-md-6">
                <label for="category" class="">Categoría</label>
                <select id="category" type="text" class="" name="category" autofocus >
                  
                  <option value="1">Informativo</option>
                  <option value="2">Búsqueda</option>
                  <option value="3">Ventas</option>
                </select>
            </div>
            <div class="col-md-2">
              <input type="hidden" name="project_id" value="{{$publicInfo[0]->id}}">
              <button class="btn btn-info">Compartir</button>
            </div>
              
              

             
            
          </div>
          </form>
          @endif
          <hr>
          @forelse($posts as $post)
            
            <div class="row">
                  
              <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3" data-toggle="tooltip" data-original-title="{{ $post->name . ' ' . $post->lastName }}">
                  <img alt="{{ $post->name }}" src="{{ $post->image }}">
                </a>
                <div class="media-body">
                  <span class="mb-0 text-sm">{{$post->description}}</span><br>
                  <span style="font-size:10px">Publicado por: {{$post->name}} {{$post->lastName}}</span>
                  
                  
                </div>
              </div>
              
              
            </div>
            <hr>
          @empty
            <p>Aún no hay publicaciones para mostrar</p>
          @endforelse
            
            
          @endif






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

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('js/argon.js?v=1.0.0') }}"></script>

</body>

</html>