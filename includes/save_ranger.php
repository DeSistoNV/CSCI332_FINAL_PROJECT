<?php
include 'sql_connect.php';
$sql = "INSERT INTO ParkRanger (FirstName,LastName,Salary,Age,ParkID) VALUES ('" . $_REQUEST["FirstName"] . "','" ;
$sql .= $_REQUEST["LastName"]  . "'," . $_REQUEST["Salary"] . "," . $_REQUEST["Age"].','.$_REQUEST["ParkID"].")";
$mysqli->query($sql);

?>

<script> window.location = '../park_rangers.php' </script>
