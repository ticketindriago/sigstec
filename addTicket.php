<?php

require ("scripts/scriptValidaSession.php");
require ("clases/usuario.class.php");
require ("clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$usuario = new Usuario();

$consulta = $usuario->searchUser($conexion, $_SESSION['ticket_id']);

$resultado 	= $consulta->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE>

<html lang="es">

<head>

	<title>Añadir Nuevo Ticket</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

</head>

<body>
	
	<?php

		include_once("partes/header.php");

	?>

	<nav>

		<?php

			$_SESSION['ticket_tipo'] == 1 ? include_once("partes/menu.php") : include_once("partes/menu2.php");

		?>

	</nav>

	<article>

		<form name="formulario" action="scripts/scriptAddTicket.php" method="POST" enctype="multipart/form-data">

			<table>

				<tr>

					<td>Nombre:</td><td><strong><?=$resultado['personaNombre']?> <?=$resultado['apellido']?></strong></td>

				</tr>

				<tr>
						
					<td>Tipo de Solicitud:</td>
					<td>
						<select name="solicitud" id="solicitud" required>
							<option value="0">-</option>
							<option value="1">Soporte</option>
							<option value="2">Reparacion</option>
							<option value="3">Asistencia</option>
						</select>
					</td>
							
						
				</tr>

				<tr>
						
					<td>Prioridad:</td>
					<td>
						<select name="prioridad" id="prioridad" required>
							<option value="0">-</option>
							<option value="1">Alta</option>
							<option value="2">Media</option>
							<option value="3">Baja</option>
						</select>
					</td>
							
						
				</tr>

				<tr>

					<td>Titulo:</td><td><input type="text" id="titulo" name="titulo" size="60" required></td>

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