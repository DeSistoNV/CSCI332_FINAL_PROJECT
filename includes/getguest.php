


<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);

include 'sql_connect.php';

$sql="SELECT * FROM Visitor WHERE ID=".$q .";";
$result = $mysqli->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);


echo '<section id="contact">
	<article>



			<form action="includes/edit_guest.php?ID=' . $row['ID'] . '" method="post" class="contactforms" id="contactpanel">
      <p class="input_wrapper"><input type="text" name="FirstName" onkeypress="return onlyAlphabets(event,this);" value="' . $row["FirstName"]. '" id ="contact_nom"><label for="contact_nom">First Name</label></p>
      <p class="input_wrapper"><input type="text" name="LastName"  onkeypress="return onlyAlphabets(event,this);" value="' . $row["LastName"].  '"  id ="contact_email"><label for="contact_email">Last Name</label></p>
      <p class="input_wrapper"><input type="number" name="Age" onKeyDown="limitText(this,3);" onKeyUp="limitText(this,3);" max=150 value="' . $row["Age"]. '"  id ="contact_email"><label for="contact_email">Age</label></p>
      <p class="input_wrapper"><input type="text" name="HomeTown" value="' . $row["HomeTown"]. '"  id ="contact_email"><label for="contact_email">Home Town</label></p>
      <p class="input_wrapper"><input type="text" max length=2 style="text-transform:uppercase" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" onkeypress="return onlyAlphabets(event,this);" name="HomeState" value="' . $row["HomeState"]. '"  id ="contact_sujet"><label for="contact_sujet">Home State</label></p>



      <p class="submit_wrapper"><input type="submit" value="save"></p>
			</form>
	</article>
</section>';

?>
</body>
</html>
