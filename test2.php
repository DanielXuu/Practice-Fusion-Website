
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

  $age = $_POST['age'];

  $query = "SELECT p.P_id,p.id_sec,year(CURRENT_TIMESTAMP) - year(d.Birth_date),d.Sex,d.Birth_date, COUNT(p.id_sec) FROM patient p, demographic d, encounter e WHERE p.P_id = d.P_id AND e.P_id = p.P_id GROUP BY p.P_id";
	$result = $conn->query($query);

	if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"sec_id"=>$row[1],"age"=>$row[2],"sex"=>$row[3],"dob"=>$row[4],"encounter"=>$row[5],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
