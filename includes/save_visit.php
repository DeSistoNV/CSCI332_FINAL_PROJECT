<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>
<?php include 'navbar.php'; ?>


<?php
include 'sql_connect.php';
$sql = "INSERT INTO Visits (Rating,VisitorID,AttractionID) VALUES (" . $_REQUEST["Rating"] . ",";
$sql .=  $_REQUEST["VisitorID"] ."," . $_REQUEST["AttractionID"].')';
$mysqli->query($sql);
?>




<script>

query = <?php echo json_encode($sql);?>;


window.onload = function() {
simplePopup({
  'pop-title':  ' ', 
  'pop-body': query, 
  'btn-text': 'Done',
  'click-fn': function() {window.location.href = '../visits.php'; }
});
};
</script>

</body>
</html>