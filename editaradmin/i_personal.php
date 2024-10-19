<?php
include("../conexion.php");

$idpersonal=$_POST["idpersonal"];
$dni=$_POST["dni"];
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$tipo=$_POST["lstipop"];
$estado=$_POST["lsestado"];
$nombre=strtoupper($nombre);
$direccion=strtoupper($direccion);


$sql="UPDATE personal set dni='$dni', nombre='$nombre',correo='$correo',
direccion='$direccion', telefono='$telefono',
estadopersonal='$estado', id_tipopersonal='$tipo' where idpersonal ='$idpersonal'";
mysqli_query($cn,$sql);
header('location: ../adminconfig.php');
?>