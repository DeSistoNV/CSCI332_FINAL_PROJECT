<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>
<?php include 'navbar.php'; ?>
<?php
include 'sql_connect.php';

$sql = "Update Park SET Name = '" . $_REQUEST["Name"] . "', Opens = '" . $_REQUEST["Opens"];
$sql .= "', Closes = '" . $_REQUEST['Closes'] . "', EntryFee = " . $_REQUEST["EntryFee"];
$sql .= " WHERE ID = ".$_REQUEST['ID'] . ";";

$mysqli->query($sql);

$addr_add = "UPDATE Address SET Street = '" . $_REQUEST["Addr"] . "', City = '" . $_REQUEST["City"];
$addr_add .= "', State = '" . $_REQUEST['State'] . "', Zip = '" . $_REQUEST["Zip"] . "'";
$addr_add .= " WHERE ParkID = ".$_REQUEST['ID'] . ";";
$mysqli->query($addr_add);



$phone_add = "UPDATE Phone SET Number ='" . $_REQUEST["Phone"] . "' WHERE ParkID = " . $_REQUEST["ID"]. ';';
$mysqli->query($phone_add);


?>

<script>

park_insert = <?php echo json_encode($sql);?>;
addr_insert = <?php echo json_encode($addr_add);?>;
phone_insert = <?php echo json_encode($phone_add);?>;

trigger = "CREATE TRIGGER `upper_case_state_park` BEFORE INSERT ON `Address` <br><br>"
trigger += "FOR EACH ROW BEGIN <br><br>SET NEW.State = UCASE(New.State); <br><br>END"

window.onload = function() {
simplePopup({
  'pop-title':  ' ',
  'pop-body': '<b>' + park_insert + '<br><br>'  + addr_insert + '<br><br>' +  phone_insert + '</b><br><br><br><br>' + trigger,
  'btn-text': 'Done',
  'click-fn': function() {window.location.href = '../default.php'; }
});
};
</script>

</body>
</html>
