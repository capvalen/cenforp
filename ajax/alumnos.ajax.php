<?php
require_once "../controladores/alumnos.controlador.php";
require_once "../modelos/alumnos.modelo.php";

class AjaxAlumnos{

	/*=============================================
	EDITAR Alumno
	=============================================*/	

	public $idAlumno;
	public $registros;
	public $fecha;

	public function ajaxEditarAlumno(){

		$item = "id";
		$valor = $this->idAlumno;

		$respuesta = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);

		echo json_encode($respuesta);

	}

	public function ajaxRegistrarAsistencia(){
		$registros = $this->registros;
		$fecha = $this->fecha;
		$respuesta  = ModeloAlumnos::mdlRegistrarAsistencia($registros, $fecha);
		if($respuesta) echo 'ok';
		else echo 'error';
	}

	public function ajaxObtenerNotas(){
		$idAlumno = $this->idAlumno;
		$respuesta = ModeloAlumnos::mdlMostrarNotas($idAlumno);
		echo json_encode($respuesta);
	}

}

if(isset($_POST['tipo'])){
	//var_dump($_POST); die();
	if($_POST['tipo']=='registrarAsistencia'){
		$alumno = new AjaxAlumnos();
		$alumno->registros =  json_decode($_POST['idAlumnos'], true);
		$alumno->fecha = $_POST['fecha'];
		$alumno -> ajaxRegistrarAsistencia();
	}
	if($_POST['tipo']=='notas'){
		$alumno = new AjaxAlumnos();
		$alumno->idAlumno =  $_POST['idAlumno'];
		$alumno -> ajaxObtenerNotas();
	}
}else if(isset($_POST["idAlumno"])){

	$alumno = new AjaxAlumnos();
	$alumno -> idAlumno = $_POST["idAlumno"];
	$alumno -> ajaxEditarAlumno();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
	//$directorio = "C:\laragon_mysql\www\cenforp\vistas\img\uploads";
	$directorio = dirname(__DIR__).'/vistas/dist/img/uploads/';

	$tipoArchivo = strtolower(pathinfo( $directorio . basename($_FILES["archivo"]["name"]) ,PATHINFO_EXTENSION));
	$queArchivo = uniqid() . "." . $tipoArchivo;
	$archivoFinal = $directorio . $queArchivo; //basename($_FILES["archivo"]["name"]);

	if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivoFinal)) {
		//echo "The file ". htmlspecialchars( basename( $_FILES["archivo"]["name"])). " has been uploaded.";
		//echo $queArchivo;
		echo json_encode(array('archivo'=> $queArchivo));
	} else {
		echo "Error subida".$_FILES["archivo"]["error"];
	}
}