
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec,d.Sex,year(CURRENT_TIMESTAMP) - year(d.Birth_date),f.value FROM `patient`p,`flowsheet_content`f JOIN `demographic` d ON f.p_id = d.p_id WHERE p.p_id = d.p_id AND level3 LIKE \"HbA1C\"AND flag = \"Yes\"";

	$result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"sex"=>$row[1],"age"=>$row[2],"value"=>$row[3],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
