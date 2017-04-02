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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alertas</title>
</head>

<body>

<?

$today = date("Y-n-d");
?>
<div align="center">
<h1>
Documentos por Expirar a la fecha de:

<?


echo $today;
?>
</h1>

<table border="1">
<th>

Empleado
<td>
</td>
<td>
Documento
</td>


<td>
Fecha de Expiracion
</td>


<td>
Alerta
</td>



</th>
<?

//$sql = "Select Registro.*, tbl_documento.* from tbl_documento, Registro where Registro.id_usuario = tbl_documento.id_usuario Order by apellido desc, nombre desc, fecha_expiracion asc";
$sql = "Select Registro.*, tbl_documento.*, datediff(fecha_expiracion,'$today') as alerta from tbl_documento, Registro where Registro.id_usuario = tbl_documento.id_usuario and datediff(fecha_expiracion,'$today') <= dias_alerta Order by apellido desc, nombre desc, fecha_expiracion asc";
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
<a href="documentos/<? echo $doc_header.$row["nombre_documento"]; ?> "> <? echo $row["nombre_documento"]; ?> </a>

</td>
<td>
<?
echo $row["fecha_expiracion"];
?>
</td>

<td>
<?
echo $row["alerta"];
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