<?php

require ("scripts/scriptValidaSession.php");
?>

<!DOCTYPE>

<html lang="es">

<head>

	<title>Listado de Departamentos</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="links.css"/>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/listaDepartamentos.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
            $(".cede").hide();
            $("#empresa").change(function(){
            $(".cede").hide();
            $("#div_" + $(this).val()).show();
            });

            $("#empresa").change(listar)

            function listar(){

        		$("#cede"+$("#empresa").val()).change(listaDepartamentos);

        	}

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

		<a href="addDepartament.php?active=4">Registrar Departamento</a> | <a href="listDepartament.php?active=4">Listar Departamento</a>

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

		</table>

		<div id="listaDepartamentos"></div>

	</article>

	<footer></footer>

</body>

</html>