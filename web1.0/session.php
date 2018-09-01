<?php

session_start();
require_once 'connect_db.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error); 

  $pid=$_POST['id']; 
  $_SESSION['pid']=$pid;
 

 if(isset($pid))
   {
   echo "<script>location='index_admin.php';</script>"; 
   }


 // $result->close();
  $conn->close();
  
?>
