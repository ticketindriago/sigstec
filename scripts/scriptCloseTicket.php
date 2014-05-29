<?php

require ("scriptValidaSession.php");
require ("../clases/ticket.class.php");
require ("../clases/baseDatos.class.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$ticket = new Ticket();

$ticket->setStatus(3);
$ticket->changueStatus($conexion, $id);

$conexion->close();

header("location: ../checkTicket.php?active=1&id=".$_GET['id']." ");
?>