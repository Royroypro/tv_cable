<?php

include("administrador.html");
include("conexion.php");
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
    <link rel="stylesheet" href="css/editarpersonal.css" type="text/css">
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
            <div class="input-group">
                <form action="" method="get">
                    <input type="search" class="input" id="Email" name="dni" placeholder="Dni" autocomplete="off">
                    <input class="button--submit" name="buscar" value="Buscar" type="submit">
                </form>

            </div>
            <br>
            <div>
                <div class="maxw content">
                    <div class="cuerpo">
                        <p>
                        <div class="formulario">
                            <div class="slide">

                                <div class="item">
                                    <h3>Información personal</h3>
                                    <div class="campos">
                                        <?php
                                        if (isset($_GET['buscar'])) {
                                            $busqueda = $_GET['dni'];
                                            $sql = "SELECT *, tipopersonal.tipopersonal FROM personal 
                                            INNER JOIN tipopersonal ON personal.id_tipopersonal =tipopersonal.id_tipopersonal where personal.dni='$busqueda'";
                                            //ejecutarla
                                            $f = mysqli_query($cn, $sql);
                                            while ($r1 = mysqli_fetch_assoc($f)) {
                                                //separar nombres
                                                $junto = $r1['nombre'];
                                                $partes = explode(" ", $junto);
                                                $apellido1 = $partes[0];
                                                $apellido2 = $partes[1];
                                                $nombre1 = $partes[2];
                                                $nombre2 = $partes[3];
                                                ?>
                                                <aside>
                                                    <a >  
                                                        <img width="95" height="95" src="pngpersonal/<?php echo $r1["idpersonal"]; ?>.png" >     
                                                    </a>
                                                    <a href="#">
                                                        <svg class="huella" src="pngpersonal/<?php echo $r1["idpersonal"]; ?>.png" width="90"
                                                            height="90" viewBox="0 0 24 24">
                                                        </svg>
                                                        <span>Registrar huella digital</span>
                                                    </a>
                                                </aside>
                                                <form action="p_fotopersonal.php" method="post" enctype="multipart/form-data">
                                                    <div class="doble">
                                                        <div class="campo">
                                                            <label for="apellido">Apellido*</label>
                                                            <input required type="text"
                                                                value="<?php echo $apellido1 . ' ' . $apellido2; ?>"
                                                                id="apellido" readonly />
                                                        </div>
                                                        <div class="campo">
                                                            <label for="nombre">Nombre*</label>
                                                            <input required type="text"
                                                                value="<?php echo $nombre1 . ' ' . $nombre2; ?>" id="nombre"
                                                                readonly />
                                                        </div>
                                                    </div>
                                                    <div class="doble">
                                                        <div class="campo">
                                                            <label for="dni">DNI*</label>
                                                            <input required type="number" value="<?php echo $r1["dni"]; ?>"
                                                                min="0" id="dni" readonly />
                                                        </div>
                                                        <div class="campo">
                                                            <label for="cuil">Cargo</label>
                                                            <input type="text" value="<?php echo $r1["tipopersonal"]; ?>"
                                                                min="0" id="cuil" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="doble">
                                                        <div class="campo">
                                                            <label for="celular">Celular*</label>
                                                            <input required type="tel" value="<?php echo $r1["telefono"]; ?>"
                                                                minlength="10" maxlength="14" id="celular" readonly />
                                                        </div>
                                                        <div class="campo">
                                                            <label for="email">Email</label>
                                                            <input type="email" value="<?php echo $r1["correo"]; ?>"
                                                                pattern="[^ @]+@[^ @]+.[a-z]+" id="email" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="doble">
                                                        
                                                            <div class="campo">

                                                                <label for="email">Subir Foto PNG</label>
                                                                <input type="file" name="archivo">
                                                                <input type="hidden" name="cod" value="<?php echo $r1["idpersonal"]; ?>"/>
                                                            </div>
                                                            <div class="campo">
                                                                <br>
                                                                <button class="bookmarkBtn">
                                                                        <span class="IconContainer">
                                                                            <svg viewBox="0 0 384 512" height="0.9em"
                                                                                class="icon">
                                                                                <i
                                                                                    class="fa-solid fa-arrow-up-from-bracket"></i>
                                                                            </svg>
                                                                        </span>

                                                                        <p class="text1">Subir</p>
                                                                    </button>
                                                            </div>
                                                    </div>
                                                </form>
                                                <?php
                                            }

                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            </p>
                        </div>
                    </div>


                </div>
    </section>

</body>

</html>