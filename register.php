<div align="center">
<?php // Inialize session 
session_start(); // Check, if user is already login, then jump to secured page 
if (isset($_SESSION['username'])) 
{ 
header('Location: home.php'); 
}
if (isset($_POST['submit']))
{
if($_POST['name']==''||$_POST['id']==''||$_POST['username']==''||$_POST['password']=='')
{
echo "All fields are required";
} else {
include('config.php');
$login = mysql_query("SELECT * FROM user WHERE (email = '" . mysql_real_escape_string($_POST['username']) . "')");
// Check username and password match
if (mysql_num_rows($login) == 0){
$name = $_POST['name'];
$id = $_POST['id'];
$usernm = $_POST['username'];
$passwd = $_POST['password'];
$passwd2= $_POST['password2'];
if($passwd == $passwd2){
include('config.php');
$query="INSERT INTO user (name, id, email, dept, password)VALUES ('".$name."','".$id."','".$usernm."' ,'".$_POST['dept']."','".md5($passwd)."')";

mysql_query($query) or die ('Error updating database');

header('Location: success.html'); 
}
else echo "passwords doesn't match";
}
else echo "Email id already registered";
}}
 ?>
 </div>
 
    <title>Register here</title> 
	
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <form method="post" action="register.php"> 
      <h3 align="center">Registration Form  </h3>
	  <div align="center">
        <table style="display: table;" class=" htmtableborders" align="center"> 
          <tbody> 
            <tr>
              <td> Employee Name: </td> 
              <td> <input type="text" name="name" size="20" /> </td> 
            </tr> 
            <tr> 
              <td> Employee ID: </td> 
              <td> <input type="text" name="id" size="20" /> </td> 
            </tr> 
            <tr> 
              <td> Department:</td> 
              <td> <select name="dept" onchange="change()">
<?php
	$dept_list = array("AE", "AM", "BT", "CE", "CH", "CS", "DoMS", "ED", "EE", "HS", "MA", "ME", "MM", "NA", "PH");
	foreach($dept_list as $dept_item)
	{
		echo '<option value="'.$dept_item.'">'.$dept_item.'</option>';
	}
?>
		</select></td> 
            </tr> 
            <tr> 
              <td> Email Id:</td> 
              <td> <input type="text" name="username" size="20" /> </td> 
            </tr> 
            <tr> 
              <td> Password:</td> 
              <td> <input type="password" name="password" size="20" /> </td> 
            </tr> 
            <tr> 
              <td> Repeat Password</td> 
              <td> <input type="password" name="password2" size="20" /> </td> 
            </tr> 
          </tbody>	  
        </table> 
Already have an account?? Click <a href="index.php">here</a> to login	<br><input type="submit" value="Register" name="submit" /> <input type="reset" /> 
      </div>
    </form> 
  
