
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec, q.labname, fc.level3, fc.value,fc.value_non_number,fc.unit,fc.flag, fc.date FROM `flowsheet_content` fc,`patient` p,`questlab` q WHERE fc.p_id = p.p_id and fc.level2 = q.idquestlab and q.idquestlab = 'f7' limit 745";
	$result = $conn->query($query);

	if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"labname"=>$row[1],"testname"=>$row[2],"non_v"=>$row[3],"value"=>$row[4],"unit"=>$row[5],"flag"=>$row[6],"date"=>$row[7],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));

	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
