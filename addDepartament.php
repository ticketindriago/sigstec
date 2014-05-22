<!DOCTYPE>

<html lang="es">

<head>

	<title>Nuevo Departamento</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/letrasYnumeros.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
            $(".cede").hide();
            $("#empresa").change(function(){
            $(".cede").hide();
            $("#div_" + $(this).val()).show();
            });
        });

		$(function(){

	        $('#nombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóú');
        });

    </script> 

</head>

<body>
	
	<header></header>

	<nav>

		<?php

			include_once("partes/menu.php");

		?>

	</nav>

	<article>

		<a href="addDepartament.php?active=3">Registrar Departamento</a> | <a href="listDepartament.php?active=3">Listar Departamentos</a>

		<form name="formulario" action="scripts/scriptAddDepartament.php" method="POST">

			<table>

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
		            <td><select name="cede1">
			            <option value="0">Seleccione Cede</option>
			            <option value="1">Carupano</option>
			            <option value="2">Maturin</option>
			            <option value="3">Cumana</option>
			        </select></td>
			    </tr>

			    <tr id="div_2" class="cede">
		           <td>Cede</td>
		           <td><select name="cede2">
			            <option value="0">Seleccione Cede</option>
			            <option value="1">Carupano</option>
			            <option value="2">Cumana</option>
			        </select></td>
				</tr>

			    <tr>

					<td>Nombre:</td><td><input type="text" id="nombre" name="nombre" autofocus required></td>

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