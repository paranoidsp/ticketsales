<?php
$file = $_POST['file'];
$numor = $_POST['numor'];
$numcp = $_POST['numcp'];
$printt = $_POST['printt'];
$printc = $_POST['printc'];

// Inialize session
session_start();

$aprvl="Not required";
if($numcp>99) $aprvl="Pending";
include('config.inc');
$query="INSERT INTO userreq (user, file, original, copy, type, colour, admin_aproval)VALUES ('".$_SESSION['username']."','".$file."','".$numor."','".$numcp."','".$printt."','".$printc."','".$aprvl."')";

mysql_query($query) or die ('Error updating database');

echo "Request Send Successfully";
?>
<html>
Click<a href="home.php">here</a> for home
</html>

