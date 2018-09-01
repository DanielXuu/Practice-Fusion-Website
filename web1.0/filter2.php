<?php

if($_POST['value'] == '1')) {
    // query to get all Doe records
    //$query = "SELECT * FROM names WHERE name='Doe'";
	echo "Hello"
}
elseif($_POST['value'] == '2') {
    // query to get all Earl records
    //$query = "SELECT * FROM names WHERE name='Earl'";
} else {
    // query to get all records
    //$query = "SELECT * FROM names";
}
$sql = mysql_query($query);
?>