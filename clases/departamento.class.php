<?php

class Departamento{

	private $cede;
	private $nombre;

	function setCede($cede){

		$this->cede = $cede;
	}

	function setNombre($nombre){

		$this->nombre = $nombre;
	}

	function addDepartament($conexion){

		mysqli_query($conexion, "INSERT INTO departamento (id_cede, nombre) values('".$this->cede."', '".$this->nombre."') ")
								 or die("Error Insertando Departamento: ".mysqli_error($conexion));
	}

	function listDepartament($conexion, $cede){

		$consulta = mysqli_query($conexion, "SELECT * FROM departamento WHERE id_cede=".$cede." ") 
											 or die("Error Insertando Departamento: ".mysqli_error($conexion));

		return $consulta;
	}
}

?>