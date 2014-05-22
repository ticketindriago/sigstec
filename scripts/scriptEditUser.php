<?php

require ("../clases/usuario.class.php");
require ("../clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$usuario = new Usuario();

$usuario->setNombre($_POST['nombre']);
$usuario->setApellido($_POST['apellido']);
$usuario->setCedula($_POST['cedula']);
$usuario->setEmail($_POST['email']);
$usuario->setTipo($_POST['tipo']);
$usuario->editUser($conexion, $_GET['id']);

$conexion->close();

header("location: ../listUser.php?active=3");
?>