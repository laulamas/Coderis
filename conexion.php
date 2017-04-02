<?php 
$servername = "mysql.hostinger.co.uk";
$database = "u587317437_coder";
$username = "u587317437_coder";
$password = "edxavier";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}


?>
