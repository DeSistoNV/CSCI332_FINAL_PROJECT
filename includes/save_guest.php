<?php
include 'sql_connect.php';
$sql = "INSERT INTO Visitor (FirstName,LastName,Age,HomeTown,HomeState) VALUES ('" . $_REQUEST["FirstName"] . "','";
$sql .= $_REQUEST["LastName"]."',".$_REQUEST["Age"] . ",'" . $_REQUEST["HomeTown"] . "','" . $_REQUEST["HomeState"]."')";
$mysqli->query($sql);
?>


<script>window.location = '../guests.php';</script>
