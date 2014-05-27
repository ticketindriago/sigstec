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

					<td><ins>Nombre</ins></td>
					<td><ins>Apellido</ins></td>
					<td><ins>Cedula</ins></td>
					<td><ins>Email</ins></td>
					<td><ins>Usuario</ins></td>
					<td><ins>Tipo</ins></td>
					<td><ins>Estado</ins></td>
					<td><ins>Cede</ins></td>
					<td><ins>Departamento</ins></td>
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

						if($resultado['id_cede']==11)
							$cede = "CI - Carupano";
						if($resultado['id_cede']==12)
							$cede = "CI - Maturin";
						if($resultado['id_cede']==13)
							$cede = "CI - Cumana";
						if($resultado['id_cede']==21)
							$cede = "SF - Carupano";
						if($resultado['id_cede']==22)
							$cede = "SF - Cumana";

						echo "<tr>
								  <td>".$resultado['personaNombre']."</td>
								  <td>".$resultado['apellido']."</td>
								  <td>".$resultado['cedula']."</td>
								  <td>".$resultado['email']."</td>
								  <td>".$resultado['nombreUsuario']."</td>
								  <td>".$tipo."</td>
								  <td>".$activo."</td>
								  <td>".$cede."</td>
								  <td>".$resultado['nombreDepartamento']."</td>
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