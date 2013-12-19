<?php

$hostname = 'localhost';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
$dbname   = 'saarango_ticketsales_2013'; // Your database name.
$username = 'saarango';             // Your database username.
$password = 'saar4ro0rg';                 // Your database password. If your database has no password, leave it empty.


// Let's connect to host
mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
// Select the database
mysql_select_db($dbname) or DIE('Database name is not available!');

?>
