<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Digital</title>
   <link rel="icon" type="image/x-icon" href="icono/logoempresa.ico">
   <link rel="stylesheet" href="css/login.css" type="text/css">

   
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

         <label for="tipo_personal">Tipo de Personal</label>
            <select class="form-control" id="tipo_personal" name="tipo_personal">
               <?php
                  include("conexion.php");

                  // Consulta para obtener los tipos de personal
                  $sql = "SELECT id_tipopersonal, tipopersonal FROM tipopersonal WHERE estado = 1";
                  $result = $cn->query($sql);

                  // Generar las opciones del select
                  while ($row = $result->fetch_assoc()) {
                     echo '<option value="' . $row['id_tipopersonal'] . '">' . $row['tipopersonal'] . '</option>';
                  }
               ?>
            </select>
            
         <input class="btn" type="submit" name="btningresar" value="INICIAR SESION">
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
