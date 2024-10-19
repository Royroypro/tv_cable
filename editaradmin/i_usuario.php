<?php
include("../conexion.php");

$codigo=$_POST['codcliente'];
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$lsnodo=$_POST['lsnodo'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$estado=$_POST['lsestado'];

$sql="UPDATE cliente set dni='$dni', nombres='$nombre',correo='$correo', id_nodo= $lsnodo,direccion='$direccion', telefono=$telefono, estadocliente=$estado where cod_cliente='$codigo'";
mysqli_query($cn,$sql);
header('location: ../admincliente.php');
?>