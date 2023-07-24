<?php
require_once('tcpdf_include.php');

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
$sql = "SELECT codigo, nombre, dni, ocupacion, asistencia, mes FROM alumnos";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        

        $data[] = [
            'codigo' => $row["codigo"],
            'nombre' => $row["nombre"],
            'documento' => $row["dni"],
            'ocupacion' => $row["ocupacion"],
            'asistencia' => $row["asistencia"],
            'mes' => $row["mes"],
            
        ];
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

$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Instructor: Leopoldo Méndez Sanchez- Turno: Mañana', 0, 1, 'C');


// Contenido del reporte
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln(20); // Espacio después del título y el logo

// Generar la tabla con los datos de los alumnos
$table = '<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Documento ID</th>
            <th>Ocupación</th>
            <th>Asistencia</th>
            <th>Mes</th>
            
        </tr>
    </thead>
    <tbody>';

foreach ($data as $key => $row) {
    $table .= '<tr>';
    $table .= '<td>' . ($key + 1) . '</td>';
    $table .= '<td>' . $row["codigo"] . '</td>';
    $table .= '<td>' . $row["nombre"] . '</td>';
    $table .= '<td>' . $row["documento"] . '</td>';
    $table .= '<td>' . $row["ocupacion"] . '</td>';
    $table .= '<td>' . $row["asistencia"] . '</td>';
    $table .= '<td>' . $row["mes"] . '</td>';

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
