<?php
// Start the session
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>

</style>
</head>
<body>
<div>
<form method="post"action="Allergy_insert.php">
    <table>

      <tr>
        <td><lable for="Aller_name"> Alleryies Name:</lable>
        <td><input type="text" name="Aller_name"><br></td>   
        </tr>
        
        <tr>
        <td><lable for="Aller_ty">Allergies Type:</lable>
        <td><select name="Aller_ty">
            <option value="Food">Food</option>
            <option value="Drug">Drug</option>
            <option value="Enviornment">Enviornment</option>
        </select><br></td>
        </tr>
        <tr>
            <td align="left"><lable for="severity">Severity:</lable></td>
        <td><select name="severity">
            <option value="Server">Server</option>
            <option value="Moderate">Moderate</option>
        </select><br></td>
        </tr>
        <tr>
            <td><lable for="onset">Onset:</lable></td>
            <td><input type="date" name='onset'/><br></td>
        </tr>
        <tr>
            <td><lable for="reaction">Reaction:</lable></td>
            <td><input type="text" name='reaction'/><br></td>
        </tr>
        <tr>
            <td><lable for="status">Status:</lable></td>
        <td><select name="stat">
            <option value="Active">Active</option>
            <option value="History">Historal</option>
        </select><br></td>
        </tr>
        <tr><td><lable for="comment">Comments:</lable>
        <td><input type="text" name='comment'/><br><td>
        </tr>
        <tr><td><input type="submit" name="submit" value="Save"/></td>
           
        </tr>

    </table>
</form>
</div>
</body>
</html>