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
    <link rel="stylesheet" href="css/material.css" type="text/css">
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
            <div>
                 <!--material-->
                
                 <form action="registro/p_material.php" method="post" class="formulario">
                        
                        <i class="fa-regular fa-clipboard"></i><span class="text1"> Registro de Material</span>
                            <br>
                            <!-- Campos de información -->
                            
                            <input type="text"  placeholder="Nombre del material"  name="nmaterial" class="input_textual"/>
                            
                            <input type="number"  placeholder="Cantidad" class="input_textual" name="Cantidad"/>
                            
                            <textarea class="input_textual" placeholder="Descripción" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
    
                            <!--Botón para enviar -->
                            <button class="input_boton">
                            <i class="fa-solid fa-arrow-up-from-bracket fa-flip"></i>
                                
                            </button>
                            <!-- Fin botón para enviar-->
      
                        </form>
                    
                    <!--material-->
            </div>
            <br>
            <br>
            <div>
                <!--material-->
                
                <form action="registro/p_servicio.php" method="post" class="formulario">
                        
                <i class="fa-brands fa-teamspeak fa-beat-fade"></i></i><span class="text1"> Registro Tipos de Servicio</span>
                            <br>
                            <!-- Campos de información -->
                            
                            <input type="text"  placeholder="Nombre del Servicio"  name="nservicio" class="input_textual" autocomplete="off"/>

                            <!--Botón para enviar -->
                            <button class="input_boton">
                                <i class="fa-solid fa-arrow-right-to-bracket fa-beat" aria-hidden="true"></i>
                                
                            </button>
                            <!-- Fin botón para enviar-->
      
                        </form>
                    
                    <!--material-->

            </div>   
        </div>
    </div> 
</section>

</body>
</html>