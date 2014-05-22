<?php

	$active = array();

	for($i=0; $i<5; $i++){

		if($_GET['active']==$i){

			$active[$i] = 'active';
			break;
		}
	}

?>

<div id='cssmenu'>

	<ul>
	   <li class=<?=$active[0]?>><a href='addTicket.php?active=0'><span>Nueva Solicitud</span></a></li>
	   <li class=<?=$active[1]?>><a href='listTicketUnrevised.php?active=1'><span>Solicitudes Pendientes</span></a></li>
	   <li class=<?=$active[2]?>><a href='index.php?active=2'><span>Solicitudes Cerradas</span></a></li>
	   <li class=<?=$active[3]?>><a href='listUser.php?active=3'><span>Usuarios</span></a></li>
	   <li class=<?=$active[4]?>><a href='listDepartament.php?active=4'><span>Departamentos</span></a></li>
	</ul>

</div>