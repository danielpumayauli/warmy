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

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<!-- <link href="assets/css/demo.css" rel="stylesheet" /> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
</head>

<body>
    <style>
        body{ background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}
        .ocultado{
            display: none;
        }
    </style>

            <h1 style="font-size: 2em; color: white">Registre su empresa en Warmi Army</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <span>Complete los datos de su empresa a continuación:</span>
                        <hr>
                        <div>
                            <form id="form-project" enctype="multipart/form-data">
			                    {{csrf_field()}}
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre de su Empresa</label>
                                    <input type="text" class="form-control" required id="nombreEmpresa" name="nombreEmpresa">
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Su empresa es dirigida por:</label>
                                    <select required id="ceo" name="ceo" class="form-control">
                                        <option disabled="" selected=""></option>
                                        <option value="1">Mujer</option>
                                        <option value="2">Hombre</option>
                                        <option value="3">Otro</option>
                                    </select>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">¿Cuántas mujeres conforman su empresa?</label>
                                    <input type="number" class="form-control" required id="cantMujeres" name="cantMujeres" min="1" max="500" placeholder="">
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">¿Cuántos hombres conforman su empresa?</label>
                                    <input type="number" class="form-control" required id="cantHombres" name="cantHombres" min="1" max="500" placeholder="">

                                </div>
                                <button class="btn btn-primary" id="btnEnviar" name="btnEnviar">Registrar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row ocultado" id="graphs">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <canvas id="myChart" width="100" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <canvas id="myChart2" width="100" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a id="downloadGraph" >Descargar informe</a>
                    </div>
                </div>


            </div>

        </div>

    </div>

	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script>

        $('#form-project').on('submit', function(e) {
            e.preventDefault();
            $('#btnEnviar').attr('disabled','disabled');

            let formData = new FormData(this);
            formData.append('_token', $('input[name=_token]').val());
            let nombreEmpresa = $('#nombreEmpresa').val();
            let ceo = $('#ceo').val();
            let cantMujeres = $('#cantMujeres').val();
            let cantHombres =  $('#cantHombres').val();
            // console.warn(nombreEmpresa,ceo,cantMujeres,cantHombres);

            $.ajax({
                type:'POST',
                url: '/form3',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    data = JSON.parse(data);
                    console.log('Validation true!', 'se pudo Añadir los datos de la empresa<br>');
                    console.log(data);

                    if(data.success == 1){
                        $('#graphs').removeClass('ocultado');
                        $('#downloadGraph').attr('href','/business/reports/download/'+data.projectId);
                        drawData(cantMujeres, cantHombres);

                    }else{
                        alert('No se pudo Añadir los datos, por favor vuelva a intentarlo.');
                    }

                },
                error: function(jqXHR, text, error){
                    alert('No se pudo Añadir los datos<br>' + error);
                }
            });


        });

        // drawData(8,2);


        function drawData(cantMujeres, cantHombres){
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx,{
                type: "pie",
                data:{
                    labels:['Mujeres', 'Hombres'],
                    datasets:[{
                        label:'Participación',
                        data:[cantMujeres, cantHombres],
                        backgroundColor:[
                            'rgb(66, 134, 244)',
                            'rgb(74, 135, 72)'
                        ]
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }

            });

            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var myChart2 = new Chart(ctx2,{
                type: "bar",
                data:{
                    labels:['Mujeres', 'Hombres'],
                    datasets:[{
                        label:'Participación',
                        data:[cantMujeres, cantHombres],
                        backgroundColor:[
                            'rgb(66, 134, 244, 0.5)',
                            'rgb(74, 135, 72, 0.5)'
                        ]
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }

            });
        }


    </script>
</body>

</html>
