<?php
 session_start();
require_once 'connect_db.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error); 

$smoke_n = $_POST['smoke_n'];

$effdate = $_POST['smoke_effdate_n'];

$pid = $_SESSION['pid'];

echo $pid;

 
 $sql_id= "select max(S_id) from smoking";
					
		$res_id= mysqli_query($conn,$sql_id);
								
		$rows = $res_id->num_rows;

   for ($j = 0 ; $j < $rows ; ++$j)
  {
    $res_id->data_seek($j);
    $row = $res_id->fetch_array(MYSQLI_NUM);
	$sid=$row[0]+1;			
					
}
 
 $query  = "INSERT INTO `smoking`(`S_id`, `P_id`, `s_status`, `Effective_Date`) VALUES ('$sid','$pid','$smoke_n','$effdate')";
 $result = mysqli_query($conn,$query);
 
 
  if(isset($result))
   {
   echo "<script>alert('Saved Successfully!');location='##.php';</script>"; 
   }
 


 // $result->close();
  //$conn->close();

?>