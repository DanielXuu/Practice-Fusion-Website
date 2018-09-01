
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec,e.En_type,e.Note_type,e.En_date,e.Seen_by,e.Subjective,e.Objective,e.Assessment FROM `encounter`e LEFT JOIN patient p ON p.P_id = e.P_id limit 200";
	$result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"type"=>$row[1],"note"=>$row[2],"date"=>$row[3],"seen"=>$row[4],"subjective"=>$row[5],"objective"=>$row[6],"assessment"=>$row[7],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
