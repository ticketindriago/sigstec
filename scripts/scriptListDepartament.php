<?php
      $cede = $_POST['b'];
       
      if(!empty($cede)) {
            comprobar($cede);
      }
       
      function comprobar($b) {
            $con = mysql_connect('localhost','root', '3088522');
            mysql_select_db('sistema_ticket_indriago', $con);
       
            $sql = mysql_query("SELECT * FROM departamento WHERE id_cede = '".$b."' ");

            echo "<table>

                        <tr>

                              <td>Nombre</td>
                              <td></td>
                              <td></td>
                              <td></td>

                        </tr>";
             
            while($resultado = mysql_fetch_array($sql)){

                  echo "<tr>

                              <td>".$resultado['nombre']."</td>
                              <td><a href=\"listUserForDepartament.php?active=4&id_departamento=".$resultado['id']."\">Ver Empleados</a></td>
                              <td><a href=\"editDepartament.php?active=4&id=".$resultado['id']."\">Editar</a></td>

                        </tr>";
            }

            echo "</table>";
      }
?>