<!doctype html>
<html lang=''>
<?php include "includes/head.php"; ?>

<body>

<?php include "includes/navbar.php"; ?>

<script> document.getElementById("rangers").className += "active"; </script>

<?php
include 'includes/sql_connect.php';
echo '<div class="datagrid">';
echo "<table class='sortable'>";
echo "<thead><tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Salary</th><th>Park</th></tr></thead>";
if ($result = $mysqli->query("SELECT * from ParkRanger")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["FirstName"];
         echo "</td><td>";
         echo $row["LastName"];
         echo "</td><td>";
         echo $row["Age"];
         echo "</td><td>";

         setlocale(LC_MONETARY, 'en_US');
         echo money_format('%(#1n', $row["Salary"]);

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

			<label for="checkcontact" class="contactbutton"><div></div><h1>ADD Ranger</h1></label><input id="checkcontact" type="checkbox">
	
			<form action="includes/save_ranger.php" method="post" class="contactform">
				<p class="input_wrapper"><input type="text" name="FirstName" onkeypress="return onlyAlphabets(event,this);" value="<?php echo $number ?>"  id ="contact_nom"><label for="contact_nom">First Name</label></p>
				<p class="input_wrapper"><input type="text" name="LastName"  onkeypress="return onlyAlphabets(event,this);" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Last Name</label></p>
				<p class="input_wrapper"><input type="number" name="Age" onKeyDown="limitText(this,3);" onKeyUp="limitText(this,3);" max=150 value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Age</label></p>
				<p class="input_wrapper"><input type="number" name="Salary" value="<?php echo $number ?>"  onKeyDown="limitText(this,9);" onKeyUp="limitText(this,9);" id ="contact_sujet"><label for="contact_sujet">Salary</label></p>
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