<?php

if(isset($_GET['error'])){

	$_GET['error'] == 1 ? $error = "¡Usuario ó Clave Invalidos!" : $error = "¡Usuario Desactivado!";
}
elseif(isset($_GET['login'])){

	!$_GET['login'] ? $error = "Error no se encuentra Logueado en el Sistema" : $error = " ";
}
else
	$error=" ";
?>

<!DOCTYPE html>

<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">

    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

  </head>

  <body>

    <div class="container">

      	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

		  	<img src="img/banner2.jpg" alt="Banner" class="img-responsive">

		</nav>

		<div class="col-md-4 col-md-push-4">

			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title text-center">Login</h3>
			  </div>
			  <div class="panel-body">
			    <form role="form" method="POST" action="scripts/login.php">

						<div class="form-gruop">

							<label for="Usuario">Usuario:</label>
							<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de Usuario" required>

							<label for="Clave">Clave:</label>
							<input type="password" class="form-control" name="clave" id="clave" placeholder="Introduzca su Clave" required>

						</div>

						<br>

						<button type="submit" class="btn btn-default">Enviar</button>
						<button type="reset" class="btn btn-default">Borrar</button>

					</form>
			  </div>

			  	<div class="panel-body">
	
				  	<div class="col-md-11 col-md-push-1">

				  
				    	<a href="#">¿Olvido su Contraseña ó Usuario?</a>
				 

				  	</div>

				  	<div class="col-md-1 col-md-push-4">

				  
				    	<a href="#">Ayuda</a>
				 

				  	</div>

				</div>

			</div>

		</div>

		<div class="col-md-12">

			<div class="col-md-4 col-md-push-4">


				<?php 
				  
					if(isset($_GET['error']) || isset($_GET['login'])) echo 	"<div class=\"alert alert-info\"><p class=\"text-center\">".$error."</p></div>";

				?>

			</div>
			 

		</div>

    </div>

  </body>

</html>