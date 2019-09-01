<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Mensajes - WARMY ARMY</title>
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

  <style>
    .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}
    .inbox_people {
      background: #f8f8f8 none repeat scroll 0 0;
      float: left;
      overflow: hidden;
      width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
      border: 1px solid #c4c4c4;
      clear: both;
      overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
      display: inline-block;
      text-align: right;
      width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
      color: #05728f;
      font-size: 21px;
      margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      padding: 0;
      color: #707070;
      font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
      float: left;
      width: 11%;
    }
    .chat_ib {
      float: left;
      padding: 0 0 0 15px;
      width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
      border-bottom: 1px solid #c4c4c4;
      margin: 0;
      padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
      display: inline-block;
      width: 6%;
    }
    .received_msg {
      display: inline-block;
      padding: 0 0 0 10px;
      vertical-align: top;
      width: 92%;
    }
    .received_withd_msg p {
      background: #ebebeb none repeat scroll 0 0;
      border-radius: 3px;
      color: #646464;
      font-size: 14px;
      margin: 0;
      padding: 5px 10px 5px 12px;
      width: 100%;
    }
    .time_date {
      color: #747474;
      display: block;
      font-size: 12px;
      margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
      float: left;
      padding: 30px 15px 0 25px;
      width: 60%;
    }

    .sent_msg p {
      background: #05728f none repeat scroll 0 0;
      border-radius: 3px;
      font-size: 14px;
      margin: 0; color:#fff;
      padding: 5px 10px 5px 12px;
      width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
      float: right;
      width: 46%;
    }
    .input_msg_write input {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      color: #4c4c4c;
      font-size: 15px;
      min-height: 48px;
      width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
      background: #05728f none repeat scroll 0 0;
      border: medium none;
      border-radius: 50%;
      color: #fff;
      cursor: pointer;
      font-size: 17px;
      height: 33px;
      position: absolute;
      right: 0;
      top: 11px;
      width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
      height: 516px;
      overflow-y: auto;
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
            <a class="nav-link active" href="#">
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">MENSAJES</a>
        
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
        <div class="container mt--7">
          
          <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">
               
                <div class="table-responsive">
                  <!-- Contenido de Mensajeria -->                 

                  <div class="container" style="width:100%;background-color: ;">
                    <div class="messaging">
                          <div class="inbox_msg">
                            <div class="inbox_people">
                              <div class="headind_srch">
                                <div class="recent_heading">
                                  <h4>Contactos</h4>
                                </div>
                                <div class="srch_bar">
                                  <div class="stylish-input-group">
                                    <input id="searchContact" name="searchContact" type="text" class="search-bar"  placeholder="Buscar" onkeypress="return findEvent(event)">
                                    <span class="input-group-addon">
                                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                    </span> </div>
                                </div>
                              </div>
                              <div id="inbox_chat" class="inbox_chat">
                            
                                @forelse($contacts as $contact)
                                <div class="chat_list" onclick="refreshChat({{$contact->id}},'{{ $contact->name}} {{ $contact->lastName }}')" style="cursor: pointer;">
                                  <div class="chat_people" >
                                    <div class="chat_img"> <img src="{{ ($contact->image == null) ? '/storage/image/user-default.png' : '/storage/image/'.$contact->image }}" alt="{{ $contact->name}}" title="{{ $contact->name}}"> </div>
                                    <div class="chat_ib">
                                      <h5> {{ $contact->name}} {{ $contact->lastName }} <span class="chat_date">...</span></h5>                                      
                                    </div>
                                  </div>
                                </div>
                                @empty

                                <div class="chat_list">
                                  <div class="chat_people" >
                                    <p>Usted no tiene contactos por el momento.</p>
                                  </div>
                                </div>

                                @endforelse
                                
                              </div>
                            </div>

                            <!--  -->
                            <div class="mesgs" style="background:;">
                              <p id="titleReceiver" style="width:100%; padding: 0 5px; margin: 0"></p><hr style="margin:0">

                              <div id="msg_history" class="msg_history" style="background:;" data-receiver="">
                                <div style="width: 100%; height: 100%; display:flex; justify-content: center; align-items: center;">
                                  <p>Seleccione un contacto.</p>
                                </div>
                              </div>

                              <div id="type_msg" class="type_msg">
                                <div class="input_msg_write">
                                <form id="sendMessage" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                  <input id="textMessage" name="textMessage" type="text" class="write_msg" placeholder="Escribe tu mensaje..." style="background:white" autocomplete="off"/>
                                  
                                  <button class="msg_send_btn" type="submit"><i class="ni ni-send text-white" aria-hidden="true"></i></button>
                                </form>	  
                                </div>
                              </div>
                            </div>
                            <!--  -->
                          </div>                          
                        </div>
                        
                  </div>

                  <!-- end -->
                </div>
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
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('js/argon.js?v=1.0.0') }}"></script>
  <script>
    
    document.getElementById('type_msg').style.display = 'none';

    $('#sendMessage').on('submit', function(e) {
      e.preventDefault();

      let formDataText = new FormData(this);
      let destiner = document.getElementById('msg_history').getAttribute('data-receiver');
      formDataText.append('_token', $('input[name=_token]').val());
      formDataText.append('destiner', destiner);

      let textMessage = $('#textMessage').val();	 

      if(textMessage != '' && destiner != ''){

        $.ajax({
              type:'POST',
              url: '/messages/createMessage',
              data:formDataText,              
              cache:false,
              contentType: false,
              processData: false,
              success:function(data){
                data = JSON.parse(data);
                if(data.html){
                  // se pinta el contenedor de msjs
                  document.getElementById('msg_history').innerHTML = data.html;
                  updateScroll();
                }else{
                  console.log('No se pudo insertar el mensaje')
                }             
              },
              error: function(jqXHR, text, error){
                alert('No se pudo Añadir los datos ' + error);
              }
            });

        document.getElementById('textMessage').value = '';
      }  
    });

    function refreshChat(receiver,nameReceiver){
      document.getElementById('type_msg').style.display = 'block';   
      if(receiver){
        $.ajax({
              type:'GET',
              url: '/messages/show',
              data: { receiver : receiver,
                      nameReceiver : nameReceiver},
              success:function(data){
                data = JSON.parse(data);
                let history = document.getElementById('msg_history');

                history.innerHTML = data.html;
                history.setAttribute('data-receiver', data.receiver);
                document.getElementById('titleReceiver').innerHTML = data.nameReceiver;
                updateScroll();           
              },
              error: function(jqXHR, text, error){
                alert('No se pudo Añadir los datos ' + error);
              }
            });
      }else{
        console.log('Se debe seleccionar un contacto habilitado.');
      }      
    }

    /* Se ejecuta busqueda de usuario */
    function findEvent(event){
      if(event.which == 13 || event.keyCode == 13){
        let busqueda = document.getElementById('searchContact').value;

        //console.log(busqueda);

          $.ajax({
              type:'GET',
              url: '/messages/findUser',
              data:{
                  busqueda    :   busqueda,
              },
              success: function(respuesta) {
                data = JSON.parse(respuesta);
                if(data.error == 0){
                  document.getElementById('inbox_chat').innerHTML = data.html;
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

    function updateScroll(){
      $("#msg_history").animate({ scrollTop: $('#msg_history')[0].scrollHeight}, 1000);
    }
  </script>
</body>

</html>