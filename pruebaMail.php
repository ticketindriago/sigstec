<?php

require 'PHPMailer/class.phpmailer.php';
 
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "just38.justhost.com";
$mail->Port = 465;// or 587
$mail->IsHTML(true);
$mail->Username = "jafricano@comercialindriago.com";
$mail->Password = "jA12887586";
$mail->SetFrom("jafricano@comercialindriago.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("jesus.africano@gmail.com");
$mail->AddReplyTo("name@yourdomain.com");
 if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    echo "Message has been sent";
    }
?>