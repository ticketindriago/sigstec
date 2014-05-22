<!DOCTYPE>

<html lang="es">

<head>

	<title>Añadir Nuevo Usuario</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/generaNombreUsuario.js"></script>
	<script type="text/javascript" src="js/validaNombreUsuario.js"></script>
	<script type="text/javascript" src="js/validaCedula.js"></script>
	<script type="text/javascript" src="js/validaEmail.js"></script>
	<script type="text/javascript" src="js/letrasYnumeros.js"></script>

	<script type="text/javascript">

		var x;
		x=$(document);
		x.ready(iniciarEventos);

		function iniciarEventos(){

			var nombreUsuario = $("#nombreUsuario");
			var cedula = $("#cedula");
			var email = $("#email");

			nombreUsuario.focus(creaNombre);
			nombreUsuario.focus(validaUsuario);
			nombreUsuario.focusout(validaUsuario);
			email.focus(validaCedula);
			email.focusout(validaCedula);
			email.focus(validaEmail);
			email.focusout(validaEmail);
		}

		$(function(){

	        $('#nombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	        $('#apellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	        $('#nombreUsuario').validCampoFranz(' abcdefghijklmnñopqrstuvwxyz');
	        $('#email').validCampoFranz(' abcdefghijklmnopqrstuvwxyz0123456789@-_.');
	        $('#cedula').validCampoFranz('0123456789');
        });

    </script> 

</head>

<body>
	
	<header></header>

	<nav>

		<?php

			include_once("partes/menu.php");

		?>

	</nav>

	<article>

		<a href="addUser.php?active=3">Registrar Usuario</a> | <a href="listUser.php?active=3">Listar Usuarios</a>

		<form name="formulario" action="scripts/scriptAddUser.php" method="POST">

			<table>

				<tr>

					<td>Nombre:</td><td><input type="text" id="nombre" name="nombre" autofocus required></td>

				</tr>

				<tr>

					<td>Apellido:</td><td><input type="text" id="apellido" name="apellido" required></td>

				</tr>

				<tr>

					<td>Cedula:</td><td><input type="text" id="cedula" name="cedula" required><span id="validaCedula"></span></td>

				</tr>

				<tr>

					<td>Correo Electronico:</td><td><input type="text" id="email" name="email" require><span id="validaEmail"></span></td>

				</tr>

				<tr>

					<td>Nombre de Usuario:</td><td><input type="text" id="nombreUsuario" name="nombreUsuario" require><span id="validaUsuario"></span></td>

				</tr>

				<tr>
						
					<td>Tipo de Usuario</td>
					<td>Adminstrador<input type="radio" name="tipo" id="tipo" value="1" required>
						Jefe de Departamento<input type="radio" name="tipo" id="tipo" value="2" required>
						Empleado<input type="radio" name="tipo" id="tipo" value="3" required></td>
							
						
				</tr>

				<tr>

					<td>Clave de Usuario:</td><td><input type="text" id="clave" name="clave" required></td>

				</tr>

				<tr>

					<td><input type="submit"></td><td><input type="reset"></td>

				</tr>

			</table>

		</form>

	</article>

	<footer></footer>

</body>

</html>