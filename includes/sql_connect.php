<?php
$mysqli = new mysqli('127.0.0.1', 'nickd833_project', 'snow123', 'nickd833_project');

if ($mysqli->connect_errno) {
   
    echo "Errno: " . $mysqli->connect_errno . "</b>";
    echo "Error: " . $mysqli->connect_error . "</b>";
    
    exit;
}
?>