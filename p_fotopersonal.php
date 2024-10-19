<?php 


$c=$_POST["cod"];

$nombre=$_FILES["archivo"]["name"];
$archivo=$_FILES["archivo"]["tmp_name"];
echo $nombre;
echo$c;
list($n,$e)=explode(".", $nombre);


if ($e=="png") {
	
	//reemplazar el archivo

	move_uploaded_file($archivo,"pngpersonal/".$c.".png");
	header('location: editpersonal.php');


} else {
	

	//redireccionamos a imagenperfil
	header('location: login.php');
    echo "<script>alert('Revise su nombre de usuario o no es personal de esta empresa.');</script>";

}

 ?>