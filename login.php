<?php
session_start();
session_name('ftp');
$_SESSION['imagen']="";
$_SESSION['us']="";
$_SESSION['matricula']=$_POST['pass'];


if(!($link=mysql_connect('localhost','root','vertrigo')))
{
	printf("fallo conexion");
}
if(!(mysql_select_db('ftp',$link)))
{
	printf("fallo DB");
}


$ok=opendir("media/perfil/");
	while ($files = readdir($ok)) {
		if($files==$_POST['pass'].".jpg"){
  			$_SESSION['imagen']="ok";
 		}
	}


$esProfesor=0;
global $esProfesor;
$profesor=mysql_query("select * from docentes where Correo='".$_POST['correo']."'",$link);
$consulta="select * from usuarios where correo='".$_POST['correo']."'";
$result=mysql_query($consulta);

$profe=mysql_fetch_assoc($profesor);
$r=mysql_fetch_assoc($result);

if($_POST['pass']==$r['Matricula']){
	if($_POST['correo']==$profe['Correo'])
	{
	$_SESSION['us']="profesor";
	if(!(file_exists("archivos/".$_SESSION['matricula'])))
	mkdir("archivos/".$_SESSION['matricula'], 0755);
	}
	else
	$_SESSION['us']="alumno";
header("Location:docente.html");
}
else{
	header("Location:index.php");
}

?>