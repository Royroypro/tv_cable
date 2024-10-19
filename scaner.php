<?php
include("conexion.php");
include("Tecnico.html");
include("auth.php");
$id = $_GET["cod"];

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
    <link rel="stylesheet" href="css/material1.css" type="text/css">
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
                <?php


                $sql = "SELECT * FROM averia WHERE id_averia='$id'";
                //ejecutarla
                $f = mysqli_query($cn, $sql);
                while ($r1 = mysqli_fetch_assoc($f)) {

                    ?>
                    <div>
                        <!--averia-->

                        <form action="tecnico/i_material.php" method="post" class="formulario">

                            <i class="fa-regular fa-clipboard"></i><span class="text1"> Registro de Averias</span>
                            <br>
                            <!-- Campos de información -->

                            <input type="hidden" value="<?php echo $r1["id_averia"]; ?>" name="codaveria"
                                class="input_textual" readonly onmousedown="return false;" />

                            <input type="hidden" value="<?php echo $r1["estado"]; ?>" name="estadoaveria"
                                class="input_textual" readonly onmousedown="return false;" />
                            <center>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Material</th>
                                        <th>Cantidad</th>
                                        
                                    </tr>
                                </thead>

                                <?php
                                //armarla
                                $sqltec = "SELECT * FROM material WHERE estado='1'";
                                //ejecutarla
                                $f1 = mysqli_query($cn, $sqltec);
                                while ($r3 = mysqli_fetch_assoc($f1)){
                                    
                                    echo "<tbody>";
                                    echo '<tr>';
                                    echo '<td>' . $r3["tipmaterial"] . '</td>';
                                    echo '<td><input type="number" name="cantidad[' . $r3["id_material"] . ']" value="0" min="0" step="1"></td>';
                                    echo '</tr>';
                                            
                                    echo "</tbody>";
                                    }
                                    ?>
                                   

                                    
                            </table>
                            </center>
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
                ?>
            </div>
        </div>
    </section>

</body>

</html>