<?php

session_start();

require ("../clases/usuario.class.php");
require ("../clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

if(isset($_POST['usuario'])){

	$usuario = new Usuario();

	$consulta = $usuario->validaUsuario($conexion, $_POST['usuario'], $_POST['clave']);

	$valido = $consulta->num_rows;

	if($valido){

		$resultado = $consulta->fetch_array(MYSQLI_ASSOC);

		if($resultado['activo']){

			$_SESSION['ticket_usuario'] = $resultado['nombre'];

			$_SESSION['ticket_tipo']	= $resultado['tipo'];

			$_SESSION['ticket_activo']	= $resultado['activo'];

			$_SESSION['ticket_codigo']	= $resultado['id'];

			header("location: ../inicio.php");
		}
		else
			header("location: ../index.php?error=2");
		
	}
	else
		header("location: ../index.php?error=1");
}
		

?>