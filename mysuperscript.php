<?php
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');
include_once "conexion.php";

//echo "Connected successfully";
//mysqli_close($conn);

//mysqli_select_db($con, DB_NAME) or die("no pude conectar");
$user= $_POST["username"];
$pass= $_POST["password"];
echo $user."<br>";
echo $pass."<br>";

$query="SELECT * FROM Registro WHERE usuario='$user' AND password='$pass'";
	$result=mysqli_query($conn,$query)
	or die("Could not execute query $query");
	echo "filas mysqli_num_rows".mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			 echo "encontre{$row['usuario']}";
			 session_start();
			 
			 $_SESSION['user_type'] = $row['tipo_usuario'];
			 $_SESSION['logged']=1;
			 $_SESSION['userNM']=$_POST["username"] ;
			 $_SESSION['zeta']=$_POST["password"] ;
			 $_SESSION['userid']=$row['id_usuario'];
			 header ('Location: actualizar_registro.php');
			 }
			 }else{
				 header ('Location: index.html');
				// echo "no encontrado";
				 }
			
?>
