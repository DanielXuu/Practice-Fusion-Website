
<?php
  //$uid = $_POST['u_id'];
  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error)
	   die($conn->connect_error);

	$query = "SELECT v.V_date,v.V_name,v.V_value,v.V_bpValue,v.V_unit FROM `vitals` v Join `patient`p  on v.Patient_P_id = p.P_id where p.id_sec = 'K049M4FI'";
	$result = $conn->query($query);

	if (!$result)
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		$data[] = array("date"=>$row[0],"vname"=>$row[1],"value"=>$row[2],"valuebp"=>$row[3],"unit"=>$row[4],);
		//print($data);

	}
	$list  = json_encode(array('list'=>$data));

	//output the query result
	header('Content-type:text/json');
	echo $list;
//header('Refresh:3,Url=vitals_p.html');
 $result->close();


?>
