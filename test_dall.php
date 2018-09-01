
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec, d.ICD_10_code, d.ICD_10_description, d.ICD_9_code,d.ICD_9_description,d.SNOMED_CT_code,d.SNOMED_CT_description, d.Start_date,d.Stop_date,d.Acuity,d.Medications FROM `diagnose`d JOIN `patient` p ON p.P_id = d.P_id ";
	$result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"tencode"=>$row[1],"tendes"=>$row[2],"ninecode"=>$row[3],"ninedes"=>$row[4],"ctcode"=>$row[5],"ctdes"=>$row[6],"start"=>$row[7],"stop"=>$row[8],"acuity"=>$row[9],"med"=>$row[10],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
