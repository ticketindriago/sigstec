<?php

require ("scripts/scriptValidaSession.php");
require ("clases/ticket.class.php");
require ("clases/baseDatos.class.php");
require ("clases/usuario.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$ticket = new Ticket();

if($_SESSION['ticket_tipo'] == 3){

	$consulta = $ticket->listTicketCloseEmpleado($conexion, $_SESSION['ticket_id']);
}
if($_SESSION['ticket_tipo'] == 2){

	$consulta = $ticket->listTicketCloseSupervisor($conexion, $_SESSION['ticket_id_departamento']);
}
else 
	$consulta = $ticket->listTicketClose($conexion);


?>
<!DOCTYPE>

<html lang="es">

<head>

	<title>Solicitudes Cerradas</title>
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


		<table id="listar">

			<tr>

				<td>Usuario</td>
				<td>Departamento</td>
				<td>Cede</td>
				<td>Tipo de Solicitud</td>
				<td>Prioridad</td>
				<td>Titulo</td>
				<td>Adjunto</td>
				<td>Status</td>
				<td>Ticket Id</td>

			</tr>

			<?php
				
				while ($resultado 	= $consulta->fetch_array(MYSQLI_ASSOC)){

					$usuario = new Usuario();

					$consulta_usuario = $usuario->searchUser($conexion, $resultado['id_usuario']);

					$resultado_usuario 	= $consulta_usuario->fetch_array(MYSQLI_ASSOC);

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

					if(strlen($resultado['archivo'])>0)
						$archivo = "Si";
					else
						$archivo = "No";

					if($resultado_usuario['id_cede']==11)
							$cede = "CI - Carupano";
						if($resultado_usuario['id_cede']==12)
							$cede = "CI - Maturin";
						if($resultado_usuario['id_cede']==13)
							$cede = "CI - Cumana";
						if($resultado_usuario['id_cede']==21)
							$cede = "SF - Carupano";
						if($resultado_usuario['id_cede']==22)
							$cede = "SF - Cumana";

					echo "<tr>
							  <td>".$resultado_usuario['personaNombre']." ".$resultado_usuario['apellido']."</td>
							  <td>".$resultado_usuario['nombreDepartamento']."</td>
							  <td>".$cede."</td>
							  <td>".$solicitud."</td>
							  <td>".$prioridad."</td>
							  <td>".$resultado['titulo']."</td>
							  <td>".$archivo."</td>
							  <td>".$status."</td>
							  <td><a href=\"checkTicket.php?active=2&id=".$resultado['id']."\">".$resultado['id']."</a></td>
						  </tr>";
				}
				
				?>

		</table>

	</article>

	<footer></footer>

</body>

</html>