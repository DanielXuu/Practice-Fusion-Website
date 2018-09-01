
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.P_id,d.Birth_date,d.Sex,d.Phone_m,d.Phone_h,d.email FROM patient p, demographic d WHERE p.P_id = d.P_id";
	$result = $conn->query($query);

	if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"dob"=>$row[1],"sex"=>$row[2],"phonem"=>$row[3],"phoneh"=>$row[4],"email"=>$row[5],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
