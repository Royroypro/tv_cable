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
    <link rel="stylesheet" href="../css/material1.css" type="text/css">

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
                                $sqltec = "select * from material where id_material ='$cliente'";

                                //ejecutarla
                                $f = mysqli_query($cn, $sqltec);

                                while ($r = mysqli_fetch_assoc($f)) {
                                    ?>
                                    <form action="i_material.php" method="post">
                                        <i class="fa-regular fa-clipboard"></i><span class="text1"> Registro de
                                            Material</span>
                                        <br>
                                        <!-- Campos de información -->

                                        <input type="text" placeholder="Nombre del material" name="nmaterial" value="<?php echo$r['tipmaterial'];?>"
                                            class="input_textual" />

                                        <input type="number" placeholder="Cantidad" class="input_textual" name="Cantidad" value="<?php echo$r['cantidad'];?>" />

                                        <textarea class="input_textual" placeholder="Descripción" name="descripcion"
                                            id="descripcion" cols="30" rows="10"><?php echo$r['descripccion'];?></textarea>
                                        
                                        <input type="hidden" id="acticuloId" name="idmaterial" value="<?php echo $r["id_material"]; ?>" />
                                        <!--Botón para enviar -->
                                        <button class="input_boton">
                                            <i class="fa-solid fa-arrow-up-from-bracket fa-flip"></i>

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