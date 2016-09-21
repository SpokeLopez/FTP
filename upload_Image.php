<?php
session_start();
session_name('ftp');
$allowedExts = array("jpeg", "jpg");
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

    if (file_exists("media/perfil/".$_SESSION['matricula']))
      {
		  $_SESSION['imagen']='ok';
	$ok=opendir("media/perfil/");
	while ($files = readdir($ok)) {
		if ( unlink("media/perfil/".$_SESSION['matricula'].".jpg") ){
   			header("Location:upload_Image.php");
  			}
 		
	}	  
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
	$_SESSION['imagen']='ok';
	$propiedades=explode(".",$_FILES["file"]["name"]);
	
      move_uploaded_file($_FILES["file"]["tmp_name"],
     
	  "media/perfil/".$_SESSION['matricula'].".jpg");
      echo "Stored in: " . "media/perfil/".$_SESSION['matricula'].".jpg";
	  }
    }
}
else
{
	echo "extension incorrecta";}
header("Location:perfil.php");
/* }
else
  {
  echo "Invalid file";
  }
header("Location:post.php");*/
?>
