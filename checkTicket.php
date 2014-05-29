<?php

require ("scripts/scriptValidaSession.php");
require ("clases/usuario.class.php");
require ("clases/baseDatos.class.php");
require ("clases/ticket.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$ticket = new Ticket();

$consulta = $ticket->searchTicket($conexion, $_GET['id']);

$resultado = $consulta->fetch_array(MYSQLI_ASSOC);

$consulta_respuestas = $ticket->listResponse($conexion, $_GET['id']);

$numero_respuestas = $consulta_respuestas->num_rows;

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

	$resultado['status'] < 3 ? $abrirCerrar = "<a href=\"scripts/scriptCloseTicket.php?id=".$resultado['id']."\">Cerrar Ticket</a>" : $abrirCerrar = "<a href=\"scripts/scriptOpenTicket.php?id=".$resultado['id']."\">Reabrir Ticket</a>";
?>

<!DOCTYPE>

<html lang="es">

<head>

	<title>Ticket <?=$resultado['id']?></title>
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

		<form name="formulario" action="scripts/scriptAddResponse.php?id=<?=$resultado['id']?>" method="POST" enctype="multipart/form-data">

			<table>

				<tr>

					<td>
						Nombre:
					</td>
					<td>
						<strong>
							<?=$resultado_usuario['personaNombre']?> <?=$resultado_usuario['apellido']?> /
							<?=$resultado_usuario['nombreDepartamento']?> /
							<?=$cede?>
						</strong>
					</td>
					<td>
						<?=$abrirCerrar?>
					</td>

				</tr>

				<tr>
						
					<td>Tipo de Solicitud:</td>
					<td><?=$solicitud?></td>
							
						
				</tr>

				<tr>
						
					<td>Prioridad:</td>
					<td><?=$prioridad?></td>
							
						
				</tr>

				<tr>

					<td>Titulo:</td><td><?=$resultado['titulo']?></td>

				</tr>

				<tr>

					<td>Observación:</td><td style="width:100px"><?=$resultado['observacion']?></td>

				</tr>

				<tr>

					<td>Archivo:</td><td><img width="400" src="img/imagenesTickets/<?=$resultado['archivo']?>"></td>

				</tr>

				<?php

					if($numero_respuestas > 0){

						echo 	"<tr>

									<td colspan=\"2\" style=\"text-align:center;background-color:  #8888FF;\"><strong>Respuestas<strong></td>

								</tr>";

						while($resultado_respuestas	= $consulta_respuestas->fetch_array(MYSQLI_ASSOC)){

							$usuario = new Usuario();

							$consulta_usuario = $usuario->searchUser($conexion, $resultado['id_usuario']);

							$resultado_usuario 	= $consulta_usuario->fetch_array(MYSQLI_ASSOC);

							$fecha 	= array();
							$hora 	= array();

							$fecha 	= explode('-', $resultado_respuestas['fecha']);
							$hora 	= explode(':', $resultado_respuestas['hora']);
							$fecha[0] = $fecha[0]%2000;

							echo 	"<tr>

										<td colspan=\"2\"><strong>".$resultado_usuario['personaNombre']." ".$resultado_usuario['apellido']." Agrego el ".$fecha[2]."/".$fecha[1]."/".$fecha[0]." a las ".$hora[0].":".$hora[1]."</strong></td>

									</tr>

									<tr>
										<td colspan=\"2\">".$resultado_respuestas['respuesta']."</td>
									</tr>
									<tr>
										<td colspan=\"2\">----------------------------------------------------------------------------------------------------------------------</td>
									</tr>";
						}
					}

				?>

				<?php

					if($resultado['status'] != 3)

					include_once("partes/respuestaTicket.php");

				?>

			</table>

		</form>

	</article>

	<footer></footer>

</body>

</html>