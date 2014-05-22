<?php

class baseDatos extends mysqli{
	
	function __construct(){
		
		parent::__construct("localhost", "root", "3088522", "sistema_ticket_indriago");
	}
}

?>
