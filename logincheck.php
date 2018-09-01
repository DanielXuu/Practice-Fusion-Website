
<?php

session_start();

require_once 'connect_db.php';
$name=$_POST['username'];
$password=$_POST['password'];
  $_SESSION['name']=$name;
  $_SESSION['password']=$password;
if($_SESSION['name']=="" or $password ==""){
	echo"please enter username or password!<br>";
	echo"<script type='text/javascript'>alert('Please enter username or password!');location='login.html'</script>";
	}

else{
	
	$link= new mysqli($hn, $un, $pw, $db);
	if (mysqli_connect_errno()) 
		die(mysqli_connect_error());

	else{
		$sql="select *from user where username='$name'and password='$password'";
		
		$result = mysqli_query($link, "select * from user where username='$name'and password='$password'");
		$rows = mysqli_num_rows($result);
		
		if($rows != null)
		
			echo"<script type='text/javascript'>alert('Welcome to the Practice Fusion!');location='index.html'</script>";		
		else	
			echo"<script type='text/javascript'>alert('Your password or username might be wrong!');location='login.html'</script>";
		
}
			
}

?>
