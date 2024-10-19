<?php

include("administrador.html");
include("conexion.php");
include("auth.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital</title>
    <link rel="icon" type="image/x-icon" href="icono/logoempresa.ico">
    <link rel="stylesheet" href="css/tablatefa.css" type="text/css">
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
            <!--personal-->
            <div>
                 <center><h2>Personal</h2></center>
                <table class="listado">
                    <thead>
                        <tr>
                            <th>
                                <h1>Dni</h1>
                            </th>
                            <th>
                                <h1>Nombre</h1>
                            </th>
                            <th>
                                <h1>Correo</h1>
                            </th>
                            <th>
                                <h1>Direccion</h1>
                            </th>
                            <th>
                                <h1>Telefono</h1>
                            </th>
                            <th>
                                <h1>Personal</h1>
                            </th>
                            <th colspan="2">
                                <h1>Opciones</h1>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //armarla                        
                        $sqlpersonal = "SELECT *, tipopersonal.tipopersonal FROM personal 
                                                INNER JOIN tipopersonal ON personal.id_tipopersonal =tipopersonal.id_tipopersonal";
                        //ejecutarla
                        $f = mysqli_query($cn, $sqlpersonal);

                        while ($r1 = mysqli_fetch_assoc($f)) {

                            ?>
                            <tr>
                                <td>
                                    <?php echo $r1["dni"]; ?>
                                </td>
                                <td>
                                    <?php echo $r1["nombre"]; ?>
                                </td>
                                <td>
                                    <?php echo $r1["correo"]; ?>
                                </td>
                                <td>
                                    <?php echo $r1["direccion"]; ?>
                                </td>
                                <td>
                                    <?php echo $r1["telefono"]; ?>
                                </td>
                                <td>
                                    <?php echo $r1["tipopersonal"]; ?>
                                </td>
                                <td class="icono"><a href="editaradmin/editarpersonal.php?cod=<?php echo $r1["idpersonal"]; ?>"
                                        target="_parent">
                                        <center><i class="fa-regular fa-pen-to-square fa-shake fa-sm"></i></center>
                                    </a>
                                </td>
                                <td class="icono"><a href="certificado.php?cod=<?php echo $r1["idpersonal"]; ?>"
                                        target="_parent">
                                        <center><i class="fa-solid fa-trash fa-flip"></i></center>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
             <!--Acceso-->
             <div>
                 <center><h2>Acceso</h2></center>
                <table class="listado">
                    <thead>
                        <tr>
                            <th>
                                <h1>Nombre Personal</h1>
                            </th>
                            <th>
                                <h1>Nombre</h1>
                            </th>
                            <th>
                                <h1>Password</h1>
                            </th>
                            <th colspan="2">
                                <h1>Opciones</h1>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //armarla                        
                        $sqlacceso = "SELECT * FROM acceso 
                        INNER JOIN personal ON acceso.idpersonal =personal.idpersonal";
                        //ejecutarla
                        $f = mysqli_query($cn, $sqlacceso);

                        while ($r2 = mysqli_fetch_assoc($f)) {

                            ?>
                            <tr>
                                <td>
                                    <?php echo $r2["nombre"]; ?>
                                </td>
                                <td>
                                    <?php echo $r2["usuario"]; ?>
                                </td>
                                <td>
                                    <?php echo $r2["password"]; ?>
                                </td>
                                <td class="icono"><a href="editaradmin/editaracceso.php?cod=<?php echo $r2["idacceso"]; ?>"
                                        target="_parent">
                                        <center><i class="fa-regular fa-pen-to-square fa-shake fa-sm"></i></center>
                                    </a>
                                </td>
                                <td class="icono"><a href="certificado.php?cod=<?php echo $r2["id-acceso"]; ?>"
                                        target="_parent">
                                        <center><i class="fa-solid fa-trash fa-flip"></i></center>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
                   
        </div>
    </section>

</body>

</html>