<?php
	// session_start: crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
	session_start();
	// require_once: incluye y evalua el fichero especificado durante la ejecución del script.
	require_once ('../controlador/serv.php');
	// Si sesion esta abierta debe ir a panel.php
	if (isset($_SESSION['usuario'])){
		echo '<script>window.location="panel.php"; </script>';
	}
?>
<!DOCTYPE HTML>
<html lang="es-pe">
	<head>
		<title>Correo de Recuperacion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/estilos.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>	
	<body>






		<header>
			<!-- Contenedor -->
            <div>
				<!-- fila -->
            	<div class="row ">
					<!-- col de 3 -->
                    <div class="col-md-3">                        
                    </div>
					<!-- col de 6 -->
                    <div class="col-md-6">
                        
						<h1 class="text-center">Olvido su contraseña?
						</h1>
	
					</div>
					<!-- col de 3 -->
                    <div class="col-md-3">					
                    </div>
                </div>
			</div>
		</header>
		<section>
			<!-- Contenedor -->
            <div class="container">
				<!--fila  -->
				<div class="row">
					<div class="col-md-4">						
					</div>
					<div class="col-md-4">
						<h4>Ingrese el correo con el que se registro:</h4><br>
						<form method="post" action="../controlador/crearusuario.php">
							<div class="form-group">
								<input type="text" 
									name="usuario" 									
									placeholder="Ingrese su correo" 
									maxlength="50"
									class="form-control" 
									required/>
									<br>
									<span class="form-text small text-muted" id="helpResetPasswordEmail">
										Las intrucciones de recuperacion de contraseña seran enviadas a este correo
									</span>
<br><br>
							</div>			
										
							 <!-----------------------------
								<input type="submit" 
								name="registra" 
								class="btn btn-primary"/>
							 ------------------------------>


		<a class="btn btn-danger center-block" href="codigoRecuperarContraseña.php">Enviar
		</a>	
			
								<hr>	
		
							<a href="iniciar.php" class="texto-centrado">regresar al inicio</a>							
						</form>
					</div>
					<div class="col-md-4">					
					</div>
				</div>
			</div>

		</section>	
		

	<style>
body{
	border-radius: 20px;
box-shadow: 0 0 15px gray;
box-shadow: inset 0 0 15px gray;
padding: 4%;
}

body:hover{
border-radius: 20px;
box-shadow: 0 0 15px black;
box-shadow: inset 0 0 15px black;
}
html{

display: grid;
place-items: center;
padding-top: 10%;
background-color: gray;
}


a.btn-danger{
width: max-content;
			}

	</style>

	</body>
</html>