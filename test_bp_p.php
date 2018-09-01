
<?php

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT p.id_sec,d.Sex,d.Age,v.V_value,v.V_bpvalue FROM `patient`p, `vitals`v JOIN `demographic`d ON d.P_id = v.P_id  WHERE V_name LIKE \"%BP%\" AND V_flag LIKE \"%Yes%\" AND p.P_id = d.P_id";

	$result = $conn->query($query);
  if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("id"=>$row[0],"sex"=>$row[1],"age"=>$row[2],"bp_h"=>$row[3],"bp_l"=>$row[4],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));


	//output the query result
	header('Content-type:text/json');
	echo $list;

 $result->close();

?>
