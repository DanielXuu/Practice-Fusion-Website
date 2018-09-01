
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT temp.id_sec,f.level3 FROM (SELECT p.P_id,p.id_sec,year(CURRENT_TIMESTAMP) - year(d.Birth_date) as Age,d.Sex
            FROM `Patient` p, `demographic` d WHERE p.P_id = d.P_id AND 30<= Age <=64 AND d.Sex = 'F' ) as temp
            LEFT JOIN flowsheet_content f on temp.P_id = f.P_id WHERE level3 LIKE \"%HIV%\"";

	$result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"name"=>$row[1],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
