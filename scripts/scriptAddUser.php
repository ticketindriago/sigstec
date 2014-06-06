<?php

require ("../clases/usuario.class.php");
require ("../clases/baseDatos.class.php");
require ("../PHPMailer/class.phpmailer.php");

$conexion = new baseDatos();

if ($conexion->connect_errno) {
    
    echo "Fallo la conexion: ".$conexion->connect_error;
}

$usuario = new Usuario();

$usuario->setNombre($_POST['nombre']);
$usuario->setApellido($_POST['apellido']);
$usuario->setCedula($_POST['cedula']);
$usuario->setEmail($_POST['email']);
$usuario->setNombreUsuario($_POST['nombreUsuario']);
$usuario->setClave(md5($_POST['clave']));
$usuario->setTipo($_POST['tipo']);
$usuario->setDepartamento($_POST['departamento']);
$usuario->addUser($conexion);

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
$mail->Subject = "Nuevo Usuario en la Aplicacion de Tickets Indriago";
$mail->Body = "Hola <strong>".$_POST['nombre']." ".$_POST['apellido']."</strong> su nuevo Usuario ha sido creado satisfactoriamente en nuestro sistema de
			   Tickets Indriago, su nuevo usuario para acceder a nuestro sismtema es <strong>".$_POST['nombreUsuario']."</strong> y su clave <strong>".$_POST['clave']."</strong>. Recordandole
			   que debe no debe conceder su usuario ni clave a ninguna otra persona, usted es el unico responsable sobre su cuenta.<br> Saludos coordiales. 
			   <br>Atte:Departamento de Sistemas";
$mail->AddAddress($_POST['email']);
$mail->Send();

header("location: ../listUser.php?active=3");
?>