<?php
$link=mysql_connect("localhost","root","vertrigo");
mysql_select_db("ftp",$link);
$usuarios=mysql_query("select * from usuarios where Correo='".@$_POST['mail']."'",$link);
$bandera=0;
$usuario;
$contra;
while($r=mysql_fetch_row($usuarios)){
	if(isset($r[0]))
		$bandera=1;
		$usuario=$r[0];
		$contra=$r[2];
	}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/index.css" />
<meta charset="utf-8">
<title>Recuperacion Password</title>
</head>

<body>

<div id="contenedorLogo">
	<div id="titulo">
		<img src="media/logo.png" id="logo"/><label id="title">Up&amp;DownLoad<br /><label>Files</label></label>
	</div>
</div>


<div id="recuperar">
<h3>Introduzca su Correo Electronico para enviar sus datos</h3>
<form name="recuperacion" action="recuperar.php" method="post">
<input type="email" name="mail"/>
<input type="submit" />
</form>
<?php
if($bandera==0 && isset($_POST['mail'])){
	echo "<h4>";
	echo "Usted no se ha registrado";
	echo "</h4>";
	}
if($bandera==1 && isset($_POST['mail'])){
	 include"qr/qrlib.php"; 	
	$img = "codigo.png";
	QRcode::png($contra, $img,"no se pudo crear" ,2,2);
	echo "<h4>";
	echo $usuario." su numero de matricula es: ";
	echo '<img src="codigo.png">';
	echo "<br>Se ha enviado un correo con los datos a ".$_POST['mail'];
	echo "</h4>";
	}
	
 
	

?>
<a href="index.php">Up&Download Files</a>

</div>
</body>
</html>