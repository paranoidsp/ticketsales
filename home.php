
	<?php

// Inialize session
session_start();
include('config.php');

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
	{
	header('Location: index.php');
	}

?>
<html>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<head>
<title>Faculty Home Page</title>
</head>

<body>
<style>
div table{
	border: 0px;	
}
table,tr,td{
	border: 0px;	
}
table{
	height:auto;
	background-color:#EAEAEA;border:1px solid #CCC;
	box-shadow:0 1px 3px rgba(0, 0, 0, 0.3) inset;
	border-radius: 4px;
	background: -moz-linear-gradient(top, white, #F0F0F0);
	background: -webkit-gradient(linear, 0 0, 0 100%, from(white), to(#F0F0F0));
	padding:10px;
	height:212px;
	width: 750px;
}
.add{
	position: absolute;
	top: 125px;
	left: 192px;	
}
.image_holder{
	top: 25px;
	left: 10px;	
}
.heading{
	position: absolute;
	top: 10px;
	left: 192px;
}
select{
	width: 190px;	
}

</style>

<div style="position: absolute; top: 0px; left: 10px; background-color: transparent;">
Logged in as <b><?php echo $_SESSION['username']; ?></b>
</div>

<div style="position: absolute; top: 0px; right: 30px; background-color: transparent;"><a href="logout.php"><b>Logout </b></a></div>
<div class="holders" id="choroe-night" style="position: absolute; top: 40px; left: 150px; background-color: transparent;">

    <table border="1"> 
      <tbody>
        <tr> 
          <td class="image_holder" style="margin-left:0px;"><img src="images/choreo.png" alt="Smiley face" height="160" width="160"></td> 
          <td class="heading"><b>Choreo Night:</b><hr>
<form class="dropdown" method="POST" action="update.php">
<select name="choreotype" onChange="change()">
<option value=1>Gallery (Rs. 200)</option>
<option value=2>Chair (Rs. 250)</option></select>x
<select name="choreotypen" onChange="change()">
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10</option>
</select>
<input style="margin-left:30px" type="submit" name="choreo" value="Add to Cart"></form></td> 
        </tr>
      </tbody>
    </table> 

</div>

<hr/>
<div class="holders" style="position: absolute; top: 282px; left: 150px; background-color: transparent;">

    <table border="1"> 
      <tbody>
        <tr> 
          <td class="image_holder"><img src="images/edm.png" alt="Smiley face" height="160" width="160"></td> 
          <td class="heading"><b>EDM Night(Sunburn Campus) :</b><br><hr>Discounted(only 2 tickets)
<form method="POST" action="update.php"><select name="edmtyped" onChange="change()">
<option value=1>Gallery (Rs. 250)</option>
<option value=2>Bowl (Rs. 400)</option>
</select>
<?php
$query="SELECT * FROM user WHERE email = '".$_SESSION['username']."'";
$dat=mysql_query($query) or die ('Error fetching database');
$row = mysql_fetch_array($dat);

if ($row['edm_g_d']+$row['edm_b_d']<2){
if ($row['edm_g_d']+$row['edm_b_d']==1){
	echo 'x<select name="edmtypedn" onchange="change()"><option value=1>1</option></select>';
}else {echo 'x<select name="edmtypedn" onchange="change()">
<option value=1>1</option>
<option value=2>2</option>
</select>';}
echo '<input style="margin-left:30px" type="submit" name="edmd" value="Add to Cart"></form>
';}
else echo '
<input style="margin-left:30px" type="submit" name="edmd" value="Limit reached" disabled></form>';
?>
Non-Discounted
<form method="POST" action="update.php"><select name="edmtype" onChange="change()">
<option value=1>Gallery (Rs. 350)</option>
<option value=2>Bowl (Rs. 500)</option>
<option value=3>Exclusive fan pass (Rs. 750)</option></select>x
<select name="edmtypen" onChange="change()">
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10</option><br/><br/>
</select><input style="margin-left:30px" type="submit" name="edm" value="Add to Cart"></form></td> 
        </tr>
      </tbody>
    </table> 


</div>
<div class="holders" style="position: absolute; top: 524px; left: 150px; background-color: transparent;">

    <table border="1"> 
      <tbody>
        <tr> 
          <td class="image_holder"><img src="images/rocky.png" alt="Smiley face" height="160" width="160"></td> 
          <td class="heading"><b>Rock Show:</b><br><hr>Discounted(only 2 tickets)
<form method="POST" action="update.php"><select name="rocktyped" onChange="change()">
<option value=1>Gallery (Rs. 250)</option>
<option value=2>Bowl (Rs. 400)</option>
</select>
<?php
$query="SELECT * FROM user WHERE email = '".$_SESSION['username']."'";
$dat=mysql_query($query) or die ('Error fetching database');
$row = mysql_fetch_array($dat);

if ($row['rock_g_d']+$row['rock_b_d']<2){
if ($row['rock_g_d']+$row['rock_b_d']==1){
	echo 'x<select name="rocktypedn" onchange="change()"><option value=1>1</option></select>';
}else {echo 'x<select name="rocktypedn" onchange="change()">
<option value=1>1</option>
<option value=2>2</option>
</select>';}
echo '<input style="margin-left:30px" type="submit" name="rockd" value="Add to Cart"></form>
';}
else echo '
<input style="margin-left:30px" type="submit" name="rockd" value="Limit reached" disabled></form>';
?>
Non-Discounted
<form method="POST" action="update.php"><select name="rocktype" onChange="change()">
<option value=1>Gallery (Rs. 350)</option>
<option value=2>Bowl (Rs. 600)</option>
<option value=3>Exclusive fan pass (Rs. 1000)</option></select>x
<select name="rocktypen" onChange="change()">
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10</option><br/><br/>
</select><input style="margin-left:30px" type="submit" name="rock" value="Add to Cart"></form></td> 
        </tr>
      </tbody>
    </table> 


</div>
<div class="holders" style="position: absolute; top: 766px; left: 150px; background-color: transparent;">

    <table border="1"> 
      <tbody>
        <tr> 
          <td class="image_holder"><img src="images/popu.png" alt="Smiley face" height="160" width="160"></td> 
          <td class="heading"><b>Popular Night: </b><br><hr>Discounted (only 2 tickets)
<form method="POST" action="update.php"><select name="seltyped" onChange="change()">
<option value=1>Gallery (Rs. 350)</option>
<option value=2>Silver Chair (Rs. 550)</option>
<option value=3>Golden Chair (Rs. 800)</option>
</select>
<?php
$query="SELECT * FROM user WHERE email = '".$_SESSION['username']."'";
$dat=mysql_query($query) or die ('Error fetching database');
$row = mysql_fetch_array($dat);
if ($row['sel_g_d']+$row['sel_s_d']+$row['sel_gld_d']<2){
	if($row['sel_g_d']+$row['sel_s_d']+$row['sel_gld_d']==1){
	echo '
	x<select name="seltypedn" onchange="change()">
<option value=1>1</option></select>';
 }else {echo '
x<select name="seltypedn" onchange="change()">
<option value=1>1</option>
<option value=2>2</option>';}
echo '</select><input style="margin-left:30px" type="submit" name="seld" value="Add to Cart"></form>';}
else echo '<input style="margin-left:30px" type="submit" name="seld" value="Limit reached" disabled></form>';
?>
Non-Discounted<form method="POST" action="update.php">
<select name="seltype" onChange="change()">
<option value=1>Gallery (Rs. 600)</option>
<option value=2>Silver Chair (Rs. 800)</option>
<option value=3>Golden Chair (Rs. 1000)</option>
<option value=4>Platinum Chair (Rs. 1500)</option></select>x
<select name="seltypen" onChange="change()">
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10</option>
</select>
<input style="margin-left:30px" type="submit" name="sel" value="Add to Cart"></form></td></td> 
        </tr>
      </tbody>
    </table> 


</div>

<div style="display:none;position: absolute; top: 1108px; left: 150px; background-color: transparent;">
<b>Payment Method:</b><form method="POST" action="update.php"><select name="methtype" onChange="change()">
<option value="Deduct from salary">Deduct From salary</option>
<option value="Pay by cash">Pay by cash</option></select><input style="margin-left:30px" type="submit" name="meth" value="Update Method"></form>
</div>

<br><br>
<div style="position: absolute; top: 30px; left: 1000px; width: 240px; height: 150px; background-color: transparent;">
<h2><u>Cart</u></h2>
<?php
$query="SELECT * FROM user WHERE email = '".$_SESSION['username']."'";
$dat=mysql_query($query) or die ('Error fetching database');
$row = mysql_fetch_array($dat);
echo "<b><u>Choreo:</u></b>";
if($row['choreo_g']>0) echo "<br>Gallery :".$row['choreo_g']." x 200 = Rs.".$row['choreo_g']*200;
if($row['choreo_c']>0) echo "<br>Chair :".$row['choreo_c']." x 250 = Rs.".$row['choreo_c']*250;
echo "<br><b><u>Rock Show:</u></b>";
echo "<br><b>Discounted:</b>";
if($row['rock_g_d']>0) echo "<br>Gallery :".$row['rock_g_d']." x 250 = Rs.".$row['rock_g_d']*250;
if($row['rock_b_d']>0) echo "<br>Bowl :".$row['rock_b_d']." x 400 = Rs.".$row['rock_b_d']*400;
echo "<br><b>Non-Discounted:</b>";
if($row['rock_g']>0) echo "<br>Gallery :".$row['rock_g']." x 350 = Rs.".$row['rock_g']*350;
if($row['rock_b']>0) echo "<br>Bowl :".$row['rock_b']." x 600 = Rs.".$row['rock_b']*600;
if($row['rock_e']>0) echo "<br>Exclusive Fans :".$row['rock_e']." x 1000 = Rs.".$row['rock_e']*1000;
echo "<br><b><u>EDM Night(Sunburn Campus):</u></b>";
echo "<br><b>Discounted:</b>";
if($row['edm_g_d']>0) echo "<br>Gallery :".$row['edm_g_d']." x 250 = Rs.".$row['edm_g_d']*250;
if($row['edm_b_d']>0) echo "<br>Bowl :".$row['edm_b_d']." x 400 = Rs.".$row['edm_b_d']*400;
echo "<br><b>Non-Discounted:</b>";
if($row['edm_g']>0) echo "<br>Gallery :".$row['edm_g']." x 350 = Rs.".$row['edm_g']*350;
if($row['edm_b']>0) echo "<br>Bowl :".$row['edm_b']." x 500 = Rs.".$row['edm_b']*500;
if($row['edm_e']>0) echo "<br>Exclusive Fans :".$row['edm_e']." x 750 = Rs.".$row['edm_e']*750;
echo "<br><b><u>Popular Night:</u></b>";
echo "<br><b>Discounted:</b>";
if($row['sel_g_d']>0) echo "<br>Gallery :".$row['sel_g_d']." x 350 = Rs.".$row['sel_g_d']*350;
if($row['sel_s_d']>0) echo "<br>Silver :".$row['sel_s_d']." x 600 = Rs.".$row['sel_s_d']*600;
if($row['sel_gld_d']>0) echo "<br>Gold :".$row['sel_gld_d']." x 800 = Rs.".$row['sel_gld_d']*800;
echo "<br><b>Non-Discounted:</b>";
if($row['sel_g']>0) echo "<br>Gallery :".$row['sel_g']." x 600 = Rs.".$row['sel_g']*600;
if($row['sel_s']>0) echo "<br>Silver :".$row['sel_s']." x 800 = Rs.".$row['sel_s']*800;
if($row['sel_gld']>0) echo "<br>Gold :".$row['sel_gld']." x 1000 = Rs.".$row['sel_gld']*1000;
if($row['sel_p']>0) echo "<br>Platinum :".$row['sel_p']." x 1500 = Rs.".$row['sel_p']*1500;
echo "<br><br><b>Total amount = </b> Rs. ".(($row['sel_p']*1500)+($row['sel_gld']*1000)+($row['sel_s']*800)+($row['sel_g']*600)+($row['sel_gld_d']*800)+($row['sel_s_d']*600)+($row['sel_g_d']*350)+($row['edm_b_d']*400)+($row['edm_g_d']*250)+($row['edm_e']*750)+($row['edm_b']*500)+($row['edm_g']*350)+($row['rock']*400)+($row['rock']*200)+($row['rock']*1000)+($row['rock']*600)+($row['rock']*400)+($row['choreo_c']*250)+($row['choreo_g']*200));
echo "<br><br><b>Method of payment:</b> ".$row['paytype'];
?>
<br><form method="POST" action="update.php"><input type="submit" value="Reset Cart" name="resetcart"></form>
</div>

</body>

</html>
