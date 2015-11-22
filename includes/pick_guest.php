<?php
include 'dbconnect.php';

$res1 = $mysqli->query("SELECT ID , FirstName,LastName FROM Visitor");
while($row = $res1->fetch_array(MYSQLI_ASSOC)){
echo '<option value="' . $row['ID'] . '">' . $row['FirstName'] .' '. $row['LastName'] .'</option>';
}

			
				   ?>