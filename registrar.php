<?php
if(!($link=mysql_connect('localhost','root','vertrigo')))
	printf("fallo conexion");

if(!(mysql_select_db('ftp',$link)))
	printf("fallo DB");

$profesor=mysql_query("select * from docentes",$link);
$esProfesor=0;
while($r=mysql_fetch_assoc($profesor)){
	if($r['Matricula']==$_POST['mat'] && $r['Correo']==$_POST['correo']){
		global $esProfesor;
		$esProfesor=1;
		break;
	}
}

if($esProfesor==1){
	$consulta="insert into usuarios(Nombre,Apellido_Paterno,Matricula,Correo,Grupo,Estado) values('".$_POST['nombre']."','".$_POST['ap']."','".$_POST['mat']."','".$_POST['correo']."','-','Activo')";
	$result=mysql_query($consulta);
	
	
	}
if($esProfesor==0){
$consulta="insert into usuarios(Nombre,Apellido_Paterno,Matricula,Correo,Grupo,Estado) values('".$_POST['nombre']."','".$_POST['ap']."','".$_POST['mat']."','".$_POST['correo']."','".$_POST['grupo']."','Activo')";
$result=mysql_query($consulta);

	}

/*
 $sql_updt = "UPDATE tbl_users SET tx_password = '".md5($pasw)."' 
        WHERE (id_usuario = ".$idusr.")
        AND (tx_correo = '".$elcorreo."')";*/
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/registrar.css" />
</head>
<body>
<div id="contenedorLogo">
	<div id="titulo">
		<img src="media/logo.png" id="logo"/><label id="title">Up&amp;DownLoad<br /><label>Files</label></label>
	</div>
</div>
<h2>
<?php 
if($esProfesor==1){
	echo "Profesor ".$_POST['nombre']." ";
	}
else
	echo "Alumno ".$_POST['nombre']." ";
?>
ha quedado registrado
 </h2>
 <h2 id="ancla"><a href="index.php">Ir a Up&Download Files</a></h2>
</body>
</html>