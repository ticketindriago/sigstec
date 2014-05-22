<?php

require ("clases/usuario.class.php");
require ("clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$usuario = new Usuario();

$consulta = $usuario->searchUser($conexion, $_GET['id']);

$resultado 	= $consulta->fetch_array(MYSQLI_ASSOC);

$checked1="";
$checked2="";

if($resultado['tipo']==1)
	$checked1 = "checked";
elseif ($resultado['tipo']==2)
	$checked2 = "checked";
else
	$checked3 = "checked";
?>
<!DOCTYPE>

<html lang="es">

<head>

	<title>Añadir Nuevo Usuario</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/letrasYnumeros.js"></script>

	<script type="text/javascript">

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

		<form name="formularioUsuario" action="scripts/scriptEditUser.php?id=<?=$resultado['idPersona']?>" method="POST">

			<table>

				<tr>

					<td>Nombre:</td><td><input type="text" id="nombre" name="nombre" value="<?=$resultado['personaNombre']?>"></td>

				</tr>

				<tr>

					<td>Apellido:</td><td><input type="text" id="apellido" name="apellido" value="<?=$resultado['apellido']?>"></td>

				</tr>

				<tr>

					<td>Cedula:</td><td><input type="text" id="cedula" name="cedula" value="<?=$resultado['cedula']?>"></td>

				</tr>

				<tr>

					<td>Correo Electronico:</td><td><input type="text" id="email" name="email" size="30" value="<?=$resultado['email']?>"></td>

				</tr>

				<tr>
						
					<td>Tipo de Usuario</td>
					<td>
						Adminstrador <input type="radio" name="tipo" id="tipo" value="1" <?=$checked1?>>
						Jefe de Departamento<input type="radio" name="tipo" id="tipo" value="2" <?=$checked2?>>
						Empleado<input type="radio" name="tipo" id="tipo" value="3" <?=$checked3?>>
					</td>
							
						
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