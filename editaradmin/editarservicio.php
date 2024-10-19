<?php


include("../conexion.php");
$cliente = $_GET['cod'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital</title>
    <link rel="icon" type="image/x-icon" href="../icono/logoempresa.ico">
    <link rel="stylesheet" href="../css/adminregistro.css" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <section class="dashboard">

        <!--contenido-->
        <br>
        <br><br>
        <div class="dash-content">
            <div class="overview">
                <div class="boxes">
                    <!--Usuario-->
                    <div class="box box1">
                        <span class="text">EDITAR PERSONAL <i class="fa-solid fa-address-book"></i></span>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                //armarla
                                $sqltec = "select * from servicio where idservicio ='$cliente'";

                                //ejecutarla
                                $f = mysqli_query($cn, $sqltec);

                                while ($r = mysqli_fetch_assoc($f)) {
                                    ?>
                                    <form action="i_servicio.php" method="post">
                                        <i class="fa-brands fa-teamspeak fa-beat-fade"></i></i><span class="text1"> Registro
                                            Tipos de Servicio</span>
                                        <br>
                                        <!-- Campos de información -->

                                        <input type="text" placeholder="Nombre del Servicio" name="nservicio"
                                            value="<?php echo $r['nomservicio']; ?>" class="input_textual"
                                            autocomplete="off" />
                                        <select class="input_textual" name="lsestado" >

                                            <?php
                                            $selected = ($r['estadoservicio']) ? "selected" : "";
                                            ?>
                                            <option value="0" <?php echo $selected; ?>>Inactivo</option>
                                            <option value="1" <?php echo $selected; ?>>Activo</option>
                                        </select>
                                        <input type="hidden" id="acticuloId" name="idservicio" value="<?php echo $r["idservicio"]; ?>" />


                                        <!--Botón para enviar -->
                                        <button class="input_boton">
                                            <i class="fa-solid fa-arrow-right-to-bracket fa-beat" aria-hidden="true"></i>

                                        </button>
                                    </form>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--Usuario-->
                </div>
            </div>
        </div>
    </section>

</body>

</html>