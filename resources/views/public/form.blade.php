<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Registre su empresa - WARMI ARMY</title>
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
  <script src="{{ asset('code/highcharts.js') }}"></script>
  <script src="{{ asset('code/modules/series-label.js') }}"></script>
  <script src="{{ asset('code/modules/exporting.js') }}"></script>
  <script src="{{ asset('code/modules/export-data.js') }}"></script>
</head>

<body>
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" style="background-color: #4FBC92">
      <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/">REGISTRE SU EMPRESA</a>
        
        
        
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
  <div class="row">
      <div class="col-md-6">
          <div class="row">
            <div id="contenido" class="col-md-12" style="background: #fff">
                <div id="info-empresa" style="padding: 10px;">

                </div>
                <div id="info-miembros">
                  
                </div>
            </div>
          </div>



          <div id="first_step" style="padding: 15px;">
            <span>Complete los datos para registrar su empresa en WA</span>
              <br><br>
              
              <form id="form-project" enctype="multipart/form-data">
              {{csrf_field()}}
                <div  class="row">                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-client">Empresa</label>
                      <input type="text" required id="input-client" name="input-client" class="form-control form-control-alternative" placeholder="" >
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label class="form-control-label" for="input-category">Categoría</label>
                      <input type="text" required id="input-category" name="input-category" class="form-control form-control-alternative" placeholder="" >
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label class="form-control-label" for="input-category">¿Cuántas personas conforman su empresa?</label>
                      <input type="number" required id="input-total" name="input-total" min="1" max="500" class="form-control form-control-alternative" placeholder="" >
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group">
                      <label class="form-control-label" for="input-category">¿Cuántas mujeres conforman su empresa?</label>
                      <input type="number" required id="input-women" name="input-women" min="1" max="200" class="form-control form-control-alternative" placeholder="" >
                    </div>
                  </div>
                  <!-- <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label" for="photo-project">Imagen</label>
                      <input type="hidden" id="photo-project" name="photo-project" accept="image/*">
                    </div>
                  </div> -->
                </div>              
                  
                  <button type="submit" id="btn1Enviar" name="btn1Enviar" class="btn btn-primary btn-round">Registrar empresa</button>
                  
              </form>
          </div>




          <div id="second_step" style="padding:15px; display: none;">
            <span style="padding: 10px 0;">Complete los datos para registrar un nuevo participante en su empresa:</span>
            <br><br>
            <form id="form-member" enctype="multipart/form-data">
              {{csrf_field()}}
                <div  class="row">
                <div class="col-md-12" >
                    <div class="form-group">
                      <label class="form-control-label" for="input-member">Nombres y Apellidos:</label>
                      <input type="text" id="input-member" name="input-member" class="form-control form-control-alternative" placeholder="" style="width:50%;" required>
                    </div>
                  </div>              
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-role">Cargo:</label>
                      <select id="input-role" type="text" class="form-control form-control-alternative" name="input-role" autofocus style="width:50%" required>
                        <option value="Gerente General">Gerente General</option>
                        <option value="Gerente Comercial">Gerente Comercial</option>
                        <option value="Adminitrador">Adminitrador</option>
                        <option value="Contador">Contador</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Otro">Otro</option>
                      </select>
                      <input type="hidden" id="input-block" name="input-block" >
                    </div>
                  </div>
                  
                  
                </div>              
                  
                  <button type="submit" id="btn2Enviar" name="btn2Enviar" class="btn btn-primary btn-round">Registrar participante</button>
                  <a href="{{ route('form') }}" class="btn btn-link btn-round">Registrar otra empresa</a>
                  
              </form>
          </div>

        
        
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
          <!-- GRAFICA DE GENEROS -->
            <div id="container2" style="min-width: 300px; height: 400px; margin: 0 auto"></div>   
          </div>
          <div class="col-md-6">
          <!-- GRAFICA DE CARGOS -->
            <div id="container1" style="min-width: 300px; height: 400px; margin: 0 auto"></div>   
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <a href="#" class=" " data-toggle="tooltip" data-original-title="Ver más Voluntme">
              <img alt="voluntme" src="{{ asset('img/voluntme.jpg') }}" width="100">
            </a>
          </div>
          <div class="col-md-3">
          <a href="#" class=" " data-toggle="tooltip" data-original-title="Ver más Totemiq">
              <img alt="totemiq" src="{{ asset('img/totemiq.jpg') }}"  width="100">
            </a>
          </div>
          <div class="col-md-3">
            <a href="#" class=" " data-toggle="tooltip" data-original-title="Ver más Aurora">
              <img alt="aurora" src="{{ asset('img/aurora.jpg') }}" width="100">
            </a>
          </div>
          <div class="col-md-3">
            <a href="#" class=" " data-toggle="tooltip" data-original-title="Ver más Qadosh">
              <img alt="qadosh" src="{{ asset('img/qadosh.jpg') }}"  width="100">
            </a>
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

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('js/argon.js?v=1.0.0') }}"></script>
  <script type="text/javascript">

  let globalTotalMembers = null;
  let globalTotalWomen = null;
  let globalCounter = null;

