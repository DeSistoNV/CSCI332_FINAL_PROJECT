<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);

include 'sql_connect.php';

$sql="SELECT * FROM Attraction WHERE ID=".$q;
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
echo '<section id="contact">
	<article>



			<form action="includes/edit_attraction.php?ID=' . $row['ID'] . '" method="post" class="contactforms" id="contactpanel">
      <p class="input_wrapper"><input type="text" name="Name" value="' . $row['Name'] . '" id ="contact_nom"><label for="contact_nom">Name</label></p>
      <p class="input_wrapper"><input type="number" name="yo" onKeyDown="limitText(this,4);" onKeyUp="limitText(this,4);" value="' . $row['YearOpened'] .'"  id ="contact_email"><label for="contact_email">Year Opened</label></p>
      <p class="input_wrapper"><input type="time" name="Opens" value="' . $row['Opens'].'"  id ="contact_email"><label for="contact_email">Opens</label></p>
      <p class="input_wrapper"><input type="time" name="Closes" value="' . $row['Closes'].'"  id ="contact_sujet"><label for="contact_sujet">Closes</label></p>

      <p class="submit_wrapper"><input type="submit" value="save"></p>
			</form>
	</article>
</section>';

?>
</body>
</html>
