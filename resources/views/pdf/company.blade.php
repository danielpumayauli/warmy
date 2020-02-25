<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Company PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->

	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script> -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
</head>
<body>
    <h1>Informe Warmi Army - {{$name}}</h1>
    <span>Cantidad de mujeres: {{$cantMujeres}}</span>
    <span>cantidad de hombres: {{$cantHombres}}</span>

    <hr>

    <div class="row" id="graphs">
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
    </div>



    <script>

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx,{
                type: "pie",
                data:{
                    labels:['Mujeres', 'Hombres'],
                    datasets:[{
                        label:'Participación',
                        data:[50, 50],
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
                        data:[50, 50],
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

    </script>
</body>
</html>
