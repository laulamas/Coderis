<?php
session_start();
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');	
if($_SESSION['logged']!=1){
header ('Location: index.html');
}

include_once "conexion.php";
$user_type = $_SESSION['user_type'];
$employee_id = $_POST["sel_usuario"];
$_SESSION["employee_id"] = $employee_id;

if($employee_id>0){}else{
	$employee_id = 0;
	$_SESSION["employee_id"] = 0;
	
	if($user_type != 1){
		$employee_id = $_SESSION["userid"];
	}


}

//echo "Empleado # $user_id";
//ahora hacer la busqueda en la base de datos y traer la info

					$sql = "Select * from Registro where id_usuario = $employee_id";
					$result = mysqli_query($conn,$sql) or die ($sql);
					while($row=mysqli_fetch_array($result))
					{
					$id = $row["id_usuario"];
					$nombre = $row["nombre"];
					$apellido = $row["apellido"];
					$telefono = $row["telefono"];
					$usuario = $row["usuario"];
					$password =$row["password"];
					$email =$row["email"];
					$desactivado = $row["fecha_desactivado"];
					}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Acceso y Registro</title>
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
        <div class="container">
            
            <header>
                <h1>Coderis | <span>Registro de Documentos</span></h1>
		 </header>
		 <section>
				<div id="container_demo" >
				<a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
						
						
                       <form action="savedata.php" method= "post" >
					        
                                <h1> Base de Datos </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u" > Nombre</label>
                                    <input id="nombre" name="nombre" required type="text" placeholder="name" value="<? echo $nombre; ?>" />
                                </p> <br>
								<p> 
                                    <label for="usernamesignup"class="uname" data-icon="u" > Apellido</label>
                                    <input id="apellido" name="apellido" required type="text" placeholder="lastname" value="<? echo $apellido; ?>"/>
                                </p> <br>
								<p> 
                                    <label for="usernamesignup"class="uname" data-icon="u" > Teléfono</label>
                                    <input id="telefono" name="telefono" required type="text" placeholder="number" value="<? echo $telefono; ?>" />
                                </p> <br>
								<p> 
                                    <label for="usernamesignup"class="uname" data-icon="u" > Usuario</label>
                                    <input id="username" name="username" required type="text" placeholder="username" value="<? echo $usuario; ?>"/>
                                </p> <br>
								
								<p>
									<label for="emailsignup"class="uname" data-icon="e" > Correo</label>
									<input id="emailsignup" name="emailsignup" required type="email" placeholder="email@email.com" value="<? echo $email; ?>"/>
								</p><br>
								
								<p> 
                                    <label for="passwordsignup"class="uname" data-icon="p" > Clave </label>
                                    <input id="passwordsignup" name="passwordsignup" required type="password" placeholder="eg. X8df!90EO" value="<? echo $password; ?>"/>
                                </p><br> 
                                
                                
                                <p> 
                                    <label for="empledo_desactivado"class="uname" data-icon="p" > Fecha Desactivación </label>
                                    <input id="empleado_desactivado" name="empleado_desactivado" type="date"  value="<? echo $desactivado; ?>"/>
                                </p><br> 
                                
                                
                                	<?
                                	if($user_type == 1)
									{?>
									<input type="checkbox" name="nuevo" value="1"/>Ingresar nuevo empleado</input>
								   	<?}
                                     ?>
								<input type="submit" value="Guardar" /> 
				    </form><br>
					<?
					if($user_type == 1)
									{?>
								
					<form action="actualizar_registro.php" method="post">
					<select name="sel_usuario">
					<option value="0">Seleccione Empleado</option>
<?					
					$sql = "Select * from Registro where tipo_usuario <> 1 order by apellido, nombre asc";
					$result = mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($result)){
					$id = $row["id_usuario"];
					$nombre = $row["nombre"];
					$apellido = $row["apellido"];
					$telefono = $row["telefono"];
					$usuario = $row["usuario"];
					$password =$row["password"];
					$email =$row["email"];
					echo "<option value='$id'>".$apellido.", ".$nombre."</option>";	
					}
					?>
					</select>
					<input type="submit" value="Buscar" /> 
					</form> 
									<?
									}
									?>
                     <form action="upload_file.php" method="post" enctype="multipart/form-data" target="_blank">
                     <br><br><br><br>
                     <h2>Subir documento</h2>
                     <br><br>
                     
                    			<p>
									<label for="date_expire" class="uname" data-icon="e" >Fecha de Expiración</label>
									<input id="date_expire" name="date_expire" required type="date" />
								</p><br>
								
								<p> 
                                    <label for="expire_alert"class="uname" data-icon="p" > Días de alerta </label>
                                    <input id="expire_alert" name="expire_alert" required type="text" value="60" />
                                </p><br> 
                    
                    			<select name="sel_documento">
								<option value="0">Seleccione Documento</option>
                    			<option value="1">Documento 1</option>
                                <option value="2">Documento 2</option>
                                <option value="3">Documento 3</option>
                                <option value="4">Documento 4</option>
                                
                    
                    			</select>
                     
                     
    				Seleccione Documento a Subir:
			    	<input type="file" name="fileToUpload" id="fileToUpload">
    				<input type="submit" value="Subir Documento" name="submit">
                    
                    
                    
                    			
					</form>
                    
					<?
					if($user_type == 1)
									{?>
					
                    <form action="prepare_alert_page.php" method="post" target="_blank">
                    
                    <input type="submit" value="Preparar Lista de Documentos por Expirar" name="submit">
                    
                    
                    </form>
                    
                    
                    <form action="prepare_employee_list.php" method="post" target="_blank">
                    
                    <input type="submit" value="Preparar Lista de Empleados" name="submit">
                    
                    
                    </form>
					
					<?
									}
					?>
<table>
                    <?
                    $sql = "Select * from tbl_documento where id_usuario = $employee_id";
					$result = mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($result))
					{
                    
					
					$sel_documento = $row["sel_documento"];
					$doc_header = $sel_documento."|||".$employee_id."|||";	

?>
<tr>
<td>
<a href="documentos/<? echo $doc_header.$row["nombre_documento"]; ?> "> <? echo $row["nombre_documento"]; ?> </a>

</td>
</tr>

<?

}

?>

</table>
					
					
				
                    	
				</div>
				
               
                
                
		   </div>	
		</div>
	</section>
		</div>
    </body>
</html>