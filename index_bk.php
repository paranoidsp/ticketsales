<?php // Inialize session 
session_start(); // Check, if user is already login, then jump to secured page 
if (isset($_SESSION['username'])) 
{ 
header('Location: home.php'); 
}
if (isset($_POST['submit']))
{
include('config.php');

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM user WHERE (email = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string(md5($_POST['password'])) . "')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
// Set username session variable
$_SESSION['username'] = $_POST['username'];
// Jump to secured page
header('Location: home.php');
}
else {
// Jump to login page
echo "Username and password do not match";
}
}
 ?>
 
<html>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    
	<form method="post" action="index.php" align="center"> 
      <h3 align="center">Login Form</h3> 
      <table style="display: table;" class=" htmtableborders" align="center"> 
        <tbody> 
          <tr> 
            <td> Email ID:</td> 
            <td> <input type="text" name="username" size="20" /> </td> 
          </tr> 
          <tr> 
            <td> Password:</td> 
            <td > <input type="password" name="password" size="20" /> </td> 
          </tr> 
        </tbody> 
      </table> <div align="center"><input type="submit" value="Login" name="submit" /> <input type="reset" /></div>
	  <div align="center">Dont have an account?? Register <a href="register.php">here</a>
	  </div>
    </form>
  </html>
