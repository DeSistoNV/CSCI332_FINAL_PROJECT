<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);

include 'sql_connect.php';

$sql="SELECT * FROM ParkJoin WHERE ID = ".$q. ";";
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
echo '<section id="contact">
	<article>



			<form action="includes/edit_park.php?ID=' . $row['ID'] . '" method="post" class="contactforms" id="contactpanel">
				<p class="input_wrapper"><input type="text" name="Name" value="' . $row['Name'].'" id ="contact_nom"><label for="contact_nom">Name</label></p>
            <p class="input_wrapper"><input type="text" name="Addr" value="' . $row['Street'].'"  id ="contact_email"><label for="contact_email">Street Address</label></p>
            <p class="input_wrapper"><input type="number" name="Zip" onKeyDown="limitText(this,5);" onKeyUp="limitText(this,5);" value="' . $row['Zip'].'"  id ="contact_email"><label for="contact_email">Zip</label></p>

				<p class="input_wrapper"><input type="text" name="City" value="' . $row['City'].'"  onkeypress="return onlyAlphabets(event,this);" id ="contact_email"><label for="contact_email">City</label></p>
				<p class="input_wrapper"><input type="text" name="State" value="' . $row['State'].'" onKeyPress="return onlyAlphabets(event,this);" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" id ="contact_email"><label for="contact_email">State</label></p>
            <p class="input_wrapper"><input type="text" name="Phone" value="' . $row['Number'].'"  id ="contact_email"><label for="contact_email">Phone #</label></p>

				<p class="input_wrapper"><input type="time" name="Opens" value="' . $row['Opens'].'"  id ="contact_email"><label for="contact_email">Opens</label></p>
				<p class="input_wrapper"><input type="time" name="Closes" value="' . $row['Closes'].'"  id ="contact_sujet"><label for="contact_sujet">Closes</label></p>

            <p class="input_wrapper"><input type="number"   name="EntryFee" value="' . $row['EntryFee'].'" id ="contact_sujet"><label for="contact_sujet">EntryFee</label></p>


				<p class="submit_wrapper"><input type="submit"  value="save"></p>
			</form>
	</article>
</section>';

?>
</body>
</html>
