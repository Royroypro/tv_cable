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
                        <span class="text">EDITAR USUARIO <i class="fa-solid fa-address-book"></i></span>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                //armarla
                                $sqltec = "select * from cliente where cod_cliente='$cliente'";

                                //ejecutarla
                                $f = mysqli_query($cn, $sqltec);

                                while ($r = mysqli_fetch_assoc($f)) {
                                    ?>
                                    <form action="i_usuario.php" method="post">
                                        <fieldset>
                                            <label>Codigo</label>
                                            <input type="text" id="name" value="<?php echo $r["cod_cliente"]?>" name="codcliente" >


                                            <label>DNI:</label>
                                            <input type="text" id="name" value="<?php echo $r["dni"]?>" name="dni">

                                            <label>Nombre:</label>
                                            <input type="text" id="name" value="<?php echo $r["nombres"]?>" name="nombre">

                                            <label for="email">Correo:</label>
                                            <input type="email" id="mail" value="<?php echo $r["correo"]?>" name="correo">

                                            <label >Nodo:</label>
                                            <select name="lsnodo" >
                                
                                                <?php  
                                                    //armarla
                                                        $sqlnodo="select * from nodo";

                                                    //ejecutarla
                                                        $f1=mysqli_query($cn,$sqlnodo);

                                                        while ($r11=mysqli_fetch_assoc($f1)) {
                                                            $idnodo = $r11["idnodo"];
                                                            $selected = ($idnodo == $r['id_nodo']) ? "selected" : ""; // Cambia $valorSeleccionado con el valor que deseas preseleccionar
                                                            
                                                            ?>
                                                

                                                <option value="<?php echo $idnodo; ?>" <?php echo $selected; ?>><?php echo $idnodo; ?></option>



                                                <?php  
                                                     }

                                                ?>
                                            </select>

                                            <label>Direccion:</label>
                                            <input type="text" id="name" value="<?php echo $r["direccion"]?>" name="direccion">

                                            <label>Telefono:</label>
                                            <input type="text" id="name" value="<?php echo $r["telefono"]?>" name="telefono">
                                            
                                            <label >Estado:</label>
                                            <select name="lsestado" >
                                
                                                <?php                                                     
                                                $selected = ($r['estadocliente']) ? "selected" : "";
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