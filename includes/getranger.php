<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);

include 'sql_connect.php';

$sql="SELECT * FROM ParkRanger WHERE ID=".$q .";";
$result = $mysqli->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);


echo '<section id="contact">
	<article>



			<form action="includes/edit_ranger.php?ID=' . $row['ID'] . '" method="post" class="contactforms" id="contactpanel">
      <p class="input_wrapper"><input type="text" name="FirstName" onkeypress="return onlyAlphabets(event,this);" value="' . $row["FirstName"]. '" id ="contact_nom"><label for="contact_nom">First Name</label></p>
      <p class="input_wrapper"><input type="text" name="LastName"  onkeypress="return onlyAlphabets(event,this);" value="' . $row["LastName"].  '"  id ="contact_email"><label for="contact_email">Last Name</label></p>
      <p class="input_wrapper"><input type="number" name="Age" onKeyDown="limitText(this,3);" onKeyUp="limitText(this,3);" max=150 value="' . $row["Age"]. '"  id ="contact_email"><label for="contact_email">Age</label></p>
      <p class="input_wrapper"><input type="number" name="Salary" value="' . $row["Salary"]. '"  onKeyDown="limitText(this,9);" onKeyUp="limitText(this,9);" id ="contact_sujet"><label for="contact_sujet">Salary</label></p>


      <p class="submit_wrapper"><input type="submit" value="save"></p>
			</form>
	</article>
</section>';

?>
</body>
</html>
