
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec, mn.medication,m.Estimate, m.Alert,m.Recorded_date,m.Recorded_by,m.sig,m.Associated_diag,m.Start_date,m.Stop_date,m.Medication_comment FROM patient p, medication m , medname mn WHERE p.P_id = m.P_id AND m.Medname_id = mn.medcode limit 345";
	$result = $conn->query($query);

	if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"med"=>$row[1],"est"=>$row[2],"alert"=>$row[3],"recorddate"=>$row[4],"recordby"=>$row[5],"sig"=>$row[6],"diag"=>$row[7],"start"=>$row[8],"stop"=>$row[9],"com"=>$row[10],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
