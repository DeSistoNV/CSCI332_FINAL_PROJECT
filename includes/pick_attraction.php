<?php
include 'dbconnect.php';

$res1 = $mysqli->query("SELECT ID , Name FROM Attraction");
while($row = $res1->fetch_array(MYSQLI_ASSOC)){
echo '<option value="' . $row['ID'] . '">' . $row['Name'] . '</option>';
}

			
				   ?>