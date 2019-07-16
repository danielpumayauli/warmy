<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyectos</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.5/waves.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <link type="text/css" href="{{ asset('css/projects.css?v=1.0.0') }}" rel="stylesheet">

</head>
<body>
	<div class="container mt-5">
                         
                                       <!-- LISTA -->

        	<!-- cascading cards -->

		<div class="row">
			<div class="col-12 mb-4">
				<h3>Comercial:</h3>

			</div>

                   
                            @forelse($groups[0] as $comercial)
                            <div class="col-md-4"> 

                            <div class="card card-cascade card-cascade-narrower mb-5">
					
						<img class="card-img-top" src="/storage/logo/{{ $comercial->image }} " >
            <div class="card-body">
							<h5 class="card-title">{{ $comercial->name }}   </h5>  
               
                                      {{ $comercial->description }}    
                                               
                                      <center>
							<a href="http://warmiarmy.ml/login" class="card-link" >Ver Más</a></center>
                                      </div>
                                      </div>
					</div>
                            @empty
                            <div class="list-group text-center">
                              <br><small>Aún no hay circulos comerciales para mostrar</small><br>
                             
                            </div>
                           
                          </div>
                        

                                      
                           
                            @endforelse
                          </div>      
                          
                        </div>
                      </div>


                     
                      <!-- FIN LISTA -->
                    </div>

                  </div>
                  <!-- Add personal details from this user here! -->
                  
                </div>
              </div>
            </div>
            
          </div>



          <!-- Footer -->
   
    
          <hr class="my-5">
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.5/waves.js"> </script>
			
	<script>
		Waves.attach (
			'[class*=card-img]',
			['waves-light']
		);
		Waves.init();
	</script>	
				 
</body>
</html>