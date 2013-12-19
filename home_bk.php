
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

<div style="position: absolute; top: 5px; left: 10px; background-color: transparent;">
Logged in as <b><?php echo $_SESSION['username']; ?></b>
</div>

<div style="position: absolute; top: 10px; right: 30px; background-color: transparent;"><a href="logout.php"><b>Logout </b></a></div>
<div style="position: absolute; top: 30px; left: 150px; background-color: transparent;">

    <table border="1"> 
      <tbody>
        <tr> 
          <td><img src="images/choreo.jpg" alt="Smiley face" height="160" width="160"></td> 
          <td><b>Choreo Night:</b>
<form method="POST" action="update.php">
<select name="choreotype" onchange="change()">
<option value=1>Gallery (Rs. 200)</option>
<option value=2>Chair (Rs. 250)</option></select>x
<select name="choreotypen" onchange="change()">
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
<input type="submit" name="choreo" value="Add to Cart"></form></td> 
        </tr>
      </tbody>
    </table> 

</div>


<div style="position: absolute; top: 210px; left: 150px; background-color: transparent;">

    <table border="1"> 
      <tbody>
        <tr> 
          <td><img src="images/rock.jpg" alt="Smiley face" height="160" width="160"></td> 
          <td><b>Rock Show:</b><br>Discounted(only 2 tickets)
<form method="POST" action="update.php"><select name="rocktyped" onchange="change()">
<option value=1>Gallery (Rs. 200)</option>
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
echo '<input type="submit" name="rockd" value="Add to Cart"></form>
';}
else echo '
<input type="submit" name="rockd" value="Limit reached" disabled></form>';
?>
Non-Discounted
<form method="POST" action="update.php"><select name="rocktype" onchange="change()">
<option value=1>Gallery (Rs. 400)</option>
<option value=2>Bowl (Rs. 600)</option>
<option value=3>Exclusive fan pass (Rs. 1000)</option></select>x
<select name="rocktypen" onchange="change()">
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
</select><input type="submit" name="rock" value="Add to Cart"></form></td> 
        </tr>
      </tbody>
    </table> 


</div>
<div style="position: absolute; top: 420px; left: 150px; background-color: transparent;">

    <table border="1"> 
      <tbody>
        <tr> 
          <td><img src="images/sel.jpg" alt="Smiley face" height="160" width="160"></td> 
          <td><b>SEL: </b><br>Discounted (only 2 tickets)
<form method="POST" action="update.php"><select name="seltyped" onchange="change()">
<option value=1>Gallery (Rs. 350)</option>
<option value=2>Silver Chair (Rs. 600)</option>
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
echo '</select><input type="submit" name="seld" value="Add to Cart"></form>';}
else echo '<input type="submit" name="seld" value="Limit reached" disabled></form>';
?>
Non-Discounted<form method="POST" action="update.php">
<select name="seltype" onchange="change()">
<option value=1>Gallery (Rs. 600)</option>
<option value=2>Silver Chair (Rs. 800)</option>
<option value=3>Golden Chair (Rs. 1000)</option>
<option value=4>Platinum Chair (Rs. 1500)</option></select>x
<select name="seltypen" onchange="change()">
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
<input type="submit" name="sel" value="Add to Cart"></form></td></td> 
        </tr>
      </tbody>
    </table> 


</div>

<div style="position: absolute; top: 610px; left: 150px; background-color: transparent;">
<b>Payment Method:</b><form method="POST" action="update.php"><select name="methtype" onchange="change()">
<option value="Deduct from salary">Deduct From salary</option>
<option value="Pay by cash">Pay by cash</option></select><input type="submit" name="meth" value="Update Method"></form>
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
if($row['rock_g_d']>0) echo "<br>Gallery :".$row['rock_g_d']." x 200 = Rs.".$row['rock_g_d']*200;
if($row['rock_b_d']>0) echo "<br>Bowl :".$row['rock_b_d']." x 400 = Rs.".$row['rock_b_d']*400;
echo "<br><b>Non-Discounted:</b>";
if($row['rock_g']>0) echo "<br>Gallery :".$row['rock_g']." x 400 = Rs.".$row['rock_g']*400;
if($row['rock_b']>0) echo "<br>Bowl :".$row['rock_b']." x 600 = Rs.".$row['rock_b']*600;
if($row['rock_e']>0) echo "<br>Exclusive Fans :".$row['rock_e']." x 1000 = Rs.".$row['rock_e']*1000;
echo "<br><b><u>SEL:</u></b>";
echo "<br><b>Discounted:</b>";
if($row['sel_g_d']>0) echo "<br>Gallery :".$row['sel_g_d']." x 350 = Rs.".$row['sel_g_d']*350;
if($row['sel_s_d']>0) echo "<br>Silver :".$row['sel_s_d']." x 600 = Rs.".$row['sel_s_d']*600;
if($row['sel_gld_d']>0) echo "<br>Gold :".$row['sel_gld_d']." x 800 = Rs.".$row['sel_gld_d']*800;
echo "<br><b>Non-Discounted:</b>";
if($row['sel_g']>0) echo "<br>Gallery :".$row['sel_g']." x 600 = Rs.".$row['sel_g']*600;
if($row['sel_s']>0) echo "<br>Silver :".$row['sel_s']." x 800 = Rs.".$row['sel_s']*800;
if($row['sel_gld']>0) echo "<br>Gold :".$row['sel_gld']." x 1000 = Rs.".$row['sel_gld']*1000;
if($row['sel_p']>0) echo "<br>Platinum :".$row['sel_p']." x 1500 = Rs.".$row['sel_p']*1500;
echo "<br><br><b>Total amount = </b> Rs. ".(($row['sel_p']*1500)+($row['sel_gld']*1000)+($row['sel_s']*800)+($row['sel_g']*600)+($row['sel_gld_d']*800)+($row['sel_s_d']*600)+($row['sel_g_d']*350)+($row['rock_b_d']*400)+($row['rock_g_d']*200)+($row['rock_e']*1000)+($row['rock_b']*600)+($row['rock_g']*400)+($row['choreo_c']*250)+($row['choreo_g']*200));
echo "<br><br><b>Method of payment:</b> ".$row['paytype'];
?>
<br><form method="POST" action="update.php"><input type="submit" value="Reset Cart" name="resetcart"></form>
</div>

</body>

</html>
