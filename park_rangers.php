<!doctype html>
<html lang='en'>
<?php include "includes/head.php"; ?>

<body>

<?php include "includes/navbar.php"; ?>
<?php include "includes/diagram_action.php";?>

<div class="lightbox" id="img2">
<div class="box" style="height : 40vh;">
   <a class="close" id="closer" href="#">X</a>
<div class="content">
<div id="txtHint"><b>NULL.</b></div></div>
<div class="clear"></div></div></div>



<script> document.getElementById("rangers").className += "active";


function showRanger(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","includes/getranger.php?q="+str,true);
        xmlhttp.send();
    }
    location.href="#img2";
};
</script>

<?php
include 'includes/sql_connect.php';
echo '<div class="datagrid">';
echo "<table class='sortable'>";
echo "<thead><tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Salary</th><th>Park</th><th></th></tr></thead>";
$sql_query1 = "SELECT * FROM ParkRanger";

if ($result = $mysqli->query($sql_query1)) {
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
         $sql_query2 = "SELECT * from Park WHERE ID =". $row["ParkID"];
         echo $mysqli->query($sql_query2)->fetch_array(MYSQLI_ASSOC)['Name'];
         echo "</td><td>";
         echo "<input type='button' onclick='showRanger(" . '"'. $row["ID"].'"' . ")' class='btn'";
         echo "value='EDIT'/>   ";
         echo "<input type='button' class='btn' onclick='";
         echo 'location.href="/includes/del_ranger.php?ID=';
         echo $row["ID"] .'";' . "'". "value='DELETE'/>";
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
