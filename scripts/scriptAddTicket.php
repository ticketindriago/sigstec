<?php

require ("../clases/ticket.class.php");
require ("../clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$ticket = new Ticket();

$ticket->setIdUsuario('0');
$ticket->setTipoSolicitud($_POST['solicitud']);
$ticket->setPrioridad($_POST['prioridad']);
$ticket->setTitulo($_POST['titulo']);
$ticket->setObservacion($_POST['observacion']);
$ticket->setStatus(1);
$ticket->setFechaCreacion();
$ticket->addTicket($conexion);

if ($_FILES['archivo']["error"] > 0)
	echo "Error: " . $_FILES['archivo']['error'] . "<br>";

$_FILES['archivo']['name'] = "imagen-".$ticket->getId($conexion).".png";

move_uploaded_file($_FILES['archivo']['tmp_name'],"../img/imagenesTickets/".$_FILES['archivo']['name']);

$ticket->setArchivo($_FILES['archivo']['name'], $conexion);

$conexion->close();

header("location: ../addTicket.php");
?>