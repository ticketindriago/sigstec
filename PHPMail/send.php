    <?php
     
    require_once ('class.phpmailer.php');
    $Mail = new PHPMailer();
    $Mail->IsSMTP();
    $Mail->Host = 'smtp.gmail.com';
    $Mail->SMTPDebug = 2; //no olvides quitar el debug
    $Mail->SMTPAuth = true;
    $Mail->SMTPSecure = 'tls';
    $Mail->Port = 587;
    $Mail->Username = 'eleannygutierrez12@gmail.com';
    $Mail->Password = 'GUSTAVO18340225';
    $Mail->Priority = 1;
    $Mail->CharSet = 'UTF-8';
    $Mail->Encoding = '8bit';
    $Mail->Subject = 'Mensaje de prueba Gmail';
    $Mail->ContentType = 'text/html; charset=utf-8\r\n';
    $Mail->From = 'sistemasindriago@gmail.com';
    $Mail->FromName = 'Sistemas';
    $Mail->WordWrap = 900;
     
    $Mail->AddAddress('carlosg.bastidas@gmail.com');
    $Mail->isHTML(TRUE);
    $Mail->Body = 'Hola este es mi mensaje';
    $Mail->Send();
    $Mail->SmtpClose();
     
    if ($Mail->IsError()) {
        echo "ERROR<br /><br />";
    } else {
        echo "OK<br /><br />";
    }
