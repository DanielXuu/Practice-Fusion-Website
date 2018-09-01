<html>
<head>
</head>
<body>
<h1>Welcome to the medical data collection system</h1>
<h2>This is a short summary page of patients </h2>
<form method="post" action="preresult.php">
        <label for="name">Patient FirstName:</label>
		<input type="search" name="firstname"/>
        <label for="prn">Patient PRN:</label>
		<input type="search" name="prn"/>
		<input type="submit" name="sub" value="Submit">
</form>

<html>
<head>
</head>
<table>
<tr><th>Demographic</th>
<td><form method = "post" action = "index2.php">

<tr>
		<td>ID</td>
		<td>Last Name</td>
		<td>Middle Name</td>
		<td>First Name</td>
		<td>Sex</td>
		<td>Birth Date</td>
		<td>Age</td>
		<td>City</td>
		<td>Recent Visit date</td>
   </tr>

<?php
  session_start();
  $name=$_POST['firstname']; 
  $prn=$_POST['prn'];
  //$birth=$_POST['birthdate'];
  
   if($name==""||$prn=="")
   {
   echo "<script>alert('You need enter patient's name or prn');location='home.php';</script>"; 
   }
   
   if($name){
		$query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.P_id where p_firstname LIKE '%$_POST[firstname]%'";
   }
   if($prn){
		$query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.p_id where where p.prn='$prn'";
   }
   if($name && $prn){
	   $query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.p_id where where p.prn='$prn' and p_firstname LIKE '%$_POST[firstname]%'";
   }
   
  
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  //$query  = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.p_id";
  
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
 

  for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	//$_SESSION['pid']=$row[0];

  echo <<<_END
	  <pre> 
		   <tr>
				<td><input type="radio" name="id" value="$row[0]">$row[0]<br></td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[8]</td>
				<td>$row[9]</td>
				<td>$row[10]</td>
				<td>$row[13]</td>
				<td>$row[16]</td>
				<td><input type="submit" name="" value = "Detail"/></form></</td>
		   </tr>
	  </pre>
  
_END;
}

  $result->close();
?>
</body>
</html>