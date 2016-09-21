<?php
$dir="media";
$directorio=opendir($dir); 
echo "<b>Directorio actual:</b><br>$dir<br>"; 
echo "<b>Archivos:</b><br>"; 
$s=0;
while ($archivo = readdir($directorio)){
$s++;
if($s>2)
  echo "$archivo<br>"; 
}
closedir($directorio); 
?>
