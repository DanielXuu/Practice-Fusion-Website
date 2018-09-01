<?php

  header("Access-Control-Allow-Origin: * ");
  session_start();
  $name=$_POST['u_id'];
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec,f.level3,f.value FROM patient p JOIN flowsheet_content f on p.p_id = f.P_id WHERE p.id_sec = \"$name\"";
	$result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"testname"=>$row[1],"value"=>$row[2]);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
