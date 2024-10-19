<?php

include("conexion.php");
$id=$_GET["cod"];

	# Incluyendo librerias necesarias #
    require "./code128.php";

    $pdf = new PDF_Code128('P','mm',array(80,240));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
#consulta base de datos #
$sql = "SELECT * FROM averia 
                        INNER JOIN personal ON averia.idpersonal =personal.idpersonal 
                        INNER JOIN servicio ON averia.idservicio =servicio.idservicio
                        INNER JOIN cliente ON averia.cod_cliente =cliente.cod_cliente 
                        WHERE id_averia=$id";
                        $f=mysqli_query($cn,$sql);

                        $r=mysqli_fetch_assoc($f);
                        $qrname=$r["id_averia"];
                        $direcqr="qrcliente/".$id.".jpg";
                            
    # Encabezado y datos de la empresa #
    
    $pdf->SetFont('Arial','B',18);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("ORDEN DE TRABAJO")),0,'C',false);
    $pdf->SetFont('Arial','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln(3);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("CABLE DIGITAL TV ")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("RUC: 20537026945"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Dirección: Av.Tupac Amaru N° 2701 - Carabayllo km.19 Lima - Lima"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: 922516174 - 922123945"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: digital@live.com"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y", strtotime("13-09-2022"))." ".date("h:s A")),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Caja Nro: ".$r["idpersonal"]),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Cajero:" .$r["nombre"]),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro: ".$r["id_averia"])),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Cliente:".$r["nombres"]),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Documento: DNI ".$r["dni"]),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: ".$r["telefono1"]),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Dirección: ".$r["direccion"]),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);


    /*----------  Detalles de la tabla  ----------*/
    $pdf->MultiCell(0,4,utf8_decode("Tipo de averia"),0,'C',false);
    $pdf->Ln(2);
    $pdf->MultiCell(0,4,utf8_decode($r["nomservicio"]),0,'C',false);
    $pdf->Ln(4);
    $pdf->MultiCell(0,4,utf8_decode("Descripccion"),0,'C',false);
    $pdf->Ln(2);
    $pdf->MultiCell(0,4,utf8_decode($r["detalle"]),0,'C',false);
    $pdf->Ln(7);
    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

        $pdf->Ln(5);


    $pdf->MultiCell(0,5,utf8_decode("¡Gracias por pertenecer a Cable Digital TV Persu SAC! Disfruta de la mejor calidad de imagen y sonido con nuestra amplia variedad de canales al igual que nuestro servicio de Internet. ¡Siga gozando la experiencia de entretenimiento que te mereces!"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("¡Feliz dia!"),'',0,'C');

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Image($direcqr,20,200,40,40,"jpg");
    
    $pdf->SetXY(0,$pdf->GetY()+21);

   
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_".$r["id_averia"].".pdf",true);