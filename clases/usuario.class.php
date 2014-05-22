<?php

class Usuario{

	private $nombre;
	private $apellido;
	private $cedula;
	private $email;
	private $nombreUsuario;
	private $clave;
	private $tipo;

	function setNombre($nombre){

		$this->nombre = $nombre;
	}

	function setApellido($apellido){

		$this->apellido = $apellido;
	}

	function setCedula($cedula){

		$this->cedula = $cedula;
	}

	function setEmail($email){

		$this->email = $email;
	}

	function setNombreUsuario($nombreUsuario){

		$this->nombreUsuario = $nombreUsuario;
	}

	function setClave($clave){

		$this->clave = $clave;
	}

	function setTipo($tipo){

		$this->tipo = $tipo;
	}

	function addUser($conexion){

		mysqli_query($conexion, "INSERT INTO persona (nombre, apellido, cedula, email) 
								 values('".$this->nombre."', '".$this->apellido."', '".$this->cedula."', '".$this->email."')")
								 or die("Error insertando nueva Persona: ".mysqli_error($conexion));

		mysqli_query($conexion, "INSERT INTO usuario (id_persona, nombre, clave, tipo) 
								 values('".mysqli_insert_id($conexion)."', '".$this->nombreUsuario."', '".$this->clave."', '".$this->tipo."')")
								 or die("Error insertando nuevo Usuario: ".mysqli_error($conexion));
	}

	function listUser($conexion){

		$consulta = (mysqli_query($conexion, "SELECT *, p.nombre as personaNombre, p.id as idPersona FROM persona as p
											  JOIN usuario as u
											  on p.id = u.id_persona")) or die("Error listando Usuarios: ".mysqli_error($conexion));
		
		return $consulta;
	}

	function searchUser($conexion, $id){

		$consulta = (mysqli_query($conexion, "SELECT *, p.nombre as personaNombre, p.id as idPersona FROM persona as p
											  JOIN usuario as u
											  on p.id = u.id_persona
											  WHERE p.id = ".$id." ")) or die("Error buscando Usuarios: ".mysqli_error($conexion));
		
		return $consulta;
	}

	function editUser($conexion, $id){

		mysqli_query($conexion, "UPDATE persona 
				      SET nombre ='".$this->nombre."', apellido='".$this->apellido."', cedula='".$this->cedula."',
				      email='".$this->email."' WHERE id=".$id." ") or die("Error editando Persona: ".mysqli_error($conexion));

		mysqli_query($conexion, "UPDATE usuario 
				      SET tipo='".$this->tipo."' WHERE id_persona=".$id." ") or die("Error editando Usuario: ".mysqli_error($conexion));
	}

	function deactivate($conexion, $id){
		
		mysqli_query($conexion, "UPDATE usuario SET activo = '0' WHERE id=".$id."") or die("Error Desactivando Usuario: ".mysqli_error($conexion));
	}

	function active($conexion, $id){
		
		mysqli_query($conexion, "UPDATE usuario SET activo = '1' WHERE id=".$id."") or die("Error Activando Usuario: ".mysqli_error($conexion));
	}
}

?>