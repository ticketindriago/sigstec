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

<!DOCTYPE>

<html lang="es">

<head>

	<title>Login</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

</head>

<body>
	
	<header>

		<img src="img/banner.jpg">

	</header>

	<nav></nav>

	<article>

		<div id="login">

			<div class="titulo"><h1>Login</h1></div>

			<div id="formularioLogin">

				<form method="POST" action="scripts/login.php">

					<table>

						<tr>

							<th>Usuario:</th>
							<td><input type="text" name="usuario" id="usuario" required></td>

						</tr>

						<tr>

							<th>Clave:</th>
							<td><input type="password" name="clave" id="clave" required></td>

						</tr>

						<tr>

							<td colspan="2" style="text-align: center; padding-top:2px;">

								<input type="submit" value="Enviar">
								<input type="reset" value="Borrar">

							</td>

						</tr>

					</table>

				</form>

				<div id="olvidoPass"><a href="#">¿Olvido su Contraseña ó Usuario?</a><br><a href="#">Ayuda</a></div>

			</div>

			<div id="error"><?=$error?></div>

		</div>

	</article>

	<footer></footer>

</body>

</html>