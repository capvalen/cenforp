<?php

// Verificar si se reciben los datos del formulario
if(isset($_POST['alumnoId']) && isset($_POST['sesion']) && isset($_POST['asistencia'])) {

    // Obtener los datos del formulario
    $alumnoId = $_POST['alumnoId'];
    $sesion = $_POST['sesion'];
    $asistencia = $_POST['asistencia'];

    // Realizar la conexión a la base de datos y ejecutar la consulta de actualización
    $conexion = new PDO("mysql:host=localhost;dbname=cenforp", "root", "root");
    $consulta = $conexion->prepare("UPDATE asistencia SET asistencia = :asistencia WHERE alumno_id = :alumnoId");
    $consulta->bindParam(':asistencia', $asistencia, PDO::PARAM_INT);
    $consulta->bindParam(':alumnoId', $alumnoId, PDO::PARAM_INT);
    $consulta->execute();

    // Verificar si la consulta se ejecutó correctamente
    if($consulta) {
        // La asistencia se guardó exitosamente
        echo "Asistencia guardada correctamente";
    } else {
        // Hubo un error al guardar la asistencia
        echo "Error al guardar la asistencia";
    }
} else {
    // No se recibieron los datos esperados del formulario
    echo "Error: Datos incompletos";
}

?>
