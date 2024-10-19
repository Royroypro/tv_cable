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
    <link rel="stylesheet" href="css/adminregistro.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
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
                <!--Usuario-->
                <div class="box box1">
                         <span class="text">REGISTRAR USUARIO <i class="fa-solid fa-address-book"></i></span>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="registro/p_cliente.php" method="post">
                                        <fieldset>
                                            <label >Codigo</label>
                                            <input type="text" id="name" name="codigo">


                                            <label >DNI:</label>
                                            <input type="text" id="name" name="dni">

                                            <label >Nombre:</label>
                                            <input type="text" id="name" name="nombre">

                                            <label for="email">Correo:</label>
                                            <input type="email" id="mail" name="correo">
                                            
                                            <label >Nodo:</label>
                                            <select name="nodo" >
                                
                                                <?php  
                                                    //armarla
                                                        $sqlnodo="select * from nodo ";

                                                    //ejecutarla
                                                        $f1=mysqli_query($cn,$sqlnodo);

                                                        while ($r11=mysqli_fetch_assoc($f1)) {
                                                ?>

                                                    <option value="<?php echo $r11["idnodo"]; ?>"><?php echo $r11["idnodo"]; ?></option>


                                                <?php  
                                                     }

                                                ?>
                                            </select>
                                            
                                            <label >Direccion:</label>
                                            <input type="text" id="name" name="direccion">

                                            <label >Telefono:</label>
                                            <input type="text" id="name" name="telefono">
                                        </fieldset>
                                        <button type="submit">Cargar</button>
                                    </form> 
                                </div>
                            </div>
                    </div>
                <!--Usuario-->
                <!--personal-->
                    <div class="box box1">
                         <span class="text">REGISTRAR PERSONAL <i class="fa-solid fa-users"></i></span>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="registro/p_personal.php" method="post">
                                        <fieldset>
                                            <label >DNI:</label>
                                            <input type="text" id="name" name="dni" autocomplete="off">

                                            <label >Apellidos y Nombres:</label>
                                            <input type="text" id="name" name="nombre" autocomplete="off">

                                            <label for="email">Correo:</label>
                                            <input type="email" id="mail" name="correo" autocomplete="off">

                                            <label >Direccion:</label>
                                            <input type="text" id="name" name="direccion" autocomplete="off">

                                            <label >Telefono:</label>
                                            <input type="text" id="name" name="telefono" autocomplete="off">

                                            <label for="name"> Tipo Personal</label>
                                            <select name="lstipop" >
                                
                                                <?php  
                                                    //armarla
                                                        $sqltec="select * from tipopersonal where estado=1";

                                                    //ejecutarla
                                                        $f=mysqli_query($cn,$sqltec);

                                                        while ($r=mysqli_fetch_assoc($f)) {
                                                ?>

                                                    <option value="<?php echo $r["id_tipopersonal"]; ?>"><?php echo $r["tipopersonal"]; ?></option>


                                                <?php  
                                                     }

                                                ?>
                                            </select>
                                            
                                        </fieldset>
                                        <button type="submit">Cargar</button>
                                    </form> 
                                </div>
                            </div>
                    </div>
                <!--personal-->
                <!--acceso-->
                <div class="box box1">
                         <span class="text">REGISTRAR ACCESO <i class="uil uil-user"></i></span>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="registro/p_acceso.php" method="post">
                                        <fieldset>
                                            <label for="name">Personal</label>
                                                <select id="job" name="personal">       
                                                <?php  
                                                    //armarla
                                                        $sqlper="select * from personal";

                                                    //ejecutarla
                                                        $f=mysqli_query($cn,$sqlper);

                                                        while ($r1=mysqli_fetch_assoc($f)) {
                                                ?>

                                                    <option value="<?php echo $r1["idpersonal"]; ?>"><?php echo $r1["nombre"]; ?></option>


                                                <?php  
                                                     }

                                                ?>
                                                </select>

                                            <label for="email">Usuario:</label>
                                            <input type="text" id="name" name="user_name">

                                            <label for="password">Password:</label>
                                            <input type="text" id="name" name="user_pass">
                                        </fieldset>
                                        <button type="submit">Cargar</button>
                                    </form> 
                                </div>
                            </div>
                    </div>
                <!--acceso-->
                
            </div> 
        </div>
    </div> 
</section>

</body>
</html>