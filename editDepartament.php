<?php

require ("clases/departamento.class.php");
require ("clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$departamento = new Departamento();

$consulta = $departamento->searchDepartament($conexion, $_GET['id']);

$resultado 	= $consulta->fetch_array(MYSQLI_ASSOC);
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

		<a href="addDepartament.php?active=4">Registrar Departamento</a> | <a href="listDepartament.php?active=4">Listar Departamento</a>

		<form name="formularioDepartamento" action="scripts/scriptEditDepartament.php?id=<?=$resultado['id']?>" method="POST">

			<table>

				<tr>

					<td>Nombre:</td><td><input type="text" id="nombre" name="nombre" value="<?=$resultado['nombre']?>"></td>

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