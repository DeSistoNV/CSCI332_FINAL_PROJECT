<!doctype html>
<html lang=''>
<?php include 'save_head.php'; ?>

<body>
<?php include 'navbar.php'; ?>


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