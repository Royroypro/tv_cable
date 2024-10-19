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
                                $sqltec = "select * from personal where idpersonal ='$cliente'";

                                //ejecutarla
                                $f = mysqli_query($cn, $sqltec);

                                while ($r = mysqli_fetch_assoc($f)) {
                                    ?>
                                    <form action="i_personal.php" method="post">
                                        <fieldset>
                                            <label >DNI:</label>
                                            <input type="text" id="name" name="dni"  value="<?php echo $r["dni"]; ?>" autocomplete="off">

                                            <label >Apellidos y Nombres:</label>
                                            <input type="text" id="name" name="nombre" value="<?php echo $r["nombre"]; ?>" autocomplete="off">

                                            <label for="email">Correo:</label>
                                            <input type="email" id="mail" name="correo" value="<?php echo $r["correo"]; ?>"autocomplete="off">

                                            <label >Direccion:</label>
                                            <input type="text" id="name" name="direccion" value="<?php echo $r["direccion"]; ?>" autocomplete="off">

                                            <label >Telefono:</label>
                                            <input type="text" id="name" name="telefono" value="<?php echo $r["telefono"]; ?>" autocomplete="off">

                                            <label for="name"> Tipo Personal</label>
                                            <select name="lstipop" >
                                
                                                <?php  
                                                    //armarla
                                                    $sqltec="select * from tipopersonal where estado=1";

                                                    //ejecutarla
                                                    $f=mysqli_query($cn,$sqltec);

                                                    while ($r11=mysqli_fetch_assoc($f)) {
                                                            $idnodo = $r11["id_tipopersonal"];
                                                            $selected = ($idnodo == $r['id_tipopersonal']) ? "selected" : ""; // Cambia $valorSeleccionado con el valor que deseas preseleccionar
                                                            
                                                            ?>
                                                

                                                <option value="<?php echo $idnodo; ?>" <?php echo $selected; ?>><?php echo $r11['tipopersonal']; ?></option>



                                                <?php  
                                                     }

                                                ?>
                                            </select>
                                            <input type="hidden" id="acticuloId" name="idpersonal" value="<?php echo $r["idpersonal"]; ?>" />
                                            <select name="lsestado" >
                                
                                                <?php                                                     
                                                $selected = ($r['estadopersonal']) ? "selected" : "";
                                                ?>
                                                <option value="0"<?php echo $selected; ?>>Inactivo</option>
                                                <option value="1"<?php echo $selected; ?>>Activo</option>
    
                                            </select>



                                        </fieldset>
                                        <button type="submit">Cargar</button>
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