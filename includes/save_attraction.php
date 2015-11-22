
<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>

<?php include 'navbar.php'; ?>

<?php
include 'sql_connect.php';
$sql = "INSERT INTO Attraction (Name, YearOpened,Opens,Closes,ParkID) VALUES ('" . $_REQUEST["Name"] . "',";
$sql .= $_REQUEST["yo"] . ",'" . $_REQUEST["Opens"] . "','" . $_REQUEST["Closes"]  . "'," . $_REQUEST["ParkID"]. ")";
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

