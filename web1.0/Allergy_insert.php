<?php

session_start();
require_once 'connect_db.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error); 
$name = $_POST['Aller_name'];
$type = $_POST['Aller_ty'];
$severity = $_POST['severity'];
$onset = $_POST['onset'];
$reactions = $_POST['reaction'];
$status = $_POST['stat'];
$comment = $_POST['comment'];
$pid =$_SESSION['pid'];

  $sql_id= "select max(Aller_id) from`allergies`";
					
		$res_id= mysqli_query($conn,$sql_id);
								
		$rows = $res_id->num_rows;

   for ($j = 0 ; $j < $rows ; ++$j)
  {
    $res_id->data_seek($j);
    $row = $res_id->fetch_array(MYSQLI_NUM);
	$Aid=$row[0]+1;			
  }			
 
 $query  = "INSERT INTO `allergies`(`Aller_id`, `Aller_name`, `Aller_type`, `Severity`, `Onset`,`Reactions` ,`Status`, `Comments`, `P_id`) VALUES ('$Aid','$name','$type','$severity','$onset','$reactions','$status','$comment','$pid')";
 $result = mysqli_query($conn,$query);

 if(isset($result))
   {
   echo "<script>alert('Saved Successfully!');location='Allerinsert.php';</script>"; 
   }


 // $result->close();
  $conn->close();
  
?>