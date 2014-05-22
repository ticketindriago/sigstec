<?php
      $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
            $con = mysql_connect('localhost','root', '3088522');
            mysql_select_db('sistema_ticket_indriago', $con);
       
            $sql = mysql_query("SELECT * FROM persona WHERE cedula = '".$b."'");
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "<img src=\"img/valid.png\">";
            }else{
                  echo "<img src=\"img/mal.png\">";
            }
      }     
?>