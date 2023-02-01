<?php
// Include the main TCPDF library (search for installation path).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');


//cargar el encabezado
$query_informacions = $pdo->prepare("SELECT * FROM tb_informacion WHERE estado = '1' ");
$query_informacions->execute();
$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
foreach($informacions as $informacion){
    $id_inf = $informacion['id_inf'];
    $nombre = $informacion['nombre_inf'];
    $actividad = $informacion['actividad'];
    $direccion = $informacion['direccion'];
    $telefono = $informacion['telefono'];
}

$query_tickets = $pdo->prepare("SELECT * FROM comprobante WHERE estado = '1' ");
$query_tickets->execute();
$tickets = $query_tickets->fetchAll(PDO::FETCH_ASSOC);
foreach($tickets as $ticket){
    $id_ticket = $ticket['id_compr'];
    $nombre_cli = $ticket['nombre'];
    $telefono = $ticket['telefono'];
    $cubiculo = $ticket['cubiculo'];
    $fecha_ingreso = $ticket['fecha_ingreso'];
    $hora_ingreso = $ticket['hora_ingreso'];
    $usuario_sesion = $ticket['responsable'];
    //$observacion = $ticket['observ'];
}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,170), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('CARIPE');
$pdf->setTitle('FACTURA CLIENTE');
$pdf->setSubject('CARPIPE FACTURA');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 2, 5);

// set auto page breaks
$pdf->setAutoPageBreak(true, 5);


// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();




// create some HTML content
$html = '
<div>
    <p style="text-align: center">
        <b>'.$nombre.'</b> <br>
        <b>'.$actividad.' </b><br>
        Dirección: '.$direccion.',<br>
        Teléfono: '.$telefono.'<br>
        --------------------------------------------------------------------------------
         <b>FACTURA No.</b> 00001
        --------------------------------------------------------------------------------
        <div style="text-align: left">
           
            <b>DATOS DEL CLIENTE</b> <br>
            <b>SEÑOR(A): </b> '.$nombre_cli.'<br>
            <b> Teléfono: '.$telefono.'</b> <br>
            <b>Fecha de la factura: </b> 11 de octubre de 2022  <br>
            -------------------------------------------------------------------------------- <br>
        <b>Ingreso: </b> '.$fecha_ingreso.' <b>Hora: </b> '.$hora_ingreso.'<br>
        <b>Cubicúlo '.$cubiculo.'<br>
        <b>Salida: </b> '.' <b>Hora: </b> '.'<br>

         -------------------------------------------------------------------------------- <br>
         <table border="1" cellpadding="3" s>
         <tr>
            <td style="text-align: center" width="99px"><b>Diagnostico</b></td>    
            <td style="text-align: center" width="45px"><b>Cantidad</b></td>    
            <td style="text-align: center" width="45px"><b>Total</b></td>    
         </tr>
         <tr>
            <td>Diagnostico</td>
            <td style="text-align: center">1</td>
            <td style="text-align: center">Bs. 10</td>
         </tr>
         </table>
         <p style="text-align: right">
         <b>Monto Total: </b> Bs. 10 </b>
        </p>
        <p>
            <b>Son: </b>Diez 00/100 Bs.
        </p>
        <br>
         -------------------------------------------------------------------------------- <br>
         <b>Responsable:</b>'.$usuario_sesion.' <br><br><br><br><br><br><br><br><br><br><br><br>
         
        <p style="text-align: center">
        </p>
        <p style="text-align: center">"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LA LEY"
        </p>
        <p style="text-align: center"><b>GRACIAS POR SU PREFERENCIA</b></p>
        
        </div>
    </p>
    

</div>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$QR = 'Factura realizada por el sistema de paqueo HILARI WEB, al cliente Freddy Hilari con nit: 837737277323 
con el vehiculo con numero de placa 3983FREDD y esta factura se genero en 21 de octubre de 2022 a hr: 18:00';
$pdf->write2DBarcode($QR,'QRCODE,L',  22,105,35,35, $style);




//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
