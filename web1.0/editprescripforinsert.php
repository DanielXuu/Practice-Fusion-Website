<?php
session_start();
require_once 'connect_db.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error); 

 $despense = $_POST['despense'];
 $refills = $_POST['refills'];
 $days = $_POST['days_supply'];
 $scriptdate = $_POST['scriptdate'];
 $pharmacy = $_POST['pharmacy'];
 $provider = $_POST['pre_provider'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prescription</title>
</head>
<body>
<form method="POST" action="Prescription.php">

    <p><lable for="type">Despense:</lable> <?php echo $despense?></p>
	<input type="hidden" name="despense" value="<?php echo $despense?>">
       
    <p><lable for="refills">Refills:</lable> <?php echo $refills?></p>
	<input type="hidden" name="refills" value="<?php echo $refills?>">
        
    <p><lable for="days_supply">Days of Supply:</lable><?php echo $days?></p>
	<input type="hidden" name="days_supply" value="<?php echo $days?>">
       
    <p><lable for="scriptdate">Date of Script:</lable><?php echo $scriptdate?></p>
	<input type="hidden" name="scriptdate" value="<?php echo $scriptdate?>">
       
    <p><lable for="pharmacy">Pharmacy:</lable><?php echo $pharmacy?></p>
	<input type="hidden" name="pharmacy" value="<?php echo $pharmacy?>">
       
    <p><lable for="pre_provider">Prescription Provider:</lable><?php echo $provider?></p>
	<input type="hidden" name="pre_provider" value="<?php echo $provider?>">
	<p><input type="submit" name="submit" value="Correct and Save"/></form>	

<form method="POST" action="Prescriptioncheck.php">
	
	<input type="hidden" name="despense" value="<?php echo $despense?>">
	<input type="hidden" name="refills" value="<?php echo $refills?>">
	<input type="hidden" name="days_supply" value="<?php echo $days?>">
	<input type="hidden" name="scriptdate" value="<?php echo $scriptdate?>">
	<input type="hidden" name="pharmacy" value="<?php echo $pharmacy?>">
    <input type="hidden" name="pre_provider" value="<?php echo $provider?>">
	<input type="submit" name="submit" value="Edit"/></form>


</div>
</body>
</html>