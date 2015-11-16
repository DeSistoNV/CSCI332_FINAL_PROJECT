<!doctype html>
<html lang=''>
<?php include "includes/head.php"; ?>
<body>

<?php include "includes/navbar.php"; ?>
<script> document.getElementById("parks").className += "active"; </script>

<?php
include 'includes/sql_connect.php';
echo '<div class="datagrid">';
echo "<table class='sortable'>";
echo "<thead><tr><th>Name</th><th>Address</th><th>Phone Number</th><th>Opens</th><th>Closes</th><th>Entry Fee</th></tr></thead>";
if ($result = $mysqli->query("SELECT * FROM Park p LEFT OUTER JOIN Phone ph on p.ID = ph.ParkID LEFT OUTER JOIN Address a on p.ID = a.ParkID")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["Name"];
         echo "</td><td>";

         echo $row["Street"];
         echo "<br>";
         echo $row["City"].', '.$row['State'].' '.$row['Zip'];

         echo "</td><td>";
         echo $row["Number"];
         echo "</td><td>";
         echo date('g:i A', strtotime($row["Opens"]));
         echo "</td><td>";
         echo date('g:i A', strtotime($row["Closes"]));
                  echo "</td><td>";
         setlocale(LC_MONETARY, 'en_US');
         echo money_format('%(#1n', $row["EntryFee"]);
         echo "</td></tr>";
    }
echo "</table></div>";    

}
?>

<div>


<section id="contact">
	<article>

		
			<label for="checkcontact" class="contactbutton"><div></div><h1>ADD Park</h1></label><input id="checkcontact" type="checkbox">
	
			<form action="includes/save_park.php" method="post" class="contactform">
				<p class="input_wrapper"><input type="text" name="Name" value="<?php echo $number ?>"  id ="contact_nom"><label for="contact_nom">Name</label></p>
            <p class="input_wrapper"><input type="text" name="Addr" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Street Address</label></p>
            <p class="input_wrapper"><input type="number" name="Zip" onKeyDown="limitText(this,5);" onKeyUp="limitText(this,5);" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Zip</label></p>

				<p class="input_wrapper"><input type="text" name="City" value="<?php echo $number ?>"  onkeypress="return onlyAlphabets(event,this);" id ="contact_email"><label for="contact_email">City</label></p>
				<p class="input_wrapper"><input type="text" name="State" style="text-transform:uppercase" value="<?php echo $number ?>" onKeyPress="return onlyAlphabets(event,this);" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" id ="contact_email"><label for="contact_email">State</label></p>
            <p class="input_wrapper"><input type="text" name="Phone" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Phone #</label></p>

				<p class="input_wrapper"><input type="time" name="Opens" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Opens</label></p>
				<p class="input_wrapper"><input type="time" name="Closes" value="<?php echo $number ?>"  id ="contact_sujet"><label for="contact_sujet">Closes</label></p>

            <p class="input_wrapper"><input type="number" min="0"   name="EntryFee" value="<?php echo $number ?>"  id ="contact_sujet"><label for="contact_sujet">EntryFee</label></p>

				<p class="submit_wrapper"><input type="submit" value="save"></p>			
			</form>
	</article>
</section>


</div>



</body>
</html>