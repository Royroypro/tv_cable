<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    

</head>


<div class="modal fade" id="cajeroeditar<?php echo $fila['id_averia']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="overlay" id="overlay">
                <h5>AVERIA</h5>

                <table>
                    <tr>
                        <td>Servicio</td>
                        <td>
                            <?php echo $fila["nomservicio"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>N° Orden</td>
                        <td>
                            <?php
                            $numero = $fila["id_averia"];
                            $numeroFormateado = sprintf("%05d", $numero);
                            echo $numeroFormateado; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Usuario</td>
                        <td>
                            <?php echo $fila["nombres"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Direccion</td>
                        <td>
                            <?php echo $fila["direccion"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>QR</td>
                        <td><img src="qrcliente/<?php echo $fila["id_averia"] ?>.jpg" width="80" height="80">
                        </td>
                    </tr>
                    <tr>
                        <td>Celular</td>
                        <td>
                            <?php echo $fila["telefono1"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Descripccion</td>
                        <td><textarea class="input_textual" name="descripcion" value="" cols="35" rows="4" readonly
                                onmousedown="return false;"><?php echo $fila["detalle"] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Observacion</td>
                        <td><textarea class="input_textual" name="descripcion" value="" cols="35" rows="4" readonly
                                onmousedown="return false;"><?php echo $fila["observacion"] ?></textarea>
                        </td>
                    </tr>
                    <td>Estado</td>
                        <td>
                            <?php if ($fila["estado"] == '0') {
                                        echo "Pendiente";
                                    } 
                                    
                                    else if ($fila["estado"] == '1'){
                                        echo 'Completado';
                                    }else{
                                        echo 'Rechazado';  
                                    } 
                            ?>
                        </td>
                    <tr>
                        <td>Tecnico</td>
                        <td>
                            <?php
                            $tecnico = $fila["tecnico"];
                            $sqltecnico = "SELECT * FROM personal WHERE idpersonal='$tecnico'";
                            $f1 = mysqli_query($cn, $sqltecnico);

                            while ($r2 = mysqli_fetch_assoc($f1)) {
                                echo $r2["nombre"];
                            } ?>
                        </td>
                    </tr>
                </table>
            </div>


        </div>
    </div>
</div>




</html>