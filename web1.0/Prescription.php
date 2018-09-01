<?php

session_start();
require_once 'connect_db.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error); 

 $despense = $_POST['despense'];
 $refills = $_POST['refills'];
 $days = $_POST['days_supply'];
 $scriptdate = $_POST['scriptdate'];
 $pharmacy = $_POST['pharmacy'];
 $provider = $_POST['pre_provider'];
 
 
$pid =$_SESSION['pid'];

  $sql_id= "select max(Pre_id) from`Prescription`";
					
		$res_id= mysqli_query($conn,$sql_id);
								
		$rows = $res_id->num_rows;

   for ($j = 0 ; $j < $rows ; ++$j)
  {
    $res_id->data_seek($j);
    $row = $res_id->fetch_array(MYSQLI_NUM);
	$preid=$row[0]+1;			
  }			
 
 $query  = "INSERT INTO `prescription`(`Pre_id`, `P_id`, `Dispense`, `Refills`, `Days_supply`, `Script_date`, `Pharmacy`, `Pre_provider`) VALUES ($preid,$pid,'$despense',$refills,$days,'$scriptdate','$pharmacy','$provider')";
 $result = mysqli_query($conn,$query);

 if(isset($result))
   {
   echo "<script>alert('Saved Successfully!');location='index2.php';</script>"; 
   }
 else{ echo "<script>alert('Saved failed!');location='##.php';</script>"; }


 // $result->close();
  $conn->close();
  
?>

