<?php
include("conexion.php");
include("auth.php");
$idpersonal;
if (isset($_GET['lectura'])) {
  $lectura = $_GET['lectura'];
  $sqllec="SELECT * FROM averia WHERE codigovalidacion='$lectura'";
  $f=mysqli_query($cn,$sqllec);
  $r = mysqli_fetch_assoc($f);
  $idaveria= $r['id_averia'];
  $sqlactual="update averia set estado='1',fechasolucion=current_timestamp(),tecnico='$idpersonal' where id_averia='$idaveria' ";
  mysqli_query($cn,$sqlactual);
  header('location: tecnicoinforme.php');
} else {
  echo "No se recibieron datos de lectura.";
}
?>