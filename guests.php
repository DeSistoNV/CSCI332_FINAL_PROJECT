<!doctype html>
<html lang=''>
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



<script> document.getElementById("guest").className += "active";


function showGuest(str) {
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
        xmlhttp.open("GET","includes/getguest.php?q="+str,true);
        xmlhttp.send();
    }
    location.href="#img2";
};
</script>
<?php
include 'includes/sql_connect.php';
echo '<div class="datagrid">';
echo "<table class='sortable'>";
echo "<thead><tr><th>Name</th><th>Age</th><th>HomeTown</th><th></th></tr></thead>";
$sql_query = "SELECT * FROM Visitor";
if ($result = $mysqli->query($sql_query)) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["FirstName"] . " " . $row["LastName"];
         echo "</td><td>";
         echo $row["Age"];
         echo "</td><td>";
         echo $row["HomeTown"].', '.$row["HomeState"];
         echo "</td><td>";
         echo "<input type='button' onclick='showGuest(" . '"'. $row["ID"].'"' . ")' class='btn'";
         echo "value='EDIT'/>   ";
         echo "<input type='button' class='btn' onclick='";
         echo 'location.href="/includes/del_guest.php?ID=';
         echo $row["ID"] .'";' . "'". "value='DELETE'/>";
         echo "</td></tr>";
    }
echo "</table></div>";

}
?>

<div>


<section id="contact">
	<article>


			<label for="checkcontact" class="contactbutton"><div></div><h1>ADD Visitor</h1></label><input id="checkcontact" type="checkbox">

			<form action="includes/save_guest.php" method="post" class="contactform">
				<p class="input_wrapper"><input type="text" onkeypress="return onlyAlphabets(event,this);" name="FirstName" value="<?php echo $number ?>"  id ="contact_nom"><label for="contact_nom">First Name</label></p>
				<p class="input_wrapper"><input type="text" onkeypress="return onlyAlphabets(event,this);" name="LastName" value="<?php echo $number ?>"  id ="contact_nom"><label for="contact_nom">Last Name</label></p>
				<p class="input_wrapper"><input type="Number" onkeydown="limitText(this,3);" onKeyUp="limitText(this,3);" max=150 name="Age" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Age</label></p>
				<p class="input_wrapper"><input type="text" name="HomeTown" value="<?php echo $number ?>"  id ="contact_email"><label for="contact_email">Home Town</label></p>
				<p class="input_wrapper"><input type="text" max length=2 style="text-transform:uppercase" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" onkeypress="return onlyAlphabets(event,this);" name="HomeState" value="<?php echo $number ?>"  id ="contact_sujet"><label for="contact_sujet">Home State</label></p>

				<p class="submit_wrapper"><input type="submit" value="save"></p>
			</form>
	</article>
</section>

</div>

<script>

query = <?php echo json_encode($sql_query);?>;


window.onload = function() {
simplePopup({
  'pop-title':  ' ',
  'pop-body': query,
  'btn-text': 'Done',
});
};
</script>


</body>
</html>
