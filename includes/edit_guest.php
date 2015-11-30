
<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>

<?php include 'navbar.php'; ?>

<?php
include 'sql_connect.php';

$sql = "UPDATE Visitor SET FirstName = '" . $_REQUEST["FirstName"] . "',LastName = '" . $_REQUEST["LastName"];
$sql .= "',HomeTown ='" . $_REQUEST["HomeTown"] . "',Age = ".$_REQUEST["Age"] .",HomeState = '". $_REQUEST["HomeState"] ."' " ." WHERE ID = " . $_REQUEST["ID"];



if (!$mysqli->query($sql)) {
    $sql = "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
?>


<script>

query = <?php echo json_encode($sql);?>;


window.onload = function() {
simplePopup({
  'pop-title':  ' ',
  'pop-body': query,
  'btn-text': 'Done',
  'click-fn': function() {window.location.href = '../guests.php'; }
});
};
</script>

</body>
</html>
