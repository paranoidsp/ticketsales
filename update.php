	<?php

// Inialize session
session_start();
include('config.php');

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
	{
	header('Location: index.php');
	}
if (isset($_POST['resetcart'])){
mysql_query("UPDATE  `saarango_ticketsales_2013`.`user` SET  `choreo_g` =  '0',
`choreo_c` =  '0',
`rock_g` =  '0',
`rock_b` =  '0',
`rock_e` =  '0',
`rock_g_d` =  '0',
`rock_b_d` =  '0',
`edm_g` =  '0',
`edm_b` =  '0',
`edm_e` =  '0',
`edm_g_d` =  '0',
`edm_b_d` =  '0',
`sel_g` =  '0',
`sel_s` =  '0',
`sel_gld` =  '0',
`sel_p` =  '0',
`sel_g_d` =  '0',
`sel_s_d` =  '0',
`sel_gld_d` =  '0' WHERE email = '".$_SESSION['username']."'");
}
if (isset($_POST['choreo'])){
if($_POST['choreotype']==1){
mysql_query("UPDATE user SET choreo_g = choreo_g + '".$_POST['choreotypen']."' WHERE email = '".$_SESSION['username']."'");
}
else{
mysql_query("UPDATE user SET choreo_c = choreo_c + '".$_POST['choreotypen']."' WHERE email = '".$_SESSION['username']."'");
}
}
if (isset($_POST['rock'])){
if($_POST['rocktype']==1){
mysql_query("UPDATE user SET rock_g = rock_g + '".$_POST['rocktypen']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['rocktype']==2){
mysql_query("UPDATE user SET rock_b = rock_b + '".$_POST['rocktypen']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['rocktype']==3){
mysql_query("UPDATE user SET rock_e = rock_e + '".$_POST['rocktypen']."' WHERE email = '".$_SESSION['username']."'");
}
}
if (isset($_POST['rockd'])){
$query="SELECT * FROM user WHERE email = '".$_SESSION['username']."'";
$dat=mysql_query($query) or die ('Error fetching database');
$row = mysql_fetch_array($dat);
if ($row['rock_g_d']+$row['rock_b_d']<2){
if($_POST['rocktyped']==1){
mysql_query("UPDATE user SET rock_g_d = rock_g_d + '".$_POST['rocktypedn']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['rocktyped']==2){
mysql_query("UPDATE user SET rock_b_d = rock_b_d + '".$_POST['rocktypedn']."' WHERE email = '".$_SESSION['username']."'");
}
}
}
if (isset($_POST['edm'])){
if($_POST['edmtype']==1){
mysql_query("UPDATE user SET edm_g = edm_g + '".$_POST['edmtypen']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['edmtype']==2){
mysql_query("UPDATE user SET edm_b = edm_b + '".$_POST['edmtypen']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['edmtype']==3){
mysql_query("UPDATE user SET edm_e = edm_e + '".$_POST['edmtypen']."' WHERE email = '".$_SESSION['username']."'");
}
}
if (isset($_POST['edmd'])){
$query="SELECT * FROM user WHERE email = '".$_SESSION['username']."'";
$dat=mysql_query($query) or die ('Error fetching database');
$row = mysql_fetch_array($dat);
if ($row['edm_g_d']+$row['edm_b_d']<2){
if($_POST['edmtyped']==1){
mysql_query("UPDATE user SET edm_g_d = edm_g_d + '".$_POST['edmtypedn']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['edmtyped']==2){
mysql_query("UPDATE user SET edm_b_d = edm_b_d + '".$_POST['edmtypedn']."' WHERE email = '".$_SESSION['username']."'");
}
}
}

if (isset($_POST['sel'])){
if($_POST['seltype']==1){
mysql_query("UPDATE user SET sel_g = sel_g + '".$_POST['seltypen']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['seltype']==2){
mysql_query("UPDATE user SET sel_s = sel_s + '".$_POST['seltypen']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['seltype']==3){
mysql_query("UPDATE user SET sel_gld = sel_gld + '".$_POST['seltypen']."' WHERE email = '".$_SESSION['username']."'");
}
else
mysql_query("UPDATE user SET sel_p = sel_p + '".$_POST['seltypen']."' WHERE email = '".$_SESSION['username']."'");
}
if (isset($_POST['seld'])){
$query="SELECT * FROM user WHERE email = '".$_SESSION['username']."'";
$dat=mysql_query($query) or die ('Error fetching database');
$row = mysql_fetch_array($dat);
if ($row['sel_g_d']+$row['sel_s_d']+$row['sel_gld_d']<2){
if($_POST['seltyped']==1){
mysql_query("UPDATE user SET sel_g_d = sel_g_d + '".$_POST['seltypedn']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['seltyped']==2){
mysql_query("UPDATE user SET sel_s_d = sel_s_d + '".$_POST['seltypedn']."' WHERE email = '".$_SESSION['username']."'");
}
else if($_POST['seltyped']==3){
mysql_query("UPDATE user SET sel_gld_d = sel_gld_d + '".$_POST['seltypedn']."' WHERE email = '".$_SESSION['username']."'");
}
}
}
if (isset($_POST['meth'])){
mysql_query("UPDATE user SET paytype = '".$_POST['methtype']."' WHERE email = '".$_SESSION['username']."'");

}
header('Location: home.php');
?>
