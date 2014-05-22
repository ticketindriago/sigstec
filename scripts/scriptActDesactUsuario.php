<?php
require ("../clases/usuario.class.php");
require ("../clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$usuario 	= new Usuario();

$consulta 	= $usuario->searchUser($conexion, $_GET['id']);

$resultado 	= $consulta->fetch_array(MYSQLI_ASSOC);

if($resultado['activo']==1)
	$usuario->deactivate($conexion, $resultado['id']);
elseif($resultado['activo']==0)
	$usuario->active($conexion, $resultado['id']);

$conexion->close();

header("location: ../listUser.php?active=3");
?>