<?
session_start();
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');	
if($_SESSION['logged']!=1){
header ('Location: index.html');
}

include_once "conexion.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Alertas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="images/output.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
</head>

<body>

<?

$today = date("Y-n-d");
?>
<div align="center">
<h1>
Empleados a la fecha de:<br>

<?


echo $today;
?>
		</h1>

			<table border="1">
			<th>
			Apellido
			<td>
			Nombre
			</td>
			<td>
			Teléfono
			</td>
			<td>
			Correo
			</td>
			</th>
			<?

//$sql = "Select Registro.*to.* from tbl_documento, Registro where Registro.id_usuario = tbl_documento.id_usuario Order by apellido desc, nombre desc, fecha_expiracion asc";
$sql = "Select * from Registro where tipo_usuario <> 1 and fecha_desactivado = '0000-00-00' Order by apellido, nombre asc";
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result))
{
	
$employee_id = $row["id_usuario"];
$sel_documento = $row["sel_documento"];
$doc_header = $sel_documento."|||".$employee_id."|||";
?>
<tr>
<td>
<?
//echo $doc_header;
echo $row["apellido"];
?>
</td>
<?
?>
<td>
<?
echo $row["nombre"];
?>
</td>
<td>
<?
echo $row["telefono"];
?>
</td>
<td>
<?
echo $row["email"];
?>
</td>
</tr>
<?
}

?>

				</table>


</div>


</body>
</html>