$('#form-project').on('submit', function(e) {

e.preventDefault();

    let formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());

    let project = $('#input-client').val();	  
    let category = $('#input-category').val();
    let ntotal = $('#input-total').val();
    let nwomen = $('#input-women').val();
    // let image = $('#photo-project').val();

    $.ajax({
      type:'POST',
      url: '/form',
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(data){
        data = JSON.parse(data);
        console.log('Validation true!', 'se pudo Añadir los datos de la empresa<br>');        
        globalTotalMembers = data.total_members;
        globalTotalWomen = data.women_members;
          
          $('#info-empresa').html('<h3>Empresa: '+data.name+' - <i>Categoría: '+data.category+'</i></h3><br>'+((data.image != null) ? '<img src="'+data.image+'" width="100"/>':''));
          $('#input-block').attr("value", data.id);

          $("#first_step").remove();
          $("#second_step").css("display", "block");
          
      },
      error: function(jqXHR, text, error){
          alert('No se pudo Añadir los datos<br>' + error);
      }
    });

  });

  $('#form-member').on('submit', function(e) {

    e.preventDefault();

        let formDataMember = new FormData(this);
        formDataMember.append('_token', $('input[name=_token]').val());

        let inputMember = $('#input-member').val();	  
        let inputRole = $('#input-role').val();

        if(inputMember != '' || inputRole != ''){
          if(globalCounter <= globalTotalWomen){
            $.ajax({
              type:'POST',
              url: '/form/registerMember',
              data:formDataMember,
              
              cache:false,
              contentType: false,
              processData: false,
              success:function(data){
                data = JSON.parse(data);
                console.log('Validation true!', 'se pudo Añadir los datos del miembro.');
                globalCounter = data.members.length;

                if(globalCounter < globalTotalWomen){
                  let founders = $('#info-miembros').html();
                  $('#info-miembros').html(founders+'<p style="display: inline; padding: 5px;">Cargo: '+data.member.role+'</p><p style="display: inline; padding: 20px;">Nombre: '+data.member.fullname+'</p><br>');
                  $('#input-role').val("");
                  $('#input-member').val("");
                }else{
                  $('#info-miembros').html('<p style="padding:5px;">Usted ha completado el número total participantes mujeres de su empresa. Gracias por completar sus datos.</p>'+`<br><a href="{{ route('form') }}" class="btn btn-link btn-round">Registrar otra empresa</a>`);
                  $('#second_step').remove();
                }
                
                  
                initGraph1(data.members,globalTotalMembers);
                initGraph2(data.members,globalTotalMembers);
              },
              error: function(jqXHR, text, error){
                  alert('No se pudo Añadir los datos<br>' + error);
              }
            });
          }else{
            alert('Usted ha completado el número total participantes mujeres de su empresa. Gracias.');
          }
          
        }else{
          alert('Por favor, complete Nombres y apellidos y Cargo');
        }

        

      });

    function initGraph1(data,globalTotalMembers){      
      var result = Object.keys(data).map(function(key) {
        return [data[key]['role'], (20 - parseInt(key))];
      });
      // console.log(Object.values(result));
      Highcharts.chart('container1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Acerca de su empresa'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: ''
        },
        series: [{
            name: 'Population',    
            data: result
          }]
      });
    }

    function initGraph2(data,globalTotalMembers){
      // let percentGraph2 = (100/globalTotalMembers);
      // console.log('global total memb es ',globalTotalMembers);
      let quantityMembersF = Object.keys(data).length;
      let quantityMembersM = globalTotalMembers - Object.keys(data).length;

      Highcharts.chart('container2', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Participación por género'
          },
          xAxis: {
              categories: ['Participación']
          },
          yAxis: {
              min: 0,
              title: {
                  text: ''
              }
          },
          tooltip: {
              pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
              shared: true
          },
          plotOptions: {
              column: {
                  stacking: 'percent'
              }
          },
          series: [{
              name: 'Mujeres',
              data: [quantityMembersF]
          }, {
              name: 'Hombres',
              data: [quantityMembersM]
          }]
      });

    }
  </script>

</body>

</html>