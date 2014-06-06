<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plantilla básica de Bootstrap</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">

    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

  </head>

  <body>

    <div class="container">

      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <img src="img/banner2.jpg" alt="Banner" class="img-responsive">

        <?php

          include_once ("partes/nav.php");

        ?>

      </nav>

    </div>

  </body>

</html>