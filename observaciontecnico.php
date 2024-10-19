<?php

include("Tecnico.html");
include("conexion.php");
$id = $_GET["cod"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital</title>
    <link rel="icon" type="image/x-icon" href="icono/logoempresa.ico">
    <link rel="stylesheet" href="css/comentario.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <section class="dashboard">
        <!--cabecera-->
        <div class="top">
            <i class="fa-solid fa-wrench"></i>
            <div class="search">
                <span class="text">aldair yojan</span>
                </span>
                <img src="img/logo.png" alt="">
            </div>
        </div>
        <!--cabecera-->
        <!--contenido-->
        <br>
        <br><br>
        <Center>
            <?php
            include("conexion.php");
            $sql = "SELECT * FROM averia WHERE id_averia='$id'";
            $f = mysqli_query($cn, $sql);

            while ($r = mysqli_fetch_assoc($f)):
                $tecnico = $r['idpersonal'];
                ?>


                <div class="dash-content">

                    <div class="overview">
                        <div class="card">
                            <div class="card-header">
                                <img class="user-image" src="img/logoempresa.png">
                                <div class="card-content">
                                    <p class="likes">Cajero(a):
                                        <?php
                                        $sqlcajero = "SELECT * FROM personal WHERE idpersonal='$tecnico'";
                                        $f1 = mysqli_query($cn, $sqlcajero);
                                        $r1 = mysqli_fetch_assoc($f1);
                                        echo $r1['nombre'];
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card-image">
                                <img src="img/retra.jpg" width="100%">
                            </div>
                            <div class="card-content">
                                <p class="likes">Descripcion</p>
                                <p>
                                    <?php echo $r['detalle'] ?>
                                </p>

                                <hr>
                            </div>
                            <form action="tecnico/p_comentario.php" method="post">
                                <div class="card-actions">
                                    <a href="#" class="action-icons"><i class="fa-regular fa-heart"></i></i></a>
                                    <textarea class="comments-input" placeholder="Añade un Comentario..." name="Observacion"
                                        value="" cols="35" rows="4"><?php echo $r["observacion"] ?></textarea>
                                    <input type="hidden"  name="idaveria" value="<?php echo $r["id_averia"]; ?>"  >
                                    <style>
                                        .transparent-button {
                                            background-color: transparent;
                                            border: none;
                                            /* Para eliminar el borde */
                                            padding: 0;
                                            /* Para eliminar el espaciado interno */
                                        }
                                    </style>
                                    <button class="transparent-button"><i class="fa-regular fa-paper-plane fa-shake fa-lg" style="color: #ff0000;"></i></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            <?php endwhile; ?>

    </section>

</body>

</html>