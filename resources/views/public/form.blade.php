<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Registrar Empresa</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />

	  <!-- Argon CSS -->

  <script src="{{ asset('code/highcharts.js') }}"></script>
  <script src="{{ asset('code/modules/series-label.js') }}"></script>
  <script src="{{ asset('code/modules/exporting.js') }}"></script>
  <script src="{{ asset('code/modules/export-data.js') }}"></script>
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-city.jpg')">
	    <!--   Creative Tim Branding   -->
	    <a href="http://creative-tim.com">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="assets/img/new_logo.png">
	            </div>
	            <div class="brand">
	                Warmi Army
	            </div>
	        </div>
	    </a>

		<!--  Made With Material Kit  -->
		<a href="#" class="made-with-mk">
			<div class="brand">WA</div>
			<div class="made-with">
      
      Warmi Army @2019

      </div>
		</a>

	    <!--   Big container   -->
	    <div class="container" >
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container"  id="first_step" >
		                <div class="card wizard-card" data-color="purple" id="wizard">
			                <form id="form-project" enctype="multipart/form-data">
			                {{csrf_field()}}
						    <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Registre su empresa
		                        	</h3>
									<h5>Complete los datos para registrar su empresa en WA .</h5>
		                    	</div>
								<div visibility: hidden>
									<ul>
			                            <li><a href="#location" data-toggle="tab">Location</a></li>
			                           
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="location">
		                            	<div class="row">
		                                	<div class="col-sm-12">
		                                    	
		                                	</div>
		                                	<div class="col-sm-5 col-sm-offset-1">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Empresa</label>
		                                        	<input type="text" class="form-control" required id="input-client" name="input-client">
		                                    	</div>
		                                	</div>
		                                	<div class="col-sm-5">
		                                    	<div class="form-group label-floating">
		                                            <label class="control-label">Categoria</label>
	                                            	<select required id="input-category" name="input-category" class="form-control">
	                                                	<option disabled="" selected=""></option>
                                                    <option value="Alimentos">Alimentos</option>
                                     <option value="Eventos">Eventos</option>
                                    <option value="Educacion">Educacion</option>
                                    <option value="Salud">Salud</option>
                                    <option value="Tursimo">Turismo</option>
                                    <option value="Otro">Otro</option>
	                                            	</select>
	                                        	</div>
		                                	</div>
		                                	<div class="col-sm-5 col-sm-offset-1">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">¿Cuántas personas conforman su empresa?</label>
                                              <input type="number" class="form-control" required id="input-total" name="input-total" min="1" max="500" placeholder="">

                                                             </div>
		                                	</div>
		                                	<div class="col-sm-5">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">¿Cuántas mujeres conforman su empresa?</label>
		                                        	
		                                            	<input type="number" required id="input-women" name="input-women" min="1" max="200"  class="form-control" placeholder="" >
		                                        
		                                            	

                                                   
		                                    	</div>
		                                	</div>
		                            	</div>
		                            </div>
		                            
									
		                 
		                         
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
                                <button class="btn btn-primary" id="btn1Enviar" name="btn1Enviar">Siguiente >></button>
	                                </div>
	                               
		                            <div class="clearfix"></div>
		                        </div>
			                </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
          <div class="row" >

          <div class="col-md-3">
         


</div>



  




          <div id="second_step" style="padding:15px; display: none;">

		  <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
         
<div class="wizard-container">
		                <div class="card wizard-card" data-color="purple" id="wizard">

            <form id="form-member" enctype="multipart/form-data">
 <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
{{csrf_field()}}

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Registre participante
		                        	</h3>
									<h5>Complete los datos para registrar un nuevo participante en su empresa:</h5>
		                    	</div>
								<div visibility: hidden>
									<ul>
			                            <li><a href="#location2" data-toggle="tab">Location</a></li>
			                           
			                        </ul>
								</div>

              

			  
                
                <div class="col-sm-5 col-sm-offset-1" >
                    	<div class="form-group label-floating">
                      <label class="control-label">Nombres y Apellidos:</label>
                      <input type="text" id="input-member" name="input-member" class="form-control"placeholder=""  required>
                    </div>
                  </div>              
                  <div class="col-sm-5 col-sm-offset-1">
                     	<div class="form-group label-floating">
                      <label class="control-label">Cargo:</label>                                              	

                      <select id="input-role" type="text" class="form-control" name="input-role"   required>
					  <option disabled="" selected=""></option>
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
                  
                  <button type="submit" id="btn2Enviar" name="btn2Enviar" class="btn btn-primary btn-round">Registrar participante</button>
                  <a href="{{ route('form') }}" class="btn btn-link btn-round">Registrar otra empresa</a>
                </div>              
                  
                  
                  
              </form>
          </div>

  			</div>
    	</div>
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


	        </div>
	    </div>
	</div>

	

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	 <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

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

</html>
