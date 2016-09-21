<?php
session_start();
$allowedExts = array("jpeg", "jpg", "pdf","doc","docx","ppt","pptx","xls","xlsx");
@$extension = end(explode(".", $_FILES["file"]["name"]));
/*if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {*/

if(in_array($extension, $allowedExts)){
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("archivos/".$_SESSION['matricula']."/". $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
	date_default_timezone_set("America/Mexico_City");
	if(!($link=mysql_connect("localhost","root","vertrigo"))){echo "fallo conexion";}
	if(!(mysql_select_db("ftp"))){echo "fallodb";}
	$propiedades=explode(".",$_FILES["file"]["name"]);
	
	$insertar=mysql_query("insert into archivos(nombre,tipo,size,fecha,materia,matriculaUsuario) values('".$propiedades[0]."','".$propiedades[1]."','".($_FILES["file"]["size"] / 1024)."','".date("Y/m/d")."','".$_POST['materia']."','".$_SESSION['matricula']."')",$link);
      move_uploaded_file($_FILES["file"]["tmp_name"],
     
	  "archivos/".$_SESSION['matricula']."/". $_FILES["file"]["name"]);
      echo "Stored in: " . "archivos/".$_SESSION['matricula']."/". $_FILES["file"]["name"];
	  }
    }
}

header("Location:perfil.php");
/*  }
else
  {
  echo "Invalid file";
  }
header("Location:post.php");*/
?>
