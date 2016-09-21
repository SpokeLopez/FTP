<?php 
session_start();
session_name('ftp');
/*
$dir="media";
$directorio=opendir($dir); 
echo "<b>Directorio actual:</b><br>$dir<br>"; 
echo "<b>Archivos:</b><br>"; 
$s=0;
while ($archivo = readdir($directorio)){
			$s++;
				if($s>2){
					$propiedades=explode(".",$archivo);
					echo "<tr><td>$propiedades[0]</td><td>$propiedades[1]</td></tr>"; 
					
				}
		}
closedir($directorio);*/
$link=mysql_connect("localhost","root","vertrigo");
mysql_select_db("ftp",$link);
$query=mysql_query("select * from archivos where matriculaUsuario='".$_SESSION['matricula']."'",$link);
$materias=mysql_query("select * from materias where matriculaDocente='".$_SESSION['matricula']."'",$link);


		//Grupo del Alumno
		$alumno=mysql_query("select * from usuarios where Matricula='".$_SESSION['matricula']."'",$link);
		$g=mysql_fetch_assoc($alumno);
		$grupoAlumno=$g['Grupo'];
			
		$files=mysql_query("select * from archivos",$link);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/perfil.css" />
<link rel="stylesheet" type="text/css" href="css/fileUp.css" />
<link rel="stylesheet" type="text/css" href="css/input.css" />
<script src="js/jquery-1.10.0.js"></script>
<title>Perfil Usuario</title>

<script>
$(document).ready(function(){
		$('#upLoad').click(function(){
			$('.backdrop, .box').animate({'opacity':'.50'}, 300, 'linear');
			$('.box').animate({'opacity':'1.00'}, 300, 'linear');
			$('.backdrop, .box').css('display', 'block');
		 
			$('.close').click(function(){
				close_box();
			});
 
			$('.backdrop').click(function(){
				close_box();
			});
		});


	$(".download").hover(
	function(){
		var x=$(this).attr("alt");
		document.descarga.archivo.value=x;
		document.descarga.eliminar.value="";
		});
		
	$(".delete").hover(
	function(){
		var x=$(this).attr("alt");
		document.descarga.eliminar.value=x;
		document.descarga.archivo.value="";
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


<div id="perfilContenedor">
<?php
if($_SESSION['imagen']=="ok") 
	echo '<img src="media/perfil/'.$_SESSION['matricula'].'.jpg"/>';

else
	echo '<img src="media/perfil/default.jpg"/>';

?>
<br />
<form name="imagen" action="upload_Image.php" method="post" enctype="multipart/form-data">
			<div class="custom-input-file"><input type="file" name="file" class="input-file" />
    Cambiar Foto...
</div>
<input type="submit" value="Cambiar"/>
</form>
<label><h2><?php echo $g['Nombre']; ?></h2></label>
<?php echo $grupoAlumno; ?>
<br />
<?php if($_SESSION['us']=="profesor"){ echo '<img src="media/nuevo.png" id="upLoad"/>';} ?>



</div>
<div id="archivos">
<form name="descarga" method="post" action="download.php"> 
<input type="hidden" name="archivo"/>
<input type="hidden" name="eliminar" />
	<table>
		<tr>
			<th class="nombre">Nombre</th><th>Materia</th><th>Tamaño</th><th>Tipo</th><th>Modificacion</th><th></th><th></th>
		</tr>
        <?php
		
		if($_SESSION['us']=="alumno"){
		$par=0;
		while($r=mysql_fetch_assoc($files)){
			$mat=mysql_query("select * from materias where nombre='".$r['materia']."'",$link);
			$m=mysql_fetch_assoc($mat);
			$grupoMateria=$m['grupo'];
			
			
			if($grupoMateria==$grupoAlumno){
			
			$par++;
			if(($par%2)==0){
			echo "<tr class='filapar'><td class='nombre'>".$r['nombre']."</td><td>".$r['materia']."</td><td>".number_format($r['size'],1,'.','')." kb</td><td>".$r['tipo']."</td><td>".$r['fecha']."</td><td><input type='submit' class='download' value='' alt='".$r['nombre'].".".$r['tipo']."'/></td></tr>";
		
			}
			else{
				echo "<tr class='fila'><td class='nombre'>".$r['nombre']."</td><td>".$r['materia']."</td><td>".number_format($r['size'],1,'.','')." kb</td><td>".$r['tipo']."</td><td>".$r['fecha']."</td><td><input type='submit' class='download' value='' alt='".$r['nombre'].".".$r['tipo']."'/></td></tr>";
				}
			}
		}}
		
		if($_SESSION['us']=="profesor"){
		$par=0;
		while($r=mysql_fetch_assoc($query)){
			$par++;
			if(($par%2)==0){
			echo "<tr class='filapar'><td class='nombre'>".$r['nombre']."</td><td>".$r['materia']."</td><td>".number_format($r['size'],1,'.','')." kb</td><td>".$r['tipo']."</td><td>".$r['fecha']."</td><td><input type='submit' class='download' value='' alt='".$r['nombre'].".".$r['tipo']."'/></td><td><input type='submit' class='delete' value='' alt='".$r['nombre'].".".$r['tipo']."'/></td></tr>";
		
			}
			else{
				echo "<tr class='fila'><td class='nombre'>".$r['nombre']."</td><td>".$r['materia']."</td><td>".number_format($r['size'],1,'.','')." kb</td><td>".$r['tipo']."</td><td>".$r['fecha']."</td><td><input type='submit' class='download' value='' alt='".$r['nombre'].".".$r['tipo']."'/></td><td><input type='submit' class='delete' value='' alt='".$r['nombre'].".".$r['tipo']."'/></td></tr>";
				}
			}
		}
		
		?>
        
	</table>
   </form>
</div>
<div class="backdrop"></div>
	<div class="box"><div class="close">x</div>
		<form name="Subir" action="upload_file.php" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label><br />
			<input type="file" name="file" id="file"><br>
            Materia:<select name="materia" placeholder="Materia">
            <?php 
			while($re=mysql_fetch_assoc($materias)){
				echo "<option>".$re['nombre']."</option>";
				}
			?>
            </select><br />
			<input type="submit" name="submit" value="Subir">
		</form>
</div>

</body>
</html>
