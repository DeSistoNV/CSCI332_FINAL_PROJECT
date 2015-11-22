
<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>

<?php include 'navbar.php'; ?>

<?php
include 'sql_connect.php';
$sql = "INSERT INTO Visitor (FirstName,LastName,Age,HomeTown,HomeState) VALUES ('" . $_REQUEST["FirstName"] . "','";
$sql .= $_REQUEST["LastName"]."',".$_REQUEST["Age"] . ",'" . $_REQUEST["HomeTown"] . "','" . $_REQUEST["HomeState"]."')";
$mysqli->query($sql);
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