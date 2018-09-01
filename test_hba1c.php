
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT COUNT(*),round(COUNT(*)*100/(SELECT COUNT(*) FROM `flowsheet_content` WHERE level3 LIKE \"HbA1c\"),2) FROM `flowsheet_content` WHERE level3 LIKE \"HbA1C\"AND flag = \"Yes\"";

	$result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("count"=>$row[0],"percent"=>$row[1],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
