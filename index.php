<?php
session_start();
session_name('ftp');
@$_SESSION['matricula'];
//mkdir("media/CarpetaPrueba", 0755);
/*$destino="pqjazzn@gmail.com";
$asunto="Prueba Mailing";
$mensaje="Este es un mensaje desde php";
$desde="From"."lap lalo";
mail($destino,$asunto,$mensaje,$desde);*/

//UPDATE
/*$link=mysql_connect("localhost","root","admin");
mysql_select_db("ftp",$link);
$sql_updt = "UPDATE usuarios SET Estado = 'Inactivo' 
        WHERE (Apellido_Paterno = 'Galvan')
        AND (correo = 'pqjazzn@gmail.com')";
$r=mysql_query($sql_updt,$link);*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title>Index</title>

	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/registro.css" />
	<script src="js/jquery-1.10.0.js"></script>

<script>
$(document).ready(function(){
		$('#registrarse').click(function(){
			$('.backdrop, .box').animate({'opacity':'.50'}, 300, 'linear');
			$('.box').animate({'opacity':'1.00'}, 300, 'linear');
			$('.backdrop, .box').css('display', 'block');
		//});
 
			$('.close').click(function(){
				close_box();
			});
 
			$('.backdrop').click(function(){
				close_box();
			});
		});



	function close_box()
		{
			$('.backdrop, .box').animate({'opacity':'0'}, 300, 'linear', function(){
			$('.backdrop, .box').css('display', 'none');
			});
		}
});
</script>
</head>

<body>

<div id="contenedorLogo">
	<div id="titulo">
		<img src="media/logo.png" id="logo"/><label id="title">Up&amp;DownLoad<br /><label>Files</label></label>
	</div>
</div>


<div class="backdrop"></div>
	<div class="box"><div class="close">x</div>
    	<h1>Registro</h1>
		<form name="registro" method="post" action="registrar.php">
			<input type="text" name="nombre" placeholder="Nombre"/><br />
        	<input type="text" name="ap" placeholder="Apellido Paterno"/><br />
        	<input type="text" name="mat" placeholder="Matricula"/><br />
        	<input type="text" name="correo" placeholder="Correo"/><br />
        	<input type="text" name="grupo" placeholder="Grupo"/><br />
            <input type="submit" class="button"/>
    	</form>
      </div>
</div>

<hr />

<img src="media/upload.png" id="promo"/>

<div id="login">
	<form name="login" id="loginf" method="post" action="login.php">
		<h1>Iniciar Sesion</h1>
			<input type="email" name="correo" placeholder="Correo electronico" required/><br />
			<input type="password" name="pass" placeholder="Contraseña" required/><br />
			<input type="submit" value="Iniciar Sesion" class="button"/>
			<input type="button" value="Registrarse" class="button" id="registrarse"/>
	</form>
<br />

<a href="recuperar.php">¿Olvidaste tu contraseña?</a>

</div>
</body>
</html>
