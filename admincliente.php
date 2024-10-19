<?php
include("conexion.php");
include("administrador.html");
include("auth.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital</title>
    <link rel="icon" type="image/x-icon" href="icono/logoempresa.ico">
    <link rel="stylesheet" href="css/tabla.css" type="text/css">
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
                <div class="boxes">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="search" name="codigo" placeholder="Buscar Codigo" class="input"
                                autocomplete="off">
                            <input class="button--submit" value="buscar" name="buscar" type="submit">
                        </div>
                    </form>

                    <!--usuario-->
                    <div>


                        <h2>Usuario</h2>
                        <div class="tbl-header">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Dni</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Estado</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tbl-content">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                    <?php
                                    if (isset($_GET['buscar'])) {
                                        $busqueda = $_GET['codigo'];
                                        $sql = "SELECT * FROM cliente where cod_cliente='$busqueda'";
                                        //ejecutarla
                                        $f = mysqli_query($cn, $sql);
                                        while ($r = mysqli_fetch_assoc($f)) {

                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $r['cod_cliente'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['dni'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['nombres'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['direccion'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['telefono'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['estadocliente'] == '0') {
                                                        echo 'Inactivo';
                                                    } else {
                                                        echo 'Activo';
                                                    }

                                                    ?>
                                                </td>
                                                <td><a href="editaradmin/editarcliente.php?cod=<?php echo $r["cod_cliente"]; ?>"
                                                        target="_parent">
                                                        <i class="fa-regular fa-pen-to-square fa-shake fa-sm"></i>
                                                        
                                                    </a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php
                                    }

                                    ?>
                    <!--usuario-->

                </div>
            </div>
        </div>
    </section>

</body>

</html>