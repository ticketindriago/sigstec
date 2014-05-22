<!DOCTYPE>

<html lang="es">

<head>

	<title>Añadir Nuevo Ticket</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

</head>

<body>
	
	<header></header>

	<nav>

		<?php

			include_once("partes/menu.php");

		?>

	</nav>

	<article>

		<form name="formulario" action="scripts/scriptAddTicket.php" method="POST" enctype="multipart/form-data">

			<table>

				<tr>

					<td>Nombre:</td><td>Anonimo</td>

				</tr>

				<tr>
						
					<td>Tipo de Solicitud:</td>
					<td>Soporte<input type="radio" name="solicitud" id="solicitud" value="1" required>
						Reparacion<input type="radio" name="solicitud" id="solicitud" value="2" required>
						Asistencia<input type="radio" name="solicitud" id="solicitud" value="3" required></td>
							
						
				</tr>

				<tr>
						
					<td>Prioridad:</td>
					<td>Alta<input type="radio" name="prioridad" id="prioridad" value="1" required>
						Baja<input type="radio" name="prioridad" id="prioridad" value="2" required>
						Media<input type="radio" name="prioridad" id="prioridad" value="3" required></td>
							
						
				</tr>

				<tr>

					<td>Titulo:</td><td><input type="text" id="titulo" name="titulo" required></td>

				</tr>

				<tr>

					<td>Observación:</td><td><textarea id="observacion" name="observacion"></textarea></td>

				</tr>

				<tr>

					<td>Archivo:</td><td><input type="file" name="archivo" id="archivo"></td>

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