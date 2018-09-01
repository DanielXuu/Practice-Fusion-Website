
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT  p.id_sec,m.Medication, pre.measure,pre.Dispense,pre.Refills, pre.Days_supply,pre.Script_date,pre.Pharmacy,pre.prescrib_provider FROM `prescription` pre, `patient` p, `medname`m WHERE pre.Patient_P_id = p.P_id AND pre.Med_id = m.medcode";
	$result = $conn->query($query);

	if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"med"=>$row[1],"measure"=>$row[2],"dispense"=>$row[3],"refills"=>$row[4],"supply"=>$row[5],"script"=>$row[6],"pharmacy"=>$row[7],"provider"=>$row[8],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
