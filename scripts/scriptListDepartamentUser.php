<?php
      $cede = $_POST['b'];
       
      if(!empty($cede)) {
            comprobar($cede);
      }
       
      function comprobar($b) {
            $con = mysql_connect('localhost','root', '3088522');
            mysql_select_db('sistema_ticket_indriago', $con);
       
            $sql = mysql_query("SELECT * FROM departamento WHERE id_cede = '".$b."' ") or die("Error listanto: ".mysql_error($con));

            if(mysql_num_rows($sql)){
             
                  while($resultado = mysql_fetch_array($sql)){

                        echo "".$resultado['nombre']."<input type=\"radio\" name=\"departamento\" id=\"departamento\" value=\"".$resultado['id']."\" required>";
                  }
            }
            else
                  echo "No hay departamentos registrados en la cede.";
      }
