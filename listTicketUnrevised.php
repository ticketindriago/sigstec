<?php

require ("clases/ticket.class.php");
require ("clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$ticket = new Ticket();

$consulta = $ticket->listTicketUnrevised($conexion);

?>
<!DOCTYPE>

<html lang="es">

<head>

	<title>Solicitudes Pendientes</title>
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


		<table id="listar">

			<tr>

				<td>Usuario</td>
				<td>Tipo de Solicitud</td>
				<td>Prioridad</td>
				<td>Titulo</td>
				<td>Adjunto</td>
				<td>Status</td>
				<td></td>

			</tr>

			<?php
				
				while ($resultado 	= $consulta->fetch_array(MYSQLI_ASSOC)){

					if($resultado['tipo_solicitud']==1)
						$solicitud = "Soporte";
					elseif($resultado['tipo_solicitud']==2)
						$solicitud = "Reparacion";
					else
						$solicitud = "Asistencia";

					if($resultado['prioridad']==1)
						$prioridad = "Alta";
					elseif($resultado['prioridad']==2)
						$prioridad = "Media";
					else
						$prioridad = "Baja";

					if($resultado['status']==1)
						$status = "Por Revisar";
					elseif($resultado['status']==2)
						$status = "Revisado";
					else
						$status = "Cerrado";

					echo "<tr>
							  <td>".$resultado['id_usuario']."</td>
							  <td>".$solicitud."</td>
							  <td>".$prioridad."</td>
							  <td>".$resultado['titulo']."</td>
							  <td>".$resultado['archivo']."</td>
							  <td>".$status."</td>
							  <td><a href=\"checkTicket.php?active=3&id=".$resultado['idPersona']."\">Revisar</a></td>
						  </tr>";
				}
				
				?>

		</table>

	</article>

	<footer></footer>

</body>

</html>