<?php

require ("scripts/scriptValidaSession.php");
?>
<!DOCTYPE>

<html lang="es">

<head>

	<title>Cambio de Clave</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
		  $("#cambioClave").submit(function() {

		      if ($("#clave").val() != $("#clave2").val()) {
		        alert("Las Claves no son iguales\n\nIntente Nuevamente");		
		        return false;
		      } else 
		          return true;			
		    });
		});

	</script>	

</head>

<body>
	
	<header>

		<img src="img/banner.jpg">

	</header>

	<nav></nav>

	<article>

		<div id="login">

			<div class="titulo"><h1>Cambie Su Contraseña</h1></div>

			<div id="formularioLogin">

				<form method="POST" action="scripts/scriptChanguePass.php" id="cambioClave">

					<table>

						<tr>

							<th>Clave:</th>
							<td><input type="password" name="clave" id="clave" required></td>

						</tr>

						<tr>

							<th>Repita la Clave:</th>
							<td><input type="password" name="clave2" id="clave2" required></td>

						</tr>

						<tr>

							<td colspan="2" style="text-align: center; padding-top:2px;">

								<input type="submit" value="Cambiar">
								<input type="reset" value="Borrar">

							</td>

						</tr>

					</table>

				</form>

			</div>

		</div>

	</article>

	<footer></footer>

</body>

</html>