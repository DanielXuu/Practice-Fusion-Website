
<?php 

  header("Access-Control-Allow-Origin: * ");
   require_once 'connect_db.php';               ##Database Connection
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) 
	   die($conn->connect_error);
   
	$query = "SELECT temp.CBC_name,AVG(temp.CBC_Value) from (SELECT c.`CBC_name`, c.`CBC_Value` FROM `cbc` c WHERE c.P_id= 1) as temp GROUP BY temp.CBC_name";
	$result = $conn->query($query);
	 
	if (!$result) 
		die($conn->error);
	$rows = $result->num_rows;
	for ($j = 0 ; $j < $rows ; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);
		
		$data[] = array("name"=>$row[0],"value"=>$row[1]);
		//print($data);
		
	}
	$list  = json_encode(array('list'=>$data));

   
	//output the query result
	header('Content-type:text/json');
	echo $list;
	  
 $result->close();    
  
?>