<?php
include("../conexion.php");
$codigo=$_POST["idmaterial"];
$nmaterial=$_POST["nmaterial"];
$Cantidad=$_POST["Cantidad"];
$descripcion=$_POST["descripcion"];
$nmaterial=strtoupper($nmaterial);

$sql="UPDATE material set tipmaterial='$nmaterial',cantidad='$Cantidad', descripccion='$descripcion' where id_material  ='$codigo'";
mysqli_query($cn,$sql);
header('location: ../admineditar.php');
?>