<!doctype html>
<html lang=''>
<?php include "includes/head.php"; ?>

<body>

<?php include "includes/navbar.php"; ?>

<script> document.getElementById("visits").className += " active"; </script>

<?php
include 'includes/sql_connect.php';
echo '<div class="datagrid">';
echo "<table class='sortable'>";
echo "<thead><tr><th>Visited</th><th>Attraction</th><th>Visitor</th><th>Park</th></tr></thead>";
if ($result = $mysqli->query("SELECT * from Visits")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo date('F jS Y h:i A', strtotime($row["Visited"]));
         echo "</td><td>";
         echo $mysqli->query("SELECT * from Attraction WHERE ID =". $row["AttractionID"])->fetch_array(MYSQLI_ASSOC)['Name'];
         echo "</td><td>";
         $visitor_query = $mysqli->query("SELECT * from Visitor WHERE ID =". $row["VisitorID"])->fetch_array(MYSQLI_ASSOC);
         echo $visitor_query['FirstName'].' '.$visitor_query['LastName'];
         echo "</td><td>";

         echo "</td></tr>";
    }
echo "</table></div>";    

}
?>

<div>


<section id="contact">
	<article>

		
			<label for="checkcontact" class="contactbutton"><div></div><h1>Log Visit</h1></label><input id="checkcontact" type="checkbox">
	
			<form action="includes/save_visit.php" method="post" class="contactform">
				<p class="input_wrapper"><input type="text" name="Name" value="<?php echo $number ?>"  id ="contact_nom"><label for="contact_nom">NEED</label></p>
				<p class="input_wrapper"><input type="text" name="City" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">TO</label></p>
				<p class="input_wrapper"><input type="text" name="State" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">FIX</label></p></label></p>

				<p class="submit_wrapper"><input type="submit" value="save"></p>			
			</form>
	</article>
</section>


</div>



</body>
</html>