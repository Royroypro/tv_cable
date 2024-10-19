<?php
include("conexion.php");
include("auth.php");
$codigo=$_GET["cod"];
$idpersonal;
$sql = "UPDATE averia SET tecnico='$idpersonal',estado='2' where id_averia='$codigo'";
mysqli_query($cn,$sql);
header('location:obsteccacelado.php?cod='.$codigo);
?>