<?php
// Include the main TCPDF library (search for installation path).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include("../app/config.php");

//carga encabezado
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


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(80,110), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 002');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(6, 5, 6);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica','', 8);

// add a page
$pdf->AddPage();
$html = '
<div>
<p  style="text-align: center">
<h1>'.$nombre.'</h1> <br>
------------------------------------------------------------------------
<b>'.$actividad.' </b><br>
Dirección: '.$direccion.',<br>
Teléfono: '.$telefono.'<br>
------------------------------------------------------------------------<br>
<div style ="text-align: left">
<b>Datos del Cliente</b><br>
<b> Sr(a):</b> <br>
<b> NIT: </b> <br>
</div>
------------------------------------------------------------------------<br>
<div style ="text-align: left">
<b>Fecha de Ingreso:</b> <br>
<b>Hota de Ingreso:</b><br>
<b>Cuviculo:</b><br>
</div>
------------------------------------------------------------------------<br>
<div style ="text-align: left">
<b>Responsable:</br><b>
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
