
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec,a.Type,a.Allergy_name,a.Severity,a.Reaction,a.Onset,a.Comment,a.Status FROM `allergies`a JOIN patient p ON p.P_id = a.Patient_P_id";;
	$result = $conn->query($query);

	if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"type"=>$row[1],"aname"=>$row[2],"sever"=>$row[3],"reaction"=>$row[4],"onset"=>$row[5],"comment"=>$row[6],"status"=>$row[7],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
