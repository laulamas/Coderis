<?php
include_once "conexion.php";
session_start();
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');
if($_SESSION['logged']!=1){
header ('Location: index.html');
}

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$username = $_POST["username"];
$emailsignup = $_POST["emailsignup"];
$passwordsignup = $_POST["passwordsignup"];

$id= $_SESSION['userid'];
echo "nombre $nombre";
echo "apellido";
echo "telefono";
echo "username";
echo "emailsignup";
echo "passwordsignup";
$sql="Insert into Registro (nombre , apellido, telefono, username, emailsignup, passwordsignup) values ('$nombre', '$apellido', '$telefono', '$username', '$emailsignup', '$passwordsignup' )";
$result=mysqli_query($conn,$sql) or die("Could not execute query $sql");
?>

