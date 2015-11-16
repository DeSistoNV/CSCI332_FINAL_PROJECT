<?php
include 'sql_connect.php';
$sql = "INSERT INTO Attraction (Name, YearOpened,Opens,Closes,ParkID) VALUES ('" . $_REQUEST["Name"] . "',";
$sql .= $_REQUEST["yo"] . ",'" . $_REQUEST["Opens"] . "','" . $_REQUEST["Closes"]  . "'," . $_REQUEST["ParkID"]. ")";
$mysqli->query($sql);
?>


<script>
window.location = '../attractions.php';
</script>
