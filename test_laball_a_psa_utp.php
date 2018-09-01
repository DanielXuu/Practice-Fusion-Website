
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec,year(CURRENT_TIMESTAMP) - year(d.Birth_date) FROM `patient`p JOIN `demographic` d ON d.p_id = p.P_id
            WHERE d.Age > 40 and d.Sex = \"M\" AND d.p_id NOT IN (SELECT d.P_id FROM `demographic` d JOIN `flowsheet_content` f ON f.p_id = d.p_id WHERE f.level3 = \"PSA\" and d.Age > 40 and d.Sex = \"M\")";

  $result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"age"=>$row[1],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
