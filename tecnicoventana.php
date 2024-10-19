<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>


</head>


<div class="modal fade" id="tecnicoventana<?php echo $fila['id_averia']; ?>" tabindex="-1" role="dialog"
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
                        <td>Cajero(a)</td>
                        <td>
                            <?php echo $fila["nombre"]; ?>
                        </td>
                    </tr>
                    <style>
                        a{
                            text-decoration: none;
                        }
                        .button1 {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            width: 80px;
                            height: 40px;
                            gap: 15px;
                            background-color: #007ACC;
                            outline: 3px #007ACC solid;
                            outline-offset: -3px;
                            border-radius: 5px;
                            border: none;
                            cursor: pointer;
                            transition: 400ms;
                        }

                        .button1 .text {
                            color: white;
                            font-weight: 700;
                            font-size: 1em;
                            transition: 400ms;
                        }


                        .button1:hover {
                            background-color: transparent;
                        }

                        .button1:hover .text {
                            color: #007ACC;
                        }
                        .button1:hover .text1 {
                            color: #cc0000;
                        }
                        .button11 {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            width: 80px;
                            height: 40px;
                            gap: 15px;
                            background-color: #cc0000;
                            outline: 3px #cc0000 solid;
                            outline-offset: -3px;
                            border-radius: 5px;
                            border: none;
                            cursor: pointer;
                            transition: 400ms;
                        }

                        .button11 .text1 {
                            color: white;
                            font-weight: 700;
                            font-size: 1em;
                            transition: 400ms;
                        }


                        .button11:hover {
                            background-color: transparent;
                        }

                        .button11:hover .text1 {
                            color: #cc0000;
                        }
                        
                    </style>

                    <tr>
                        <td colspan="2">
                           
                            <center>
                                <a  href="scaner.php?cod=<?php echo $fila["id_averia"]; ?>" target="_parent">
                                    <button class="button1">
                                        <p class="text">Culminar</p>
                                    </button>
                                </a>
                            </center>
                        <br>
                            
                        
                        <center>
                                <a href="tecnicocancelar.php?cod=<?php echo $fila["id_averia"]; ?>" target="_parent">
                                    <button class="button11">
                                        <p class="text1">Cancelar</p>
                                    </button>
                                </a>
                            </center>
                        </td>
                        
                    </tr>

                </table>
            </div>


        </div>
    </div>
</div>




</html>