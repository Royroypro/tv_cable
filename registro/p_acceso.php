<?php 
include("../conexion.php");
$personal=$_POST["personal"];
$username=$_POST["user_name"];
$userpass=$_POST["user_pass"];

//insertar

$sql="INSERT INTO acceso(usuario,password,idpersonal) 
values ('$username','$userpass','$personal')";

mysqli_query($cn,$sql);
header('location: ../adminregistro.php');
?>
