<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.ico"> -->

	<title>Registrar empresa</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- <link rel="icon" type="image/png" href="assets/img/favicon.png" /> -->

	<!-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" /> -->
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
	<style media="screen">
	/*Panel tabs*/
	.panel-tabs {
		position: relative;
		bottom: 30px;
		clear:both;
		border-bottom: 1px solid transparent;
	}

	.panel-tabs > li {
		float: left;
		margin-bottom: -1px;
	}

	.panel-tabs > li > a {
		margin-right: 2px;
		margin-top: 4px;
		line-height: .85;
		border: 1px solid transparent;
		border-radius: 4px 4px 0 0;
		color: #ffffff;
	}

	.panel-tabs > li > a:hover {
		border-color: transparent;
		color: #ffffff;
		background-color: transparent;
	}

	.panel-tabs > li.active > a,
	.panel-tabs > li.active > a:hover,
	.panel-tabs > li.active > a:focus {
		color: #fff;
		cursor: default;
		-webkit-border-radius: 2px;
		-moz-border-radius: 2px;
		border-radius: 2px;
		background-color: rgba(255,255,255, .23);
		border-bottom-color: transparent;
	}
	/* Progress bar */
	/* .vertical {
	  display: inline-block;
	  width: 20%;
	  height: 40px;
	  -webkit-transform: rotate(-90deg);
	  transform: rotate(-90deg);
	}
	.vertical {
	  box-shadow: inset 0px 4px 6px #ccc;
	}
	.progress-bar {
	  box-shadow: inset 0px 4px 6px rgba(100,100,100,0.6);
	} */
	.g1-papa{
		-webkit-transform: rotate(-90deg);
	  transform: rotate(-90deg);
		display: inline-block;
		position: relative;
		width: 150px;
		height: 70px;
		background: rgb(124, 181, 236);
		margin: 0 auto;
	}
	.g1-hijo{
		background: rgb(241,92,128);
		height:100%;
	}
	</style>
	<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-profile.jpg')">
	    <!--   Creative Tim Branding   -->
	    <a href="/">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="assets/img/new_logo.png">
	            </div>
	            <div class="brand">
	                Warmi Army
	            </div>
	        </div>
	    </a>



	    <!--   Big container   col-sm-8 col-sm-offset-2-->
	    <div class="container">
	        <div class="row">
		        <div id="wizard" class="col-sm-8">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="green">
		                    <form action="" method="">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Registre su empresa en Warmi Army
		                        	</h3>
															<h5>
																<a href="/business/reports">Ver reportes</a>
															</h5>
		                    	</div>
													<div class="wizard-navigation">
														<ul>
		                            <li><a href="#about" data-toggle="tab">EMPRESA</a></li>
																<li><a href="#people" data-toggle="tab">PERSONAS</a></li>
		                            <li><a href="#address" data-toggle="tab">AGREGUE</a></li>
		                        </ul>
													</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="row">
		                                	<h4 class="info-text"> Complete los datos para registrar su empresa en WA </h4>
                                        <!-- <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                  <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                    <input type="file" id="wizard-picture">
                                                </div>
                                                <h6>Choose Picture</h6>
                                            </div>
                                        </div> -->
		                                	  <div class="col-sm-8 col-sm-offset-2">
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="material-icons">work_outline</i>
                                              </span>
													                    <div class="form-group label-floating">
			                                          <label class="control-label">Empresa <small>(requerido)</small></label>
			                                          <input required name="company" id="company" type="text" class="form-control">
			                                        </div>
												                    </div>

                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="material-icons">view_week</i>
                                              </span>
                                              <div class="form-group label-floating">
                                                <label class="control-label">Categoría <small>(requerido)</small></label>
                                                <!-- <input name="lastname" type="text" class="form-control"> -->
																								<select  id="category" name="categoria" class="form-control">
	                                                	<option disabled="" selected=""></option>
                                                    <option value="Alimentos">Alimentos</option>
									                                     <option value="Eventos">Eventos</option>
									                                    <option value="Educacion">Educacion</option>
									                                    <option value="Salud">Salud</option>
									                                    <option value="Turismo">Turismo</option>
									                                    <option value="Otro">Otro</option>
	                                            	</select>
                                              </div>
                                            </div>
                                        </div>

		                            	</div>
		                            </div>
																<div class="tab-pane" id="people">
		                              <div class="row">
		                                	<h4 class="info-text"> Agregue información de su empresa </h4>
                                        <!-- <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                  <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                    <input type="file" id="wizard-picture">
                                                </div>
                                                <h6>Choose Picture</h6>
                                            </div>
                                        </div> -->
		                                	  <div class="col-sm-8 col-sm-offset-2">
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="material-icons">group</i>
                                              </span>
													                    <div class="form-group label-floating">
			                                          <label class="control-label">¿Cuántas personas conforman su empresa? <small>(requerido)</small></label>
			                                          <input required id="companyt" name="companyt" type="number" class="form-control">
			                                        </div>
												                    </div>

                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <i class="material-icons">emoji_people</i>
                                              </span>
                                              <div class="form-group label-floating">
                                                <label class="control-label">¿Cuántas mujeres conforman su empresa? <small>(requerido)</small></label>
                                                <input required id="companyf" name="companyf" type="number" class="form-control">
                                              </div>
                                            </div>
                                        </div>

		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="address" >
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> Registre un participante </h4>
		                                    </div>
		                                    <div class="col-sm-7 col-sm-offset-1">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">Nombres y Apellidos </label>
	                                    				<input required id="participant" name="participant" type="text" class="form-control">
	                                        	</div>
		                                    </div>

		                                    <div class="col-sm-3">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Cargo</label>
	                                            	<select id="cargo" name="cargo" class="form-control">
																										<option disabled="" selected=""></option>
	                                                	<option value="Gerente General"> Gerente General </option>
	                                                	<option value="Gerente Comercial"> Gerente Comercial </option>
	                                                	<option value="Administrador"> Administrador </option>
	                                                	<option value="American Samoa"> American Samoa </option>
	                                                	<option value="Contador"> Contador </option>
	                                                	<option value="Supervisor"> Supervisor </option>
	                                                	<option value="Otro"> Otro </option>
	                                            	</select>
		                                        </div>
		                                    </div>
		                                </div>

		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' />
		                                <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Agregar' onclick="listenAdd()"/>
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
						<!-- Inicio de contenedor de grafica hidden -->
						<div id="report" class="col-sm-4 hidden">
							<div class="wizard-container">
								<div class="card " data-color="green">
									<!-- Inicio contenido en tabs -->
									<div class="">
										<div class="row">
											<div class="col-md-12 ">
															<div class="panel panel-primary" style="border: none;">
																	<div class="panel-heading" style="background-color: #4caf50; border: none;">
																			<h3 class="panel-title">&nbsp;</h3>
																			<span class="pull-left">
																					<!-- Tabs -->
																					<ul class="nav panel-tabs">
																							<li class="active"><a href="#tab1" data-toggle="tab">Participación</a></li>
																							<li><a href="#tab2" data-toggle="tab">Cargos Femeninos </a></li>
																					</ul>
																			</span>
																	</div>
																	<div class="panel-body">
																			<div class="tab-content">
																					<div class="tab-pane active" id="tab1">
																						<span style="visibility: hidden;">hello world</span>
																						<div class="" style="width:100%; min-height: 200px; background: ; margin: 0 auto; text-align:center">
																								<!-- Barra vertical -->

																									<div class="legend-g1" style="margin-bottom: 50px;">
																										<span style="display: inline-block"> <i style="color: rgb(241,92,128); font-size: 16px">&bull;</i> Mujeres</span>
																										<span style="display: inline-block"> <i style="color: rgb(124, 181, 236); font-size: 16px">&bull;</i> Hombres</span>
																									</div>

																									<div class="g1-papa">
																										<div id="g1-hijo-percent" class="g1-hijo">
																											<span id="g1-hijo-description" style="color: #fff"></span>
																										</div>
																									</div>

																								<!-- Fin barra vertical -->
																						</div>
																					</div>
																					<div class="tab-pane" id="tab2">

																					</div>


																			</div>
																	</div>
															</div>
													</div>
										</div>
										</div>
									<!-- Fin contenido en Tabs -->
								</div>
							</div>

						</div>
					</div><!-- end row -->
	    </div> <!--  big container -->

	    <!-- <div class="footer">
	        <div class="container text-center">
	             Warmi Army
	        </div>
	    </div> -->
	</div>

