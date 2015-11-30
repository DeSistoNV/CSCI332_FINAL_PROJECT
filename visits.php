<!doctype html>
<html lang="en">
<?php include "includes/head.php"; ?>

<body>

<?php include "includes/navbar.php"; ?>
<?php include "includes/diagram_action.php";?>

<script> document.getElementById("visits").className += " active"; </script>

<?php
include 'includes/sql_connect.php';
echo '<div class="datagrid">';
echo "<table class='sortable'>";
echo "<thead><tr><th>Visited</th><th>Attraction</th><th>Visitor</th><th>Park</th><th></th></tr></thead>";
$sql_query1 = "SELECT * FROM Visits";
if ($result = $mysqli->query($sql_query1)) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo date('F jS Y h:i A', strtotime($row["Visited"]));
         echo "</td><td>";
         $sql_query2 = "SELECT * FROM Attraction WHERE ID =" . $row["AttractionID"];
         $attraction = $mysqli->query($sql_query2)->fetch_array(MYSQLI_ASSOC);
         echo $attraction['Name'];
         echo "</td><td>";
         $sql_query3 = "SELECT * FROM Visitor WHERE ID =" . $row["VisitorID"];
         $visitor_query = $mysqli->query($sql_query3)->fetch_array(MYSQLI_ASSOC);
         echo $visitor_query['FirstName'].' '.$visitor_query['LastName'];
         echo "</td><td>";
         $sql_query4 = "SELECT * FROM Park WHERE ID = (SELECT ParkID from Attraction WHERE ID =". $attraction['ID'].")";
         echo $mysqli->query($sql_query4)->fetch_array(MYSQLI_ASSOC)['Name'];
         echo "</td><td>";
         echo "<input type='button' class='btn' onclick='";
         echo 'location.href="/includes/del_visit.php?ID=';
         echo $row["ID"] .'";' . "'". "value='DELETE'/>";
         echo "</td></tr>";
    }
echo "</table></div>";

}
?>

<div>


<section id="contact">
    <article>


            <label for="checkcontact" class="contactbutton"><div></div><h1>Record Visit</h1></label><input id="checkcontact" type="checkbox">

            <form action="includes/save_visit.php" method="post" class="contactform">
                <p class="input_wrapper"><input type="number" name="Rating" onKeyDown="limitText(this,1);" onKeyUp="limitText(this,1);" value="<?php echo $number ?>"  max=5 min=0 id ="contact_email"><label for="contact_email">Rating</label></p>

                <p class="input_wrapper"><select name="VisitorID">
                <?php include "includes/pick_guest.php" ?>
                </select><label id='picker' for="contact_email">Visitor</label></p>

                <p class="input_wrapper"><select name="AttractionID">
                <?php include "includes/pick_attraction.php" ?>
                </select><label id='picker' for="contact_email">Attraction</label></p>
                <p class="submit_wrapper"><input type="submit" value="save"></p>

            </form>
    </article>
</section>


</div>
<script>

query1 = <?php echo json_encode($sql_query1);?>;
query2 = <?php echo json_encode($sql_query2);?>;
query3 = <?php echo json_encode($sql_query3);?>;
query4 = <?php echo json_encode($sql_query4);?>;



window.onload = function() {
simplePopup({
  'pop-title':  ' ',
  'pop-body': query1 + "<br><br>" + query2 + "<br><br>" + query3 + "<br><br>" + query4,
  'btn-text': 'Done',
  'round-corners' : true
});
};
</script>


</body>
</html>
