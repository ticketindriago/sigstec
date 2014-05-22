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
                              <td><a href=\"#\">Ver Empleados</a></td>
                              <td><a href=\"#\">Editar</a></td>
                              <td><a href=\"#\">Desactivar</a></td>

                        </tr>";
            }

            echo "</table>";
      }
?>