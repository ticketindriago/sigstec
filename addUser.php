<?php

require ("scripts/scriptValidaSession.php");
?>
<!DOCTYPE>

<html lang="es">

<head>

	<title>Añadir Nuevo Usuario</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/generaNombreUsuario.js"></script>
	<script type="text/javascript" src="js/validaNombreUsuario.js"></script>
	<script type="text/javascript" src="js/validaCedula.js"></script>
	<script type="text/javascript" src="js/validaEmail.js"></script>
	<script type="text/javascript" src="js/letrasYnumeros.js"></script>
	<script type="text/javascript" src="js/listaDepartamentoUsuario.js"></script>


	<script type="text/javascript">

		var x;
		x=$(document);
		x.ready(iniciarEventos);

		function iniciarEventos(){

			var nombreUsuario = $("#nombreUsuario");
			var cedula = $("#cedula");
			var email = $("#email");

			nombreUsuario.focus(creaNombre);
			nombreUsuario.focus(validaUsuario);
			nombreUsuario.focusout(validaUsuario);
			email.focus(validaCedula);
			email.focusout(validaCedula);
			email.focus(validaEmail);
			email.focusout(validaEmail);

			$(document).ready(function(){
	            $(".cede").hide();
	            $("#empresa").change(function(){
	            $(".cede").hide();
	            $("#div_" + $(this).val()).show();
	            });

	            $("#empresa").change(listar)

	            function listar(){

	        		$("#cede"+$("#empresa").val()).change(listaDepartamentoUsuario);

	        	}

	        });
		}

		$(function(){

	        $('#nombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	        $('#apellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	        $('#nombreUsuario').validCampoFranz(' abcdefghijklmnñopqrstuvwxyz');
	        $('#email').validCampoFranz(' abcdefghijklmnopqrstuvwxyz0123456789@-_.');
	        $('#cedula').validCampoFranz('0123456789');
        });

    </script> 

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

		<a href="addUser.php?active=3">Registrar Usuario</a> | <a href="listUser.php?active=3">Listar Usuarios</a>

		<form name="formulario" action="scripts/scriptAddUser.php" method="POST">

			<table>

				<tr>

					<td>Nombre:</td><td><input type="text" id="nombre" name="nombre" autofocus required></td>

				</tr>

				<tr>

					<td>Apellido:</td><td><input type="text" id="apellido" name="apellido" required></td>

				</tr>

				<tr>

					<td>Cedula:</td><td><input type="text" id="cedula" name="cedula" required><span id="validaCedula"></span></td>

				</tr>

				<tr>

					<td>Correo Electronico:</td><td><input type="text" id="email" name="email" require><span id="validaEmail"></span></td>

				</tr>

				<tr>

					<td>Nombre de Usuario:</td><td><input type="text" id="nombreUsuario" name="nombreUsuario" require><span id="validaUsuario"></span></td>

				</tr>

				<tr>
						
					<td>Tipo de Usuario</td>
					<td>Adminstrador<input type="radio" name="tipo" id="tipo" value="1" required>
						Jefe de Departamento<input type="radio" name="tipo" id="tipo" value="2" required>
						Empleado<input type="radio" name="tipo" id="tipo" value="3" required></td>
							
						
				</tr>

				<tr>

					<td>Clave de Usuario:</td><td><input type="text" id="clave" name="clave" required></td>

				</tr>

				<tr>

					<td>Departamento</td>
					<tr>
						<td>Compañia</td>
						<td>
							<select name="empresa" id="empresa">
				            <option value="0">Seleccione Empresa</option>
				            <option value="1">Comercial Indriago C.A.</option>
				            <option value="2">Supermercado Francys C.A.</option>
				        	</select>
				        </td>
				    </tr>

				    <tr id="div_1" class="cede">
			            <td>Cede</td>
			            <td><select name="cede1" id="cede1">
				            <option value="0">Seleccione Cede</option>
				            <option value="1">Carupano</option>
				            <option value="2">Maturin</option>
				            <option value="3">Cumana</option>
				        </select></td>
				    </tr>

				    <tr id="div_2" class="cede">
			           <td>Cede</td>
			           <td><select name="cede2" id="cede2">
				            <option value="0">Seleccione Cede</option>
				            <option value="1">Carupano</option>
				            <option value="2">Cumana</option>
				        </select></td>
					</tr>

					<tr>

						<td>Seleccione un Departamento</td>
						<td id="listaDepartamentos"></td>

					</tr>

				</tr>	

				<tr>

					<td><input type="submit"></td><td><input type="reset"></td>

				</tr>

			</table>

		</form>

	</article>

	<footer></footer>

</body>

</html>