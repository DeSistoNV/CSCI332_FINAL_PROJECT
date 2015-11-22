<!doctype html>
<html lang=''>
<?php include "includes/head.php"; ?>
<body>
<?php include "includes/navbar.php"; ?>
<?php include "includes/diagram_action.php";?>

<script> document.getElementById("attractions").className += "active"; </script>

<?php
include 'includes/sql_connect.php';
echo '<div class="datagrid">';
echo "<table class='sortable'>";
echo "<thead><tr><th>Name</th><th>YearOpened</th><th>Opens</th><th>Closes</th><th>Park</th></tr></thead>";
$sql_query1 = "SELECT * FROM Attraction";
if ($result = $mysqli->query($sql_query1)) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["Name"];
         echo "</td><td>";
         echo $row["YearOpened"];
         echo "</td><td>";
         echo $row["Opens"];
         echo "</td><td>";
         echo $row["Closes"];
         echo "</td><td>";
         $sql_query2 = "SELECT * FROM Park WHERE ID =". $row["ParkID"];
         echo $mysqli->query($sql_query2)->fetch_array(MYSQLI_ASSOC)['Name'];
         echo "</td></tr>";
    }
echo "</table></div>";    

}
?>

<div>

<section id="contact">
	<article>

		
			<label for="checkcontact" class="contactbutton"><div></div><h1>ADD ATTRACTION</h1></label><input id="checkcontact" type="checkbox">
	
			<form action="includes/save_attraction.php" method="post" class="contactform">
				<p class="input_wrapper"><input type="text" name="Name" value="<?php echo $number ?>"  id ="contact_nom"><label for="contact_nom">Name</label></p>
				<p class="input_wrapper"><input type="number" name="yo" onKeyDown="limitText(this,4);" onKeyUp="limitText(this,4);" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Year Opened</label></p>
				<p class="input_wrapper"><input type="time" name="Opens" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Opens</label></p>
				<p class="input_wrapper"><input type="time" name="Closes" value="<?php echo $number ?>"  id ="contact_sujet"><label for="contact_sujet">Closes</label></p>
				<p class="input_wrapper"><select name="ParkID">
					<?php include "includes/pick_park.php" ?>
				</select><label id='picker' for="contact_email">Park</label></p>
				<p class="submit_wrapper"><input type="submit" value="save"></p>			
			</form>
	</article>
</section>


</div>
<script>

query1 = <?php echo json_encode($sql_query1);?>;
query2 = <?php echo json_encode($sql_query2);?>;



window.onload = function() {
simplePopup({
  'pop-title':  ' ', 
  'pop-body': query1 + "<br><br>" + query2, 
  'btn-text': 'Done',
});
};
</script>

</body>
</html>