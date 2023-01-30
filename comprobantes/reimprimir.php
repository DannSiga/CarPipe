<?php
// Include the main TCPDF library (search for installation path).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');


//cargar el encabezado
$query_informacions = $pdo->prepare("SELECT * FROM tb_informacion WHERE estado = '1' ");
$query_informacions->execute();
$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
foreach($informacions as $informacion){
    $id_informacion = $informacion['id_inf'];
    $nombre = $informacion['nombre_inf'];
    $actividad = $informacion['actividad'];
    $direccion = $informacion['direccion'];
    $telefono = $informacion['telefono'];
}



//cargar la información del ticket desde el id
$id_ticket_get = $_GET['id'];
$query_tickets = $pdo->prepare("SELECT * FROM comprobante WHERE id_compr = '$id_ticket_get' AND estado = '1' ");
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
}


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(80,100), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('Comprobante');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);

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
<p  style="text-align: center">
<h3>----- '.$nombre.' ----> </h3> <br>
<b>'.$actividad.' </b><br>
Dirección: '.$direccion.',<br>
Teléfono: '.$telefono.'<br>
-------------------------------------------------------------------------------
<div style ="text-align: center"></div>
<b><b>Datos del Cliente</b><br>
<div style="text-align: left">
<b> Sr(a): '.$nombre_cli.'</b> <br> <br>
<b> Teléfono: '.$telefono.'</b> <br>
</div>
-------------------------------------------------------------------------------
<div style ="text-align:center"></div>
<b><b>Datos del Ingreso</b><br>
<div style="text-align: left">
<b>Cubículo: '.$cubiculo.'</b><br>
<b>Fecha:'.$fecha_ingreso.'</b><br> 
<b>Hora:'.$hora_ingreso.'</b><br> 
<b>Responsable: '.$usuario_sesion.'</b><br>
</div>

</div>
</p>



</div>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');








//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
