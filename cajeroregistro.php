<?php
include("conexion.php");
include("cajero(a).html");
session_start();
$idpersonal = isset($_SESSION["idpersonal"]) ? $_SESSION["idpersonal"] : "Usuario";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital</title>
    <link rel="icon" type="image/x-icon" href="icono/logoempresa.ico">
    <link rel="stylesheet" href="css/material.css" type="text/css">
    <link rel="stylesheet" href="css/buscar.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <section class="dashboard">
        <!--cabecera-->
        <div class="top">
                <i class="fa-solid fa-wrench"></i>
                <?php
                $sqlfoto = "SELECT * FROM personal where idpersonal='$idpersonal'";
                //ejecutarla
            $f = mysqli_query($cn, $sqlfoto);
            while ($r10 = mysqli_fetch_assoc($f)) {
                ?>
                <div class="search">
                    <span class="text">
                        <?php echo $r10["nombre"]; ?>
                    </span>
                    </span>
                    <img src="pngpersonal/<?php echo $r10["idpersonal"]; ?>.png" alt="">
                </div>
                <?php
            }

            ?>
        </div>
        <!--cabecera-->
        <!--contenido-->
        <br>
        <br><br>
        <div class="dash-content">
            <div class="overview">

                <form action="" method="get">
                    <div class="input-group">
                        <input type="search" name="codigo" placeholder="Buscar Codigo" class="input" autocomplete="off">
                        <input class="button--submit" value="buscar" name="buscar" type="submit">
                    </div>
                </form>
                <br>
                <?php
                if (isset($_GET['buscar'])) {
                    $busqueda = $_GET['codigo'];
                    $sql = "SELECT * FROM cliente where cod_cliente='$busqueda'";
                    //ejecutarla
                    $f = mysqli_query($cn, $sql);
                    while ($r1 = mysqli_fetch_assoc($f)) {

                        ?>
                        <div>
                            <!--averia-->

                            <form action="cajero/p_averia.php" method="post" class="formulario">

                                <i class="fa-regular fa-clipboard"></i><span class="text1"> Registro de Averias</span>
                                <br>
                                <!-- Campos de información -->


                                <select class="input_textual" name="tservicio">
                                    <?php
                                    //armarla
                                    $sqlser = "select * from servicio where estadoservicio=1";

                                    //ejecutarla
                                    $f = mysqli_query($cn, $sqlser);

                                    while ($r2 = mysqli_fetch_assoc($f)) {
                                        ?>

                                        <option value="<?php echo $r2["idservicio"]; ?>" selected><?php echo $r2["nomservicio"]; ?>
                                        </option>


                                        <?php
                                    }

                                    ?>
                                </select>

                                <input type="text" value="<?php echo $r1["cod_cliente"]; ?>" name="codcliente"
                                    class="input_textual" readonly onmousedown="return false;" />

                                <input type="text" value="<?php echo $r1["nombres"]; ?>" name="namecliente" class="input_textual"
                                    readonly onmousedown="return false;" />

                                <input type="text" value="<?php echo $r1["telefono"]; ?>" name="telefono"
                                    class="input_textual" />

                                <input type="text" value="<?php echo $r1["direccion"]; ?>" name="direccion"
                                    class="input_textual" readonly onmousedown="return false;" />

                                <textarea class="input_textual" placeholder="Descripción" name="descripcion" id="descripcion"
                                    cols="20" rows="2"></textarea>

                                <select class="input_textual" name="tecnico">
                                    <?php
                                    //armarla
                                    $sqltec = "select * from personal where id_tipopersonal=3 and estadopersonal=1";

                                    //ejecutarla
                                    $f1 = mysqli_query($cn, $sqltec);

                                    while ($r3 = mysqli_fetch_assoc($f1)) {
                                        ?>

                                        <option value="<?php echo $r3["idpersonal"]; ?>" selected><?php echo $r3["nombre"]; ?>
                                        </option>


                                        <?php
                                    }

                                    ?>
                                </select>


                                <!--Botón para enviar -->
                                <button class="input_boton">
                                    <i class="fa-solid fa-arrow-up-from-bracket fa-flip"></i>

                                </button>
                                <!-- Fin botón para enviar-->

                            </form>

                            <!--averia-->
                        </div>
                        <?php
                    }

                }
                ?>

            </div>
        </div>
    </section>

</body>

</html>