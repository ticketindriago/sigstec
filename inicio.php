<?php

require ("scripts/scriptValidaSession.php");
?>

<!DOCTYPE>

<html lang="es">

<head>

	<title>Bienvenido</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

</head>

<body>
	
	<?php

		include_once("partes/header.php");

	?>

	<nav>

		<?php

			$_SESSION['ticket_tipo'] == 1 ? include_once("partes/menu.php") : include_once("partes/menu2.php");

		?>

	</nav>

	<article>

		<div id="logo"><img src="img/indriago.jpg"></div>

	</article>

	<footer></footer>

</body>

</html>