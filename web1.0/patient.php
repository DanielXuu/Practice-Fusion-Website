	<?php

   
   
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);
        $query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.P_id ";
		
		  $result = $conn->query($query);
		 
			if (!$result) die($conn->error);
			$rows = $result->num_rows;
		#echo $result
		$array_1 = array();
		#$array 
		for ($j = 0 ; $j < $rows ; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			#$_SESSION['pid']=$row[0];
			
		$array_1[j] = $row
		
		$jsonObj_1 = json_encode($array_1)
		
		echo $row[0];
		echo $row[1];
		echo $row[2];
		echo $row[3];
		
}
file_put_contents('test.json', $jsonObj_1);
 $result->close();
  
  
?>
  