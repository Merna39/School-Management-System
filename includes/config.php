<?php
 
  $db_conn = mysqli_connect('localhost', 'root','' ,'school-management-system_project');
  if (!$db_conn) {
     echo 'Connection Failed';

         exit;
     }
       
?>