
<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>

<?php include 'navbar.php'; ?>

<?php
include 'sql_connect.php';

$sql = "UPDATE Attraction SET Name = '" . $_REQUEST["Name"] . "', YearOpened = " . $_REQUEST["yo"];
$sql .=", Opens = '" . $_REQUEST["Opens"] . "', Closes ='" . $_REQUEST["Closes"];
$sql .="' WHERE ID = ".$_REQUEST['ID'] . ";";
$mysqli->query($sql);
?>



<script>

query = <?php echo json_encode($sql);?>;


window.onload = function() {
simplePopup({
  'pop-title':  ' ',
  'pop-body': query,
  'btn-text': 'Done',
  'click-fn': function() {window.location.href = '../attractions.php'; }
});
};
</script>

</body>
</html>
