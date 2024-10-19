<?php
include("cajero(a).html");
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
    <link rel="stylesheet" href="css/tabla2.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
            <form action="" method="get">
                <div class="input-group">
                    <select name="estado">
                        <option value="0">Pendiente</option>
                        <option value="1">Completado</option>
                        <option value="2">Rechazado</option>
                        <input class="button--submit" value="buscar" name="buscar" type="submit">
                </div>
            </form>

            <?php
                if (isset($_GET['buscar'])) {
                    $busqueda = $_GET['estado'];
                    $sqlpersonal = "SELECT * FROM averia 
                    INNER JOIN personal ON averia.idpersonal =personal.idpersonal 
                    INNER JOIN servicio ON averia.idservicio =servicio.idservicio
                    INNER JOIN cliente ON averia.cod_cliente =cliente.cod_cliente
                    where estado='$busqueda'
                   ";
                    //ejecutarla
                    $f = mysqli_query($cn, $sqlpersonal);

                   

                        ?>
                        <div>

            <div id="page-wrap">

                <center>
                    <h1>INFORME</h1>
                </center>



                <table>
                    <thead>
                        <tr>
                            <th>N° Averia</th>
                            <th>Servicio</th>
                            <th>Cliente</th>
                            <th>Telefono</th>
                            <th>Estado</th>
                            <th>Fecha Registro</th>
                            <th>Mas</th>
                            <th>Enviar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //armarla                        
                        while ($fila = mysqli_fetch_assoc($f)):
                            ?>

                            <tr>
                                <td>
                                    <?php
                                    $numero = $fila["id_averia"];
                                    $numeroFormateado = sprintf("%05d", $numero);
                                    echo $numeroFormateado;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $fila["nomservicio"]; ?>
                                </td>
                                <td>
                                    <?php echo $fila["nombres"]; ?>
                                </td>
                                <td>
                                    <?php echo $fila["telefono1"]; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($fila["estado"] == '0') {
                                        echo "Pendiente";
                                    } 
                                    
                                    else if ($fila["estado"] == '1'){
                                        echo 'Completado';
                                    }else{
                                        echo 'Rechazado';  
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $fila["fechaaveria"]; ?>
                                </td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#cajeroeditar<?php echo $fila['id_averia']; ?>">
                                            <i class="fa fa-edit "></i>
                                        </button>
                                        <?php include("cajeroeditar.php"); ?>
                                    </center>
                                </td>
                                <td>

                                    <center>
                                        <a href="ticket.php?cod=<?php echo $fila['id_averia']; ?>"><i
                                                class="fa-regular fa-file-pdf fa-beat" style="color: #ff0019;"></i></a>
                                    </center>
                                </td>



                            </tr>

                        <?php endwhile; ?>

                    </tbody>


                </table>

            </div>
        <?php } ?>
        </div>
        <!--contenido-->
    </section>

</body>

</html>