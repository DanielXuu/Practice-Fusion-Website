
<?php 

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) 
	   die($conn->connect_error);
   
	$query = "SELECT c.CBC_name,c.CBC_date,c.CBC_Value,c.CBC_unit,c.CBC_flag,c.CBC_flagtype FROM `cbc` c WHERE c.P_id = 1";
	$result = $conn->query($query);
	 
	if (!$result) 
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);
		
		$data[] = array("name"=>$row[0],"date"=>$row[1],"value"=>$row[2],"unit"=>$row[3],"flag"=>$row[4],"flagtype"=>$row[5]);
		//print($data);
		
	}
	$list  = json_encode(array('list'=>$data));

   
	//output the query result
	header('Content-type:text/json');
	echo $list;
	  
 $result->close();    
  
?>