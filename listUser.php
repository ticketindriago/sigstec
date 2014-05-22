<?php

require ("clases/usuario.class.php");
require ("clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$usuario = new Usuario();

$consulta = $usuario->listUser($conexion);

?>
<!DOCTYPE>

<html lang="es">

<head>

	<title>Listado de Usuarios</title>
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

		<a href="addUser.php?active=3">Registrar Usuario</a> | <a href="listUser.php?active=3">Listar Usuarios</a>

		<form name="formularioUsuario" action="scripts/scriptAddUser.php" method="POST">

			<table id="listar">

				<tr>

					<td>Nombre</td>
					<td>Apellido</td>
					<td>Cedula</td>
					<td>Email</td>
					<td>Usuario</td>
					<td>Tipo</td>
					<td>Estado</td>
					<td></td>
					<td></td>

				</tr>

				<?php
					
					while ($resultado 	= $consulta->fetch_array(MYSQLI_ASSOC)){

						if($resultado['tipo'] == 1)
							$tipo = "Administrador";
						elseif($resultado['tipo'] == 2)
							$tipo = "Jefe de Departamento";
						else
							$tipo = "Empleado";

						if($resultado['activo'] == 1){
							
							$activo = "Activo";
							$actdesc = "Desactivar";
						}
						else{

							$activo = "Desactivado";
							$actdesc = "Activar";
						}

						echo "<tr>
								  <td>".$resultado['personaNombre']."</td>
								  <td>".$resultado['apellido']."</td>
								  <td>".$resultado['cedula']."</td>
								  <td>".$resultado['email']."</td>
								  <td>".$resultado['nombre']."</td>
								  <td>".$tipo."</td>
								  <td>".$activo."</td>
								  <td><a href=\"editUser.php?active=3&id=".$resultado['idPersona']."\">Editar</a></td>
								  <td><a href=\"scripts/scriptActDesactUsuario.php?id=".$resultado['idPersona']."\">".$actdesc."</a></td>
							  </tr>";
					}
					
					?>

			</table>

		</form>

	</article>

	<footer></footer>

</body>

</html>