<?php 

include("conexion.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital</title>
   <link rel="icon" type="image/x-icon" href="icono/logoempresa.ico">
   <link rel="stylesheet" href="css/login.css" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login-container">
        <img src="img/logoempresa.png" alt="Avatar">
        <h2>BIENVENIDO</h2>

        <form method="post" action="proceso_login.php">
            <label for="usuario">Usuario</label>
            <input id="usuario" type="text" name="usuario">

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password">
                <select name="lstipo" >
                                
                        <?php  
                            //armarla
                            $sql="select * from tipopersonal";

                            //ejecutarla
                            $f=mysqli_query($cn,$sql);

                            while ($r=mysqli_fetch_assoc($f)) {

                            ?>

                            <option value="<?php echo $r["id-tipopersonal "]; ?>"><?php echo $r["tipopersonal"]; ?></option>


                            <?php  
                                     }

                            ?>
                    </select>

                    <button class="btn">
                    <i class="fa-solid fa-arrow-right-to-bracket fa-beat" style="color: #f9fafb;"></i><span>  Ingresar</span> 
                    
                                
                            </button>
                        
        </form>
        <div class="forgot-password">
            <a class="font-italic isai5" href="" onclick="alert('Por favor, contacta al administrador para recuperar tu contraseña.');">Olvidé mi contraseña</a>

        </div>

        <div class="signup-link">
            <!--<a class="font-italic isai5" href="">Registrarse</a>-->
        </div>
    </div>
</body>
</html>