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
$sql = "SELECT a.*, o.opcionOcupacional , c.valor FROM alumnos a 
inner join ocupaciones o on o.id = a.idOcupacion 
JOIN configuraciones c WHERE idOcupacion ={$_GET['idOcupacion']};";
$result = $conn->query($sql);

$data = array();
$tdNotas='';

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$totalNotas = $row['valor'];
		$sqlNotas = $conn->query("SELECT * FROM notas where idAlumno = {$row['id']};");
		$i=0;
		$promedio = 0;
		$suma = 0; $calificaciones = [];
		while( $resultado = $sqlNotas->fetch_assoc()){
			$calificaciones[] = $resultado;
			$suma += intval( $resultado['nota'] );
		}
		
		$promedio = $suma / $totalNotas;
		$estado = ($promedio >= 10.5) ? 'Aprobado' : 'Desaprobado';

		$data[] = [
			'idAlumno' => $row["id"],
			'codigo' => $row["codigo"],
			'nombre' => $row["nombre"],
			'documento' => $row["dni"],
			'ocupacion' => $row["ocupacion"],
			'mes' => $row["mes"],
			'promedio' => number_format($promedio, 2, '.'),
			'estado' => $estado,
			'opcionOcupacional' => $row["opcionOcupacional"],
			'calificaciones' => $calificaciones,
			'cantNotas' => count($calificaciones)
			
		];
	}
	//echo json_encode($data); die();
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
$pdf->Image( __DIR__.'../../../../vistas/img/logo/logo.png' , 0,1,25,25, '', '', '', false, 300, '', false, false, 0, false, false, false);

// Título del reporte
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de Notas', 0, 1, 'C');

// Logo
$pdf->Image('ruta_del_logo.png', 15, 20, 30, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Instructor: Leopoldo Méndez Sanchez- Turno: Mañana', 0, 1, 'C');
$pdf->Cell(0, 10, 'Curso: ' . $data[0]['opcionOcupacional'], 0, 1, 'C');

// Contenido del reporte
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln(10); // Espacio después del título y el logo

//Cabeceras de TD
$tdCabecera = '';
for($i=0; $i<$totalNotas; $i++){
	$tdCabecera .= '<th> Nota'. $i+1 .'</th>';
}

// Generar la tabla con los datos de los alumnos
$table = '<table border="1" cellpadding="5">
	<thead>
		<tr>
			<th>#</th>
			<th>Código</th>
			<th>Nombre</th>
			<th>Documento ID</th>' . $tdCabecera .
			'<th>Promedio</th>
			<th>Estado</th>
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
	for($i=0; $i<$totalNotas; $i++){
		if($i<$row['cantNotas']){
			$table .= '<td>' . $row["calificaciones"][$i]['nota'] . '</td>';
		}else
			$table .= '<td> 0 </td>';
	}

	$table .= '<td>' . $row["promedio"] . '</td>';
	$table .= '<td>' . $row["estado"] . '</td>';
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
