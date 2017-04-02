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
                <h1>Coderis | <span>Registro de Usuarios</span></h1>
            </header>
            <section>				
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on" method="post"> 
                                <h1>Base de Datos</h1> 
								<p> 
                                    <label for="nombre" class="uname" data-icon="u" >Nombre</label>
                                    <input id="nombre" name="nombre" required type="text" placeholder="name" />
                                </p>
								<p> 
                                    <label for="apellido" class="uname" data-icon="u" >Apellido</label>
                                    <input id="apellido" name="apellido" required type="text" placeholder="lastname" />
                                </p>
								
								<p> 
                                    <label for="telefono" class="uname" data-icon="u" >Teléfono</label>
                                    <input id="telefono" name="telefono" required type="text" placeholder="number" />
                                </p>
								
								<p>
									<label for="emailsignup" class="uname" data-icon="e" > Correo</label>
									<input id="emailsignup" name="emailsignup" required type="email" placeholder="email@email.com"/>
								</p>
							    <p> 
                                    <label for="usernamesignup" class="telefono" data-icon="u" >Usuario</label>
                                    <input id="username" name="username" required type="text" placeholder="username" />
                                </p>
								
								<p> 
                                    <label for="passwordsignup" class="uname" data-ico="p" > Clave </label>
                                    <input id="passwordsignup" name="passwordsignup" required type="password" placeholder="eg. X8df!90EO"/>
                                </p>

<?
                                	if($user_type == 1)
									{?>
									<input type="checkbox" name="nuevo" />Ingresar nuevo empleado</input>
								   	<?}
                                     ?>
								     <input type="submit" value="Guardar" /> 								
                             </form> <br>
						
						</form>
					
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

					echo "<option value='$id'>".$apellido.", ".$nombre."</option>";	
}

?>

					</select>
<input type="submit" value="Buscar" /> 
</form> <br>



</div>

</div>
                </div>  
            </section>
        </div>
    </body>
</html>