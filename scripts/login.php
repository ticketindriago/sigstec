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

	$consulta = $usuario->validaUsuario($conexion, $_POST['usuario'], md5($_POST['clave']));

	$valido = $consulta->num_rows;

	if($valido){

		$resultado = $consulta->fetch_array(MYSQLI_ASSOC);

		if($resultado['activo']){

			$_SESSION['ticket_usuario'] 			= $resultado['nombre'];

			$_SESSION['ticket_tipo']				= $resultado['tipo'];

			$_SESSION['ticket_activo']				= $resultado['activo'];

			$_SESSION['ticket_id']					= $resultado['id'];

			$_SESSION['ticket_id_departamento'] 	= $resultado['id_departamento'];

			header("location: ../inicio.php?active=5");
		}
		else
			header("location: ../index.php?error=2");
		
	}
	else
		header("location: ../index.php?error=1");
}
		

?>