</body>
	<!--   Core JS Files   -->
  <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		var flag = 0;
		var idProject = null;


		function resize(){
			console.log('en el resize');
			// $('#wizard').removeClass('col-sm-8 col-sm-offset-2');
			// $('#wizard').addClass('col-sm-6');
			$('#report').removeClass('hidden');
		}

		function updateGraph1(companyf, companyt){
			let percent = Math.round((companyf / companyt)*100);
			console.log(companyf, companyt);
			console.log('percent es: ',percent);
			$('#g1-hijo-percent').css('width',percent+'%');
			$('#g1-hijo-description').html(percent+'%');
		}
		function listenAdd(){

			console.log('click en listenAdd');
			let company 		= $('#company').val();
			let category 		= $('#category').val();
			let companyt 		= $.trim($('#companyt').val());
			let companyf 		= $.trim($('#companyf').val());
			let participant = $.trim($('#participant').val());
			let cargo 			= $.trim($('#cargo').val());
			console.log(company, category, companyt, companyf, flag);



			if(flag === 0){

				if( participant != ''){
					console.log('se envia por unica vez en ajax: company, category, companyt, companyf');
					console.log('se envia solamente el primer participante');

					// se envia a servidor

					$.ajax({
			      type:'POST',
			      url: '/form2',
						headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  },
						data: {
							company	: company,
							category:	category,
							companyt:	companyt,
							companyf:	companyf,
							participant: participant,
							cargo		:	cargo
						},
			      cache:false,
			      success:function(data){
			        data = JSON.parse(data);
			        console.log(data);
							console.log('id de project es?? '+data.project.id);
							idProject = data.project.id;
							// aqui se debe limpiar el "formulario" para blanquearlo
							$('#participant').val('');
							$('#cargo').val('');

							updateGraph1(1,companyt);
							// Falta updateGraph2 ...
							resize();



			      },
			      error: function(jqXHR, text, error){
			          alert('No se pudo Añadir los datos<br>' + error);
			      }
			    });

					flag++;
				}else{
					console.log('se debe de registrar al menos un participante!');
				}

			}else{
				if( participant != ''){
					console.log('se envia solamente el nuevo participante');
					console.log('flag es: ' + flag);
					console.log('los nuevos datos son', idProject, participant, cargo);

					$.ajax({
			      type:'POST',
			      url: '/form2/registerMember',
						headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  },
						data: {
							idProject	: idProject,
							participant:	participant,
							cargo		:	cargo
						},
			      cache:false,
			      success:function(data){
			        data = JSON.parse(data);
			        console.log(data);
							// Se debe limpiar el "formulario"
							$('#participant').val('');
							$('#cargo').val('');

							// updateGraph1(1,companyt);
							// Falta updateGraph2 ...
							resize();
			      },
			      error: function(jqXHR, text, error){
			          alert('No se pudo Añadir los datos<br>' + error);
			      }
			    });

					flag++;
				}else{
					console.log('no se envia nada');
				}
			}


		}
	</script>

</html>
