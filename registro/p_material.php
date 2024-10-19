<?php 
include("../conexion.php");
$nmaterial=$_POST["nmaterial"];
$Cantidad=$_POST["Cantidad"];
$descripcion=$_POST["descripcion"];
$nmaterial=strtoupper($nmaterial);
//insertar

$sql="INSERT INTO material(tipmaterial,cantidad,descripccion) 
values ('$nmaterial','$Cantidad','$descripcion')";

mysqli_query($cn,$sql);
header('location: ../material.php');
?>