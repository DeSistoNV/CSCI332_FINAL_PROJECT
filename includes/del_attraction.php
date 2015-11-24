<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>
<?php include 'navbar.php'; ?>


<?php
include 'sql_connect.php';
$sql = 'CALL Delete_Attraction('.$_REQUEST["ID"] . ');';
if (!$mysqli->query($sql)) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
?>




<script>

query = <?php echo json_encode($sql);?>;
procedure = 'CREATE PROCEDURE Delete_Attraction (IN delete_id INT) <br><br>BEGIN<br><br>DELETE FROM Visits WHERE AttractionID = delete_id;'
procedure+= '<br><br>DELETE FROM Attraction WHERE ID = delete_id; <br><br>END'

window.onload = function() {
simplePopup({
  'pop-title':  ' ', 
  'pop-body': '<b>' +query + '</b><br><br><br><br>' + procedure, 
  'btn-text': 'Done',
  'click-fn': function() {window.location.href = '../attractions.php'; }
});
};
</script>

</body>
</html>