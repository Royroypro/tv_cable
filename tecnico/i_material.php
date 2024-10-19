<?php 
include("../conexion.php");
include("../auth.php");
$cod=$_POST["codaveria"];
/*$estado=$_POST["estadoaveria"];
$idpersonal;
$uno=$_POST["1"];
$dos=$_POST["2"];
$tres=$_POST["3"];
$cuatro=$_POST["4"];
echo "codigo ".$codigo."<br>";
echo "estado ".$estado."<br>";
echo "tecnico ".$idpersonal."<br>";
echo "uno ".$uno."<br>";
echo "dos ".$dos."<br>";
echo "tres ".$tres."<br>";
echo "cuantro ".$cuatro."<br>";
//$nmaterial=strtoupper($nmaterial);
//insertar*/

/*$sql="INSERT INTO material(tipmaterial,cantidad,descripccion) 
values ('$nmaterial','$Cantidad','$descripcion')";

mysqli_query($cn,$sql);
header('location: ../material.php');*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['cantidad'] as $materialId => $cantidad) {
        if ($cantidad > 0) {
            $codigo=$_POST["codaveria"];
           /* echo "id del material: ".$materialId."  cantidad :".$cantidad;
            echo"  la averia: ";
echo $codigo;
echo"<br>";
echo"<br>";*/
            // Insertar en la base de datos
            $sql = "INSERT INTO materialaveria(id_material,id_averia, cantidad,fecha) VALUES ('$materialId','$codigo', '$cantidad', current_timestamp())";
            mysqli_query($cn, $sql);
        }
    }
    header('location: ../observaciontecnico.php?cod='.$cod);
   }else{
   echo "no se puedo subir a la base de datos";} 
   


?>