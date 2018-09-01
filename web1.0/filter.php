<?php session_start()?>

<!doctype html>
<html>
<head>
<title>Practice Fusion in Pittsburgh</title>
<link rel="stylesheet" type="text/css" href="ul1.css">
</head>
<body>

<div id="container">
<div id="header">
<h1>Practice Fusion</h1>
</div> <!-- end header -->
<div id="menu">
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="home.php">Patient Info</a></li>
<li><a href="#">Encounter</a></li>
<li><a href=".php">Lab</a></li>
<li><a href="#">Analysis</a></li>
</ul>
</div> <!-- end menu -->
<div id="mainContainer">
<div id="content">
<p>
<table>
   <tr><form action="test.php" id ="" method="post">
		
		<td><input type="submit",name="sort_id", value="ID", onclick=id() ></td>
		<td><input type="submit",name="sort_l", value="Last Name"></td>
		<td><input type="submit",name="sort_m", value="Middle Name"></td>
		<td><input type="submit",name="sort_f", value="First Name"></td>
		<td><select name="sex">
				<option value="sex">Sex</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				
			</select>
		</td>
		<td><input type="submit",name="filter_Age", value="Age"></td>
		<td><input type="submit",name="sort_date", value="Birth Date"></td>
		<td><select>
			<option value="default">City</option>
			<option value="1">Pittsburgh</option>
			<option value="2">NewYork</option>
		</td>
		<td><select>
			<option value="default">State</option>
			<option value="AL">AL</option>
			<option value="AK">AK</option>
			<option value="AR">AR</option>	
			<option value="AZ">AZ</option>
			<option value="CA">CA</option>
			<option value="CO">CO</option>
			<option value="CT">CT</option>
			<option value="DC">DC</option>
			<option value="DE">DE</option>
			<option value="FL">FL</option>
			<option value="GA">GA</option>
			<option value="HI">HI</option>
			<option value="IA">IA</option>	
			<option value="ID">ID</option>
			<option value="IL">IL</option>
			<option value="IN">IN</option>
			<option value="KS">KS</option>
			<option value="KY">KY</option>
			<option value="LA">LA</option>
			<option value="MA">MA</option>
			<option value="MD">MD</option>
			<option value="ME">ME</option>
			<option value="MI">MI</option>
			<option value="MN">MN</option>
			<option value="MO">MO</option>	
			<option value="MS">MS</option>
			<option value="MT">MT</option>
			<option value="NC">NC</option>	
			<option value="NE">NE</option>
			<option value="NH">NH</option>
			<option value="NJ">NJ</option>
			<option value="NM">NM</option>			
			<option value="NV">NV</option>
			<option value="NY">NY</option>
			<option value="ND">ND</option>
			<option value="OH">OH</option>
			<option value="OK">OK</option>
			<option value="OR">OR</option>
			<option value="PA">PA</option>
			<option value="RI">RI</option>
			<option value="SC">SC</option>
			<option value="SD">SD</option>
			<option value="TN">TN</option>
			<option value="TX">TX</option>
			<option value="UT">UT</option>
			<option value="VT">VT</option>
			<option value="VA">VA</option>
			<option value="WA">WA</option>
			<option value="WI">WI</option>	
			<option value="WV">WV</option>
			<option value="WY">WY</option>
		</select>		
			</td>
		<td><input type="submit",name="" value="SSN"></td>
		<td><input type="submit",name="" value="PRN"></td>
		<td><input type="submit",name="sort_rdate" value="Recent VisitDate"></td>
		<td><input type="submit",name="" value="Perfer Method"></td>
		<td><input type="submit",name="" value="Race"></td>
		<td><input type="submit",name="" value=""></td>
		<td><input type="submit",name="" value="Prefer Language"></td>
		<td><input type="submit",name="" value=""></td>
		<td></td>
		</form>
   </tr>

<?php

//echo "Welcome to Practice Fusion " . $_SESSION['name'];


  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  $query  = "SELECT p.p_id,p.p_lastname,p.p_middlename,p.p_firstname,d.sex,d.age,d.birth_date,d.city,d.state,p.SSN,p.PRN,d.rec_visit_date,d.preferred_communication_method,d.race,d.ethnicity,d.pre_language FROM patient p LEFT JOIN demographic d on p.p_id = d.p_id order by p.p_lastname ";
  
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
   

   for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);


 echo <<<_END
  <pre>
   
   <tr>
		<td>$row[0]</td>
		<td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[5]</td>
		<td>$row[6]</td>
		<td>$row[7]</td>
		<td>$row[8]</td>
		<td>$row[9]</td>
		<td>$row[10]</td>
		<td>$row[11]</td>
		<td>$row[12]</td>
		<td>$row[13]</td>
		<td>$row[14]</td>
		<td>$row[15]</td>
		
		<td><a href= "**">Detail</a></td>
   </tr>
  
       	
  </pre>
  
_END;
}
  $result->close();
  $conn->close();


	
?></p>
 
 </table>


</div> <!-- end content -->

</div> <!-- end sidebar -->
<div id="footer">
<p></p>
</div> <!-- end footer -->
</div> <!-- end mainContainer -->
</div> <!-- end container -->

</body>
</html>
