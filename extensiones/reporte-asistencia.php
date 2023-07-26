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
if(isset($_GET['idOcupacion']))
	$sql = "SELECT codigo, nombre, dni, ocupacion, asistencia, mes FROM alumnos a inner join ocupaciones o on o.id = a.idOcupacion WHERE idOcupacion = {$_GET['idOcupacion']};";
else if(isset($_GET['idAlumno']))
	$sql = "SELECT  a.*, u.nombre as nomDocente FROM alumnos a inner join ocupaciones o on o.id = a.idOcupacion
	inner join usuarios u on u.idOcupacion = a.idOcupacion WHERE a.id = {$_GET['idAlumno']};";
else
	$sql = "SELECT codigo, nombre, dni, ocupacion, asistencia, mes FROM alumnos a inner join ocupaciones o on o.id = a.idOcupacion";
$result = $conn->query($sql);

$data = array();
$dataFechas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

		$fechas = "SELECT *, case presente when '1' then 'Presente' else 'Falta' end as estado  FROM asistencias a WHERE idAlumno ={$_GET['idAlumno']}; ";
		$resFechas = $conn->query($fechas);
		while($rowF = $resFechas->fetch_assoc() ){
			$dataFechas[] = $rowF;
		}
}
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

// Título del reporte
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de Registro de Asistencia ', 0, 1, 'C');

// Logo
$pdf->Image('ruta_del_logo.png', 15, 20, 30, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Instructor: '.$data[0]["nomDocente"].'- Turno: '.$data[0]['turno'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Alumno: '.$data[0]["nombre"] , 0, 1, 'L');


// Contenido del reporte
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln(); // Espacio después del título y el logo

// Generar la tabla con los datos de los alumnos
$table = '<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>';

foreach ($dataFechas as $key=> $row) {
    $table .= '<tr>';
    $table .= '<td>' . ($key + 1) . '</td>';
    $table .= '<td>' . $row["fecha"] . '</td>';
    $table .= '<td>' . $row['estado'] . '</td>';

    $table .= '</tr>';
}

$table .= '</tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

// Pie de página con numeración
$pdf->SetY(-15);
$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(0, 10, 'Página ' . $pdf->getAliasNumPage() . ' de ' . $pdf->getAliasNbPages(), 0, false, 'C');

// Salida del PDF
$pdf->Output('reporte.pdf', 'I');
