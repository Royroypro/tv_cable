<?php
include("../conexion.php");

$idpersonal=$_POST["idservicio"];
$servicio=$_POST['nservicio'];
$estado=$_POST['lsestado'];

$sql="UPDATE servicio set nomservicio='$servicio',estadoservicio='$estado' where idservicio  ='$idpersonal'";
mysqli_query($cn,$sql);
header('location: ../admineditar.php');
?>