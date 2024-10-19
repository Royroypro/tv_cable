<?php 
include("../conexion.php");
$dni=$_POST["dni"];
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$tipo=$_POST["lstipop"];
$nombre=strtoupper($nombre);
$direccion=strtoupper($direccion);

//insertar

$sql="INSERT INTO personal(dni,nombre,correo,direccion,telefono,id_tipopersonal) 
values ('$dni','$nombre','$correo','$direccion','$telefono','$tipo')";

mysqli_query($cn,$sql);
header('location: ../adminregistro.php');
?>
