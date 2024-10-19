<?php 
include("../conexion.php");
$nombre=$_POST["nservicio"];

$nombre=strtoupper($nombre);
//insertar

$sql="INSERT INTO servicio(nomservicio) 
values ('$nombre')";

mysqli_query($cn,$sql);
header('location: ../material.php');
?>
