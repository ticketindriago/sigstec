<?php

class Ticket{

	private $idUsuario;
	private $tipoSolicitud;
	private $prioridad;
	private $titulo;
	private $observacion;
	private $archivo;
	private $status;
	private $fechaCreacion;
	private $fechaRevicion;
	private $fechaCierre;
	private $respuesta;
	private $fechaRespuesta;
	private $hora;

	function setIdUsuario($idUsuario){

		$this->idUsuario = $idUsuario;
	}

	function setTipoSolicitud($TipoSolicitud){

		$this->tipoSolicitud = $TipoSolicitud;
	}

	function setPrioridad($Prioridad){

		$this->prioridad = $Prioridad;
	}

	function setTitulo($Titulo){

		$this->titulo = $Titulo;
	}

	function setObservacion($Observacion){

		$this->observacion = $Observacion;
	}

	function setArchivo($Archivo, $conexion){

		$this->archivo = $Archivo;

		$consulta = mysqli_query($conexion,"UPDATE ticket SET archivo='".$this->archivo."' WHERE id=".mysqli_insert_id($conexion)." ");
	}

	function setStatus($Status){

		$this->status = $Status;
	}

	function setFechaCreacion(){

		$this->fechaCreacion = date("Y-m-d");
	}

	function setFechaRespuesta(){

		$this->fechaRespuesta 	= date("Y-m-d");
		$this->hora 			= date("H:i:s");
	}

	function setFechaRevicion($FechaRevicion){

		$this->FechaRevicion = $FechaRevicion;
	}

	function setFechaCierre($FechaCierre){

		$this->FechaCierre = $FechaCierre;
	}

	function setRespuesta($respuesta){

		$this->respuesta = $respuesta;
	}

	function getId($conexion){

		return mysqli_insert_id($conexion);
	}

	function addTicket($conexion){

		mysqli_query($conexion, "INSERT INTO ticket (id_usuario, tipo_solicitud, prioridad, titulo, observacion, status, fecha_creacion)
								 VALUES ('".$this->idUsuario."', '".$this->tipoSolicitud."', '".$this->prioridad."', '".$this->titulo."',
								 		 '".$this->observacion."', '".$this->status."', '".$this->fechaCreacion."')")
								 or die("Error insertando nuevo Ticket: ".mysqli_error($conexion));
	}

	function listTicketUnrevised($conexion){

		$consulta = mysqli_query($conexion, "SELECT * FROM ticket WHERE status = '1' OR status = '2' OR status = '4' ") or die("Error listanto Ticket: ".mysqli_error($conexion));

		return $consulta;
	}

	function listTicketUnrevisedSupervisor($conexion, $id){

		$consulta = mysqli_query($conexion, "SELECT * FROM ticket as t
											 JOIN usuario AS u
											 ON t.id_usuario = u.id
											 WHERE t.status = '1' OR t.status = '2' OR t.status = '4' AND u.id_departamento = ".$id." ") 
											 or die("Error listando Ticket: ".mysqli_error($conexion));

		return $consulta;
	}

	function listTicketUnrevisedEmpleado($conexion, $id){

		$consulta = mysqli_query($conexion, "SELECT * FROM ticket WHERE status = '1' OR status = '2' OR status = '4' AND id_usuario = ".$id." ") 
											 or die("Error listando Ticket: ".mysqli_error($conexion));

		return $consulta;
	}

	function listTicketClose($conexion){

		$consulta = mysqli_query($conexion, "SELECT * FROM ticket WHERE status = '3' ") or die("Error insertando nuevo Ticket: ".mysqli_error($conexion));

		return $consulta;
	}

	function listTicketCloseSupervisor($conexion, $id){

		$consulta = mysqli_query($conexion, "SELECT * FROM ticket as t
											 JOIN usuario AS u
											 ON t.id_usuario = u.id
											 WHERE t.status = '3' AND u.id_departamento = ".$id." ") 
											 or die("Error listando Ticket: ".mysqli_error($conexion));

		return $consulta;
	}

	function listTicketCloseEmpleado($conexion, $id){

		$consulta = mysqli_query($conexion, "SELECT * FROM ticket WHERE status = '3' AND id_usuario = ".$id." ") 
											 or die("Error listando Ticket: ".mysqli_error($conexion));

		return $consulta;
	}

	function searchTicket($conexion, $id){

		$consulta = mysqli_query($conexion, "SELECT * FROM ticket WHERE id = ".$id." ") or die("Error buscando Ticket: ".mysqli_error($conexion));

		return $consulta;
	}

	function changueStatus($conexion, $id){

		mysqli_query($conexion, "UPDATE ticket SET status = '".$this->status."' WHERE id = ".$id." ") or die ("Error actualizando status: ".mysqli_error($conexion));
	}

	function addResponse($conexion, $id_ticket){

		mysqli_query($conexion, "INSERT INTO respuestas (id_ticket, id_usuario, respuesta, fecha, hora) 
								 VALUES (".$id_ticket.", ".$this->idUsuario.", '".$this->respuesta."', '".$this->fechaRespuesta."', '".$this->hora."')") 
								 or die("Error Insertando Respuesta: ".mysqli_error($conexion));
	}

	function listResponse($conexion, $id){

		$consulta = mysqli_query($conexion, "SELECT * FROM respuestas WHERE id_ticket = ".$id." ") or die("Error Listando Respuestas: ".mysqli_error($conexion));

		return $consulta;
	}
}

?>