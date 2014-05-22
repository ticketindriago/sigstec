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

	function setFechaRevicion($FechaRevicion){

		$this->FechaRevicion = $FechaRevicion;
	}

	function setFechaCierre($FechaCierre){

		$this->FechaCierre = $FechaCierre;
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

		$consulta = mysqli_query($conexion, "SELECT * FROM ticket WHERE status = '1' ") or die("Error insertando nuevo Ticket: ".mysqli_error($conexion));

		return $consulta;
	}
}

?>