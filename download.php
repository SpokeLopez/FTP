<?php
session_start();

$file = "".$_POST['archivo'];
if(!($link=mysql_connect("localhost","root","vertrigo"))){echo "fallo conexion";}
if(!(mysql_select_db("ftp"))){echo "fallodb";}
$p=explode(".",$file);
$archivo=mysql_query("select * from archivos where nombre='".$p[0]."'",$link);
$res=mysql_fetch_assoc($archivo);
echo $res['matriculaUsuario'];
$directorio="archivos/".$res['matriculaUsuario']."/";

if($_POST['eliminar']==""){
	
	
  			if (file_exists($directorio.$file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($directorio.$file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($directorio.$file));
    ob_clean();
    flush();
    readfile($directorio.$file);
    exit;
			}
			else{echo "no existe";}
 		}
		

else{
	
	if(!($link=mysql_connect("localhost","root","vertrigo"))){echo "fallo conexion";}
	if(!(mysql_select_db("ftp"))){echo "fallodb";}
	$propiedades=explode(".",$_POST['eliminar']);
	$eliminar=mysql_query("DELETE FROM archivos WHERE matriculaUsuario='".$_SESSION['matricula']."' AND nombre='".$propiedades[0]."'",$link);
	$directorio="archivos/".$_SESSION['matricula']."/";
	
	$ok=opendir($directorio);
	while ($files = readdir($ok)) {
		if($files==$_POST['eliminar']){
			
  			if ( unlink($directorio.$files) ){
   			header("Location:perfil.php");
  			}
 		}
	}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>Descargas</title>
</head>

<body>
</body>
</html>