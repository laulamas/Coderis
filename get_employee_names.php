<?
session_start();
/* if($_SESSION['logged']!=1){
header ('Location: index.html');
} */
include_once "conexion.php";
?>



<body>

<select name="sel_usuario">
 <option value="0">Seleccione Empleado</option>

<?
$sql = "Select * from Registro where tipo_usuario <> 1 order by apellido, nombre asc";
$result = mysqli_query($conn,$sql);


while($row=mysqli_fetch_array($result)){
$id = $row["id_usuario"];
$nombre = $row["nombre"];
$apellido = $row["apellido"];

	echo "<option value='$id'>".$apellido.", ".$nombre."</option>";
	
}



?>

</select>

</body>
