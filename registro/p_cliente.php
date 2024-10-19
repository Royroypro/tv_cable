<?php
include("../conexion.php");

$codigo=$_POST['codigo'];
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$lsnodo=$_POST['nodo'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$sql="INSERT INTO cliente (cod_cliente, dni,nombres,correo,id_nodo,direccion,telefono,estadocliente) 
VALUES ('$codigo', '$dni', '$nombre', '$correo', '$lsnodo', '$direccion','$telefono', '1')";

mysqli_query($cn,$sql);
header('location: ../admincliente.php');



?>