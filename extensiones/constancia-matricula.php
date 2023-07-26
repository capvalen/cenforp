<?php
require_once( './TCPDF-main/tcpdf.php' );


// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cenforp";

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos de la base de datos
$sql = "SELECT a.*, date_format(registro, '%d/%m/%Y %h:%i %p') as fechaRegistro, o.opcionOcupacional, d.name as nomDepartamento, p.name as nomProvincia, di.name as nomDistrito, na.nacionalidad FROM alumnos a
inner join ocupaciones o on o.id = a.idOcupacion
inner join udepartamentos d on d.id = a.departamento
inner join uprovincias p on p.id = a.provincia
inner join udistritos di on di.id = a.distrito
inner join nacionalidad na on na.id = a.idNacionalidad
 where a.id = {$_GET['id']}";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
$data = $data[0];

// Cerrar la conexión a la base de datos
$conn->close();

// Configuración del PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetMargins(15, 15, 15, true);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(10);
$pdf->AddPage();
$pdf->Image( __DIR__.'/../vistas/img/logo/logo.png' , 0,1,25,25, '', '', '', false, 300, '', false, false, 0, false, false, false);

// Título del reporte
$pdf->SetFont('helvetica', 'B', 16);

$pdf->Cell(0, 10, 'Constancia de matrícula ', 0, 1, 'C');


$pdf->SetFont('helvetica', 'B', 10);
/* $pdf->Cell(0, 0, 'Fecha de reporte: ' . date("d/m/Y") , 0, 1, 'C'); */


// Contenido del reporte
$pdf->Ln(); // Espacio después del título y el logo


//$pdf->writeHTML($p, true, false, false, false, '');


$pdf->Cell(0, 0, 'Datos de la matrícula: ' , 0, 1);
$pdf->SetFont('helvetica', '', 10);


// Generar la tabla con los datos de los alumnos
$table = '<table border="0.5" cellpadding="3" style="border-color: #ccc">
	<tbody>';
	
	$table .=  '<tr>'. '<td>' . "<p><strong>Fecha de registro:</strong> {$data['fechaRegistro']}</p>" . '</td>';
	
	$table .= '<td>' . "<p><strong>Código:</strong> {$data['codigo']}</p>" . '</td>' . '</tr>';
$table .= '</tbody></table>';
$pdf->writeHTML($table, true, false, false, false, '');

$pdf->SetFont('helvetica', 'B', 10);

$pdf->Cell(0, 0, 'Datos del alumno: ' , 0, 1);
$pdf->SetFont('helvetica', '', 10);

$table = '<table border="0.5" cellpadding="3" style="border-color: #ccc">
	<tbody>';
	
	$table .=  '<tr>'. '<td>' . "<p><strong>Nombre:</strong> {$data['nombre']}</p>" . '</td>';
	
	$table .= '<td>' . "<p><strong>Dni:</strong> {$data['dni']}</p>" . '</td>' . '</tr>';
	$table .=  '<tr>'. '<td>' . "<p><strong>F. Nac.:</strong> {$data['fechaNacimiento']}</p>" . '</td>';
	$table .= '<td>' . "<p><strong>Código:</strong> {$data['codigo']}</p>" . '</td>' . '</tr>';
	$table .=  '<tr>'. '<td colspan="2">' . "<p><strong>Dirección:</strong> {$data['calle']} {$data['numero']} {$data['nomDepartamento']} - {$data['nomProvincia']} - {$data['nomDistrito']} </p>" . '</td>' . '</tr>';
	$table .= '<tr>'. '<td>' . "<p><strong>Teléfono:</strong> {$data['telefono']}</p>" . '</td>' . '</tr>';
	$table .=  '<tr>'. '<td>' . "<p><strong>Opcion Ocupacional:</strong> {$data['opcionOcupacional']}</p>" . '</td>';
	$table .= '<td>' . "<p><strong>Condición:</strong> {$data['condicion']}</p>" . '</td>' . '</tr>';
	$table .=  '<tr>'. '<td>' . "<p><strong>Turno:</strong> {$data['turno']}</p>" . '</td>';
	$table .= '<td>' . "<p><strong>Observaciones:</strong> {$data['observaciones']}</p>" . '</td>' . '</tr>';
	$table .=  '<tr>'. '<td>' . "<p><strong>Nacionalidad:</strong> {$data['nacionalidad']}</p>" . '</td>';
	$table .= '<td>' . "<p><strong>Lugar nacimiento:</strong> {$data['lugarNacimiento']}</p>" . '</td>' . '</tr>';
	$table .=  '<tr>'. '<td>' . "<p><strong>Correo:</strong> {$data['correo']}</p>" . '</td>';
	$table .= '<td>' . "<p><strong>Institución anterior:</strong> {$data['institucion']}</p>" . '</td>' . '</tr>';
$table .= '</tbody></table>';
$pdf->writeHTML($table, true, false, false, false, '');

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'Datos del apoderado: ' , 0, 1);
$pdf->SetFont('helvetica', '', 10);

$table = '<table border="0.5" cellpadding="3" style="border-color: #ccc">
	<tbody>';
	
	$table .=  '<tr>'. '<td>' . "<p><strong>Nombre:</strong> {$data['nombreApoderado']}</p>" . '</td>';
	
	$table .= '<td>' . "<p><strong>Ocupación:</strong> {$data['ocupacionApoderado']}</p>" . '</td>' . '</tr>';
	$table .=  '<tr>'. '<td>' . "<p><strong>Grado:</strong> {$data['grado']}</p>" . '</td>';
	$table .= '<td>' . "<p><strong>Estado Civil:</strong> {$data['estadoCivil']}</p>" . '</td>' . '</tr>';
	$table .=  '<tr>'. '<td colspan="2">' . "<p><strong>Domicilio Apoderado:</strong> {$data['domicilioApoderado']} {$data['numero']} {$data['distrito']} - {$data['provincia']} - {$data['departamento']} </p>" . '</td>' . '</tr>';
$table .= '</tbody></table>';
$pdf->writeHTML($table, true, false, false, false, '');

$pdf->Cell(0, 10, 'Firma: ' , 0, 1);
$pdf->Rect(40, 160, 30	, 40, 'D');

// Pie de página con numeración
$pdf->SetY(-15);
$pdf->SetFont('helvetica', 'I', 8);


// Salida del PDF
$pdf->Output('constancia.pdf', 'I');
