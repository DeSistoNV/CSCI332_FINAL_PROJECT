<!doctype html>
<html lang=''>
<?php include "includes/head.php"; ?>

<body>

<?php include "includes/navbar.php"; ?>
<script> document.getElementById("attractions").className += "active"; </script>


 <link rel="stylesheet" href="style/table_st.css">





<?php
include 'includes/sql_connect.php';
echo '<div class="datagrid">';
echo "<table class='sortable'>";
echo "<thead><tr><th>Name</th><th>YearOpened</th><th>Opens</th><th>Closes</th><th>Park</th></tr></thead>";
if ($result = $mysqli->query("SELECT * from Attraction")) {
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
         echo $mysqli->query("SELECT * from Park WHERE ID =". $row["ParkID"])->fetch_array(MYSQLI_ASSOC)['Name'];
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


</body>
</html>