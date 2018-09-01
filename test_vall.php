
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

  $query = "SELECT p.id_sec,v.V_date,v.V_name,v.V_value,v.V_bpValue,v.V_unit,v.v_flagtype FROM `vitals` v Join `patient`p  on v.Patient_P_id = p.P_id limit 1104";
	$result = $conn->query($query);

	if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"date"=>$row[1],"vname"=>$row[2],"value"=>$row[3],"valuebp"=>$row[4],"unit"=>$row[5],"flagtype"=>$row[6],);
		//print($data);

	}
  $list  = json_encode(array('list'=>$data));

  //output the query result
  header('Content-type:text/json');
  echo $list;

 $result->close();

?>
