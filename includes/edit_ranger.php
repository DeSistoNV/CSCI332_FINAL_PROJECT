<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>
<?php include 'navbar.php'; ?>

<?php
include 'sql_connect.php';
$sql = "UPDATE ParkRanger SET FirstName = '" . $_REQUEST["FirstName"] . "',LastName = '" . $_REQUEST["LastName"];
$sql .= "',Salary =" . $_REQUEST["Salary"] . ",Age = ".$_REQUEST["Age"] . " WHERE ID = " . $_REQUEST["ID"];

$mysqli->query($sql);

?>


<script>

query = <?php echo json_encode($sql);?>;


window.onload = function() {
simplePopup({
  'pop-title':  ' ',
  'pop-body': query,
  'btn-text': 'Done',
  'click-fn': function() {window.location.href = '../park_rangers.php'; }
});
};
</script>

</body>
</html>
