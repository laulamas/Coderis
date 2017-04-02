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
$employee_id = $_SESSION["employee_id"];
//echo "Empleado $employee_id <br>";

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$username = $_POST["username"];
$emailsignup = $_POST["emailsignup"];
$passwordsignup = $_POST["passwordsignup"];
$fecha_desactivacion = $_POST["empleado_desactivado"];
$new_employee = $_POST["nuevo"];

//echo "Empleado nuevo $new_employee";

if($new_employee == "1"){

$id= $_SESSION['userid'];
//echo "nombre $nombre";
//echo "apellido";
//echo "telefono";
//echo "username";
//echo "emailsignup";
//echo "passwordsignup";
$sql="Insert into Registro (nombre , apellido, telefono, usuario, email, password, fecha_desactivado) values ('$nombre', '$apellido', '$telefono', '$username', '$emailsignup', '$passwordsignup', '$fecha_desactivacion' )";
$result=mysqli_query($conn,$sql) or die("Could not execute query $sql");
}else{


$sql="Update Registro set nombre = '$nombre', apellido = '$apellido', telefono ='$telefono', usuario ='$username', email ='$emailsignup', password ='$passwordsignup', fecha_desactivado = '$fecha_desactivacion' where id_usuario = $employee_id";
$result=mysqli_query($conn,$sql) or die("Could not execute query $sql");	
$_SESSION["employee_id"] = $employee_id;	


}

header ('Location: actualizar_registro.php');


?>

