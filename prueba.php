
<?php
include("conexion.php");
$id=$_GET["cod"];
                    //armarla                        
                    $sqlpersonal = "SELECT * FROM averia 
                        INNER JOIN personal ON averia.idpersonal =personal.idpersonal 
                        INNER JOIN servicio ON averia.idservicio =servicio.idservicio
                        INNER JOIN cliente ON averia.cod_cliente =cliente.cod_cliente 
                        WHERE averia.id_averia='$id'";
                    //ejecutarla
                    $f = mysqli_query($cn, $sqlpersonal);

                    while ($r1 = mysqli_fetch_assoc($f)) {

                        ?>
                        <div class="overlay" id="overlay">
                            <div class="popupContent">
                                <h2>Servicio</h2>
                                <p> <?php echo $r1["nomservicio"]; ?></p>
                                <br>
                                <h5>N° Orden</h5>
                                <p> <?php 
                                $numero = $r1["id_averia"];
                                $numeroFormateado = sprintf("%05d", $numero);
                                echo $numeroFormateado; ?></p>
                                <h5>Usuario</h5>
                                <p><?php echo $r1["nombres"]; ?></p>
                                <h5>Direccion</h5>
                                <p><?php echo $r1["direccion"]; ?></p>
                                <h5>QR</h5>
                                <p><img src="qrcliente/<?php echo $r1["id_averia"]?>.jpg" width="80" height="80"></p>
                                <h5>Celular</h5>
                                <p><?php echo $r1["telefono1"]; ?></p>
                                <h5>Tecnico</h5>
                                <p><?php 
                                $tecnico=$r1["tecnico"];
                                $sqltecnico="SELECT * FROM personal WHERE idpersonal='$tecnico'";
                                $f1 = mysqli_query($cn, $sqltecnico);

                                while ($r2 = mysqli_fetch_assoc($f1)) {
                                echo $r2["nombre"]; } ?> </p>


                                <button id="closePopup">Cerrar</button>
                            </div>
                        </div>
                        <script src="js/ventana.js"></script>
                        <?php 
                             }
                            
                        ?>
