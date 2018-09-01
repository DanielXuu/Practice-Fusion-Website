 <?php
  session_start();
 
 
  if (isset($_POST['sortlastname'])) {
	   sort_lastname();
	   }
  if  (isset($_POST['sortmidname'])) {
	   sortmidname();
	   }
  if  (isset($_POST['sortfname'])) {
	   sortfname();
	   }
  
 

	function sort_lastname(){ 
		
		 require_once 'connect_db.php';               ##Database Connection
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.P_id ORDER BY p.`p_lastname`  DESC";
		  $result = $conn->query($query);
			if (!$result) die($conn->error);
			$rows = $result->num_rows;
 

		for ($j = 0 ; $j < $rows ; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			//$_SESSION['pid']=$row[0];

		echo <<<_END

				  <tr>
						<td height=30 width= 80><input type="radio" name="id" value="$row[0]"></td>
						<td height=30 width= 80>$row[1]</td>
						<td height=30 width= 80>$row[2]</td>
						<td height=30 width= 80>$row[3]</td>
						<td height=30 width= 80>$row[8]</td>
						<td height=30 width= 80>$row[9]</td>
						<td height=30 width= 80>$row[10]</td>
						<td height=30 width= 80>$row[13]</td>
						<td height=30 width= 80>$row[16]</td>
						<td height=30 width= 80><form method = "post" action = "session.php"><input type="submit" name="" value = "Detail"/></form></</td>
				   </tr>
			
_END;
}

 
  exit;

}

	function sortfname() {
		echo "The insert function is called.";
		exit;

	}
		
	function sortmidname(){
		echo "The sort function is called.";
		exit;
		
	}

	
	
  
 
?>