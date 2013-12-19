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
<head>
<title>Saarang Tickets</title>
</head>
<body>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <style>
	#login_form {
	margin: 12px 0 0;
	padding: 15px 20px 20px;
	background: #F1F1F1;
	border: 3px solid #B45252;
	}
	#login_form h3,table,tbody,tr,td,input{
		//position: absolute;
	}
	#login_form h3{
		margin-top:0;
	}
	
	</style>
    <div id="page_background" style="position:absolute;width:100%;height:100%">
    	<img src="images/IMG_3253.png" width="100%" height="100%" />
    </div>
    <div id="page_container" style="position:absolute;width:100%;height:100%;">
        <div id="login_form" style="position:relative;top:50%;width:300px;height:200px;margin:0 auto;">
        <form method="post" action="index.php" align="center"> 
          <h3>Login Form</h3> 
          <table style="display: table;" class=" htmtableborders" align="center"> 
            <tbody> 
              <tr> 
                <td style="font-size:16px"> Email ID:&nbsp;&nbsp;&nbsp;</td> 
                <td style="padding-top:10px;"> <input stle="padding:0" type="text" name="username" size="20" /> </td> 
              </tr> 
              <tr> 
                <td style="font-size:16px"> Password:&nbsp;&nbsp;&nbsp;</td> 
                <td style="padding-top:10px;"> <input type="password" name="password" size="20" /> </td> 
              </tr> 
            </tbody> 
          </table> 
          <div align="center" style="margin-top:10px;height:20px;"><div style="position:absolute;float:left;margin-left:0px"><input type="submit" value="Login" name="submit" /></div> <div style="position:absolute; margin-left:60px;"><input type="reset" /></div></div>
          <div align="center" style="margin-top:20px;">Don't have an account?&nbsp; Register <a href="register.php">here</a>
          </div>
        </form>
      </div>
    </div>
    </body>
  </html>
