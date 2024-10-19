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
                                $sqltec = "select * from acceso where idacceso='$cliente'";

                                //ejecutarla
                                $f = mysqli_query($cn, $sqltec);

                                while ($r = mysqli_fetch_assoc($f)) {
                                    ?>
                                    <form action="i_acceso.php" method="post">
                                        <fieldset>
                                            <label for="name">Personal</label>
                                                <select id="job" name="personal">       
                                                <?php  
                                                    //armarla
                                                        $sqlper="select * from personal";

                                                    //ejecutarla
                                                        $f=mysqli_query($cn,$sqlper);

                                                        while ($r11=mysqli_fetch_assoc($f)) {
                                                            $idnodo = $r11["idpersonal"];
                                                            $selected = ($idnodo == $r['idpersonal']) ? "selected" : "";
                                                ?>

                                                        <option value="<?php echo $idnodo; ?>" <?php echo $selected; ?>><?php echo $r11["nombre"]; ?></option>


                                                <?php  
                                                     }

                                                ?>
                                                </select>
                                                

                                            <label for="email">Usuario:</label>
                                            <input type="text" id="name" name="user_name" value="<?php echo $r['usuario'];?>">

                                            <label for="password">Password:</label>
                                            <input type="text" id="name" name="user_pass" value="<?php echo $r['password'];?>">
                                            <input type="hidden" id="acticuloId" name="idacceso" value="<?php echo $r["idacceso"]; ?>" />
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