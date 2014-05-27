<?php

session_start();

if (!isset($_SESSION['ticket_usuario'])){
 
    header("location: index.php?login=0");
}

?>