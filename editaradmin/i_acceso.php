<?php
include("../conexion.php");

$codigo=$_POST['idacceso'];
$personal=$_POST["personal"];
$username=$_POST["user_name"];
$userpass=$_POST["user_pass"];
echo $codigo;
$sql="UPDATE acceso set usuario='$username', password='$userpass', idpersonal='$personal' where idacceso='$codigo'";
mysqli_query($cn,$sql);
header('location: ../adminconfig.php');
?>