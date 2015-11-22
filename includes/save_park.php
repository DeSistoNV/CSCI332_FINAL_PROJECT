<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>
<?php include 'navbar.php'; ?>


<?php
include 'sql_connect.php';
$sql = "INSERT INTO Park (Name,Opens,Closes,EntryFee) VALUES ('" . $_REQUEST["Name"] . "','" ;
$sql .= $_REQUEST["Opens"]  . "','" . $_REQUEST["Closes"] . "'," . $_REQUEST["EntryFee"]. ");";
$mysqli->query($sql);
$park_id = $mysqli->insert_id;

$addr_add  = 'INSERT INTO Address (Street,City,State,Zip,ParkID) VALUES ("';
$addr_add .= $_REQUEST["Addr"].'","';
$addr_add .= $_REQUEST["City"].'","';
$addr_add .= $_REQUEST["State"].'","';
$addr_add .= $_REQUEST["Zip"].'",';
$addr_add .= $park_id.")";
$mysqli->query($addr_add);

$phone_add  = 'INSERT INTO Phone (Number,ParkID) VALUES("';
$phone_add .= $_REQUEST["Phone"].'",';
$phone_add .= $park_id.")";
$mysqli->query($phone_add);

?>

<script>

park_insert = <?php echo json_encode($sql);?>;
addr_insert = <?php echo json_encode($addr_add);?>;
phone_insert = <?php echo json_encode($phone_add);?>;


window.onload = function() {
simplePopup({
  'pop-title':  ' ', 
  'pop-body': park_insert + '<br><br>'  + addr_insert + '<br><br>' +  phone_insert, 
  'btn-text': 'Done',
  'click-fn': function() {window.location.href = '../default.php'; }
});
};
</script>

</body>
</html>