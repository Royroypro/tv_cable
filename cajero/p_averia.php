<?php 
include("../conexion.php");
include("../auth.php");
include("../phpqrcode/qrlib.php");
include("funcioncodigo.php");

$servicio=$_POST["tservicio"];
$cod=$_POST["codcliente"];
$nombre=$_POST["namecliente"];
$telefono=$_POST["telefono"];
$direccion=$_POST["direccion"];
$descripcion=$_POST["descripcion"];
$tecnico=$_POST["tecnico"];
$nombre=strtoupper($nombre);
$direccion=strtoupper($direccion);
$codigo=generarcodigo(10);

//echo "cajero ".$idpersonal."<br>";
//echo "servicio ".$servicio."<br>";
//echo "codigocliente ".$cod."<br>";
//echo "telefono ".$telefono."<br>";
//echo "codigo ".$codigo."<br>";
//echo "descripo ".$descripcion."<br>";
//echo "telefono ".$tecnico."<br>";

//insertar

$sql="INSERT INTO averia (idservicio, cod_cliente, idpersonal,codigovalidacion, tecnico, estado, telefono1, detalle, fechaaveria, fechasolucion) 
VALUES ('$servicio', '$cod', '$idpersonal', '$codigo', '$tecnico', '0','$telefono','$descripcion', current_timestamp(), current_timestamp())";
mysqli_query($cn,$sql);
// qr
$sqlcon="SELECT * FROM averia where codigovalidacion='$codigo'";
$f=mysqli_query($cn,$sqlcon);

while ($r=mysqli_fetch_assoc($f)) {

$nombrearchivo="../qrcliente/".$r["id_averia"].".jpg";
$tamanio="3";
$data=$r["codigovalidacion"];
$nivel=QR_ECLEVEL_L;

QRcode::png($data,$nombrearchivo,$nivel,$tamanio);
// Carga el código QR en formato PNG
$imagen_qr = imagecreatefrompng($nombrearchivo);

// Crea una nueva imagen en blanco para convertirla a formato JPG
$imagen_jpg = imagecreatetruecolor(imagesx($imagen_qr), imagesy($imagen_qr));
imagefill($imagen_jpg, 0, 0, imagecolorallocate($imagen_jpg, 255, 255, 255));

// Copia el código QR en la nueva imagen en formato JPG
imagecopy($imagen_jpg, $imagen_qr, 0, 0, 0, 0, imagesx($imagen_qr), imagesy($imagen_qr));

// Guarda la imagen en formato JPG
imagejpeg($imagen_jpg, $nombrearchivo, 100);

// Liberar memoria
imagedestroy($imagen_qr);
imagedestroy($imagen_jpg);

}

header('location: ../cajeroinforme.php');
?>
