<?php

require ("scriptValidaSession.php");
require ("../clases/ticket.class.php");
require ("../clases/baseDatos.class.php");
require ("../PHPMailer/class.phpmailer.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$ticket = new Ticket();

$ticket->setIdUsuario($_SESSION['ticket_id']);
$ticket->setTipoSolicitud($_POST['solicitud']);
$ticket->setPrioridad($_POST['prioridad']);
$ticket->setTitulo($_POST['titulo']);
$ticket->setObservacion($_POST['observacion']);
$ticket->setStatus(1);
$ticket->setFechaCreacion();
$ticket->addTicket($conexion);

$ticket_id = $ticket->getId($conexion);

if(strlen($_FILES['archivo']['name'])){

	if ($_FILES['archivo']["error"] > 0)
		echo "Error: " . $_FILES['archivo']['error'] . "<br>";

	$_FILES['archivo']['name'] = "imagen-".$ticket->getId($conexion).".png";

	move_uploaded_file($_FILES['archivo']['tmp_name'],"../img/imagenesTickets/".$_FILES['archivo']['name']);

	$ticket->setArchivo($_FILES['archivo']['name'], $conexion);

}

$conexion->close();

//Envio de correo electronico al usuario

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;// or 587
$mail->IsHTML(true);
$mail->Username = "gpstrackerindriago";
$mail->Password = "JM.camila2301";
$mail->SetFrom("gpstrackerindriago@gmail.com");
$mail->Subject = "Nuevo Ticket";
$mail->Body = "Hola <strong>".$_SESSION['ticket_nombre']."</strong> su nuevo Ticket ha sido creado satisfactoriamente en nuestro sistema de
			   Tickets Indriago, su numero de ticket es <strong>".$ticket_id."</strong> en la brevedad posible sera atentido.<br> Saludos coordiales. 
			   <br>Atte:Departamento de Sistemas";
$mail->AddAddress($_SESSION['ticket_email']);
$mail->Send();

header("location: ../addTicket.php");
?>