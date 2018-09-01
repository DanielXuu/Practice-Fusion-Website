<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
<style>
	table#t01 th {
    color: black;
	border: 1
    background-color: lightblue;
}
</style>
</head>

<body>
<h1>Welcome to the medical data collection system</h1>
<h2>This is a short summary page of patient </h2>
<table>
<tr><th>Demographic</th>
<!---<td><form method = "post" action = "##"><input type="submit" name="" value = "Check more"/></form></td>--->
<!---<td><form method = "post" action = "demographic.html"><input type="submit" name="" value = "Edit"/></form></td></tr>--->
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
  //$pid=$_POST['id']; 
  //$_SESSION['pid']=$pid;
  $pid=$_SESSION['pid'];
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  //$query  = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.p_id where p_firstname LIKE '%$_POST[name]%'";
  $query  = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.p_id where p.p_id=$pid";
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
				
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[8]</td>
				<td>$row[9]</td>
				<td>$row[10]</td>
				<td>$row[13]</td>
				<td>$row[16]</td>	
		   </tr>
	  </pre>
  
_END;
}

  $result->close();
?>

</table>
<table>
<tr><th>Allergy</th>
	<!---<td><form method = "post" action = "##"><input type="submit" name="" value = "Edit"/></form></td>--->
   <td><form method = "post" action = "Allergy.php"><input type="submit" name="" value = "Add New"/></form></td>
 </tr>
  <tr>		
		<td>Allergy Name</td>
		<td>Allergy Type</td>
		<td>Severity</td>
		<td>Onset</td>
		<td>Reactions</td>
		<td>Status</td>
		<td>Comments</td>
					
   </tr>
<?php
  
  //$query2  = "SELECT * FROM patient p JOIN allergies a on p.p_id = a.P_id where p_firstname LIKE '%$_POST[name]%'";
  $query2  = "SELECT * FROM patient p JOIN allergies a on p.p_id = a.P_id where p.p_id=$pid";
  $result2 = $conn->query($query2);
  if (!$result2) die($conn->error);

  $rows2 = $result2->num_rows;
   

  for ($j = 0 ; $j < $rows2 ; ++$j){
    $result2->data_seek($j);
    $row2 = $result2->fetch_array(MYSQLI_NUM);

  echo <<<_END
	  <pre>
		   <tr>		
				<td>$row2[7]</td>
				<td>$row2[8]</td>
				<td>$row2[9]</td>
				<td>$row2[10]</td>
				<td>$row2[11]</td>
				<td>$row2[12]</td>
				<td>$row2[13]</td>			
		   </tr>   	
	  </pre>
  
_END;
}
  $result2->close();
 
?>
</table>

<table>
<tr><th>Social History</th>
   <<!---td><form method = "post" action = "##"><input type="submit" name="" value = "Edit"/></form></td>--->
   <td><form method = "post" action = "Socialhistory.html"><input type="submit" name="" value = "Add New"/></form></td>
   </tr>
   <tr>		
		<td>Education</td>
		<td>Occupation</td>
		<td>Disability</td>
		<td>Martial Status</td>
		<td>Spouse Info</td>
		<td>Sunstances</td>
		<td>Sextual Prefer</td>
		<td>Prison</td>
		<td>Travel</td>
		<td>Diet</td>
		<td>Excercise</td>
		<td>Firearms</td>					
   </tr>
<?php  
  //$query3  = "SELECT * FROM patient p JOIN Socialhistory s on p.p_id = s.P_id where p_firstname LIKE '%$_POST[name]%'";
	$query3  = "SELECT * FROM patient p JOIN Socialhistory s on p.p_id = s.P_id where p.p_id=$row[0]";
  $result3 = $conn->query($query3);
  if (!$result3) die($conn->error);

  $rows3 = $result3->num_rows;
  

  for ($j = 0 ; $j < $rows3 ; ++$j){
    $result3->data_seek($j);
    $row3 = $result3->fetch_array(MYSQLI_NUM);


  echo <<<_END
	  <pre>
		   <tr>				
				<td>$row3[8]</td>
				<td>$row3[9]</td>
				<td>$row3[10]</td>
				<td>$row3[11]</td>
				<td>$row3[12]</td>
				<td>$row3[13]</td>	
				<td>$row3[14]</td>
				<td>$row3[15]</td>
				<td>$row3[16]</td>
				<td>$row3[17]</td>
				<td>$row3[18]</td>
				<td>$row3[19]</td>		
		   </tr>
	  </pre> 
_END;
}
  $result3->close();
  //$conn->close();
	
?>
</table>
<table>
<tr><th>Smoking Info</th>
	   <!--<td><form method = "post" action = "##"><input type="submit" name="" value = "Edit"/></form></td>--->
	   <td><form method = "post" action = "Smoking.php"><input type="submit" name="" value = "Add New"/></form></td>
	</tr>
	<tr>		
		<td>Smoking Status</td>
		<td>Effective Date</td>				
	 </tr>
<?php
  
  //$query4  = "SELECT * FROM patient p JOIN smoking s on p.p_id = s.P_id where p_firstname LIKE '%$_POST[name]%'";
  $query4  = "SELECT * FROM patient p JOIN smoking s on p.p_id = s.P_id where p.p_id=$row[0]";
  $result4 = $conn->query($query4);
  if (!$result4) die($conn->error);
  $rows4 = $result4->num_rows;

  for ($j = 0 ; $j < $rows4 ; ++$j){
    $result4->data_seek($j);
    $row4 = $result4->fetch_array(MYSQLI_NUM);

  echo <<<_END
	  <pre>
		   <tr>		
				<td>$row4[8]</td>
				<td>$row4[9]</td>	
		   </tr> 
			
	  </pre>
  
_END;
}
  $result4->close();	
?>
<table>
<tr><th>Prescription</th>
	   <!---<td><form method = "post" action = "##"><input type="submit" name="" value = "Edit"/></form></td>-->
	   <td><form method = "post" action = "Prescription.html"><input type="submit" name="" value = "Add New"/></form></td>
	</tr>
	<tr>		
		<td>Despense</td>
		<td>Refills</td>
		<td>Days of Supply</td>
		<td>Script Date</td>
		<td>Pharmacy</td>
		<td>Prescription Provider</td>
	 </tr>
<?php
  
  //$query4  = "SELECT * FROM patient p JOIN smoking s on p.p_id = s.P_id where p_firstname LIKE '%$_POST[name]%'";
  $query5  = "SELECT * FROM patient p JOIN prescription pr on p.p_id = pr.P_id where p.p_id=$row[0]";
  $result5 = $conn->query($query5);
  if (!$result5) die($conn->error);
  $rows5 = $result5->num_rows;

  for ($j = 0 ; $j < $rows5 ; ++$j){
    $result5->data_seek($j);
    $row5 = $result5->fetch_array(MYSQLI_NUM);

  echo <<<_END
	  <pre>
		   <tr>		
				<td>$row5[8]</td>
				<td>$row5[9]</td>
				<td>$row5[10]</td>	
				<td>$row5[11]</td>	
				<td>$row5[12]</td>	
				<td>$row5[13]</td>	
		   </tr> 
			
	  </pre>
  
_END;
}
  $result5->close();
  $conn->close();	
?>
</table>

</html>
