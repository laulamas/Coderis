<?php

session_start();
if($_SESSION['logged']!=1){
header ('Location: index.html');
}

include_once "conexion.php";
	
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');


$date_expire = $_POST["date_expire"];
echo $date_expire;
$expire_alert = $_POST["expire_alert"];
$sel_documento = $_POST["sel_documento"];
$employee_id = $_SESSION["employee_id"];




$target_dir = "documentos/". $sel_documento."|||".$employee_id."|||";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$save_file = basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;





//$target_file = $sel_doumento."|||".$employee_id."|||".$target_file;


/* $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
} */
// Check file size
/* if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
} */
// Allow certain file formats
/* if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
} */
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
//guardar documento en base de datos

	$sql = "Delete from tbl_documento where id_usuario = $employee_id and sel_documento = $sel_documento";
	$result = mysqli_query($conn,$sql);
	$sql= "Insert into tbl_documento (nombre_documento,id_usuario,sel_documento,fecha_expiracion,dias_alerta) Values ('$save_file',$employee_id,$sel_documento,'$date_expire',$expire_alert)";
	$result = mysqli_query($conn,$sql) or die (mysqli_error($conn). " error $sql");	
		
		
		
		
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>


