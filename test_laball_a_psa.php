
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT COUNT(*), (SELECT COUNT(*) FROM `demographic` d WHERE (year(CURRENT_TIMESTAMP) - year(d.Birth_date)) > 40 and d.Sex = \"M\") - COUNT(*)FROM `demographic` d JOIN `flowsheet_content` f ON f.p_id = d.p_id
            WHERE f.level3 = \"PSA\" and (year(CURRENT_TIMESTAMP) - year(d.Birth_date)) > 40 and d.Sex = \"M\"";

  $result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("lab_psa"=>$row[0],"count"=>$row[1],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
