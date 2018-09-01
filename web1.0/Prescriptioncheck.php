
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
    <p><lable for="type">Despense:</lable>
        <input type="text" name="despense" value="<?php echo $despense?>"/><br></p>
    <p><lable for="refills">Refills:</lable>
        <select name="refills" value="<?php echo $refills?>">

            <option value=0>0</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
            <option value=6>6</option>
            <option value=7>7</option>
            <option value=8>8</option>
            <option value=9>9</option>
            <option value=10>10</option>
        </select><br></p>

    <p><lable for="days_supply">Days of Supply:</lable>
        <input type="number" name="days_supply" value= "<?php echo $days?>"/><br></p>
    <p><lable for="scriptdate">Date of Script:</lable>
        <input type="date" name="scriptdate" value="<?php echo $scriptdate?>"/><br></p>
    <p><lable for="pharmacy">Pharmacy:</lable>
        <input type="text" name="pharmacy" value="<?php echo $pharmacy?>"/><br></p>
    <p><lable for="pre_provider">Prescription Provider:</lable>
        <input type="text" name="pre_provider" value="<?php echo $provider?>"/><br></p>



   <p><input type="submit" name="submit" value="Correct and Save"/></p></form>


</div>
</body>
</html>