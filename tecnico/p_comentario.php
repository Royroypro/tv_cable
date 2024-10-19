<?php
include("../conexion.php");

$idaveria=$_POST['idaveria'];
$comentario=$_POST['Observacion'];


$sql="update averia set observacion='$comentario' where id_averia='$idaveria' ";
mysqli_query($cn,$sql);
 header('location: ../lectorqr.php');


?>