<?php

require ("../clases/departamento.class.php");
require ("../clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$departamento = new Departamento();

$departamento->setNombre($_POST['nombre']);
$departamento->editDepartament($conexion, $_GET['id']);

$conexion->close();

header("location: ../listDepartament.php?active=4");
?>