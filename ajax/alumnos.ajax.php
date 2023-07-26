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

		$item = "";
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

}

if(isset($_POST["idAlumno"])){

	$alumno = new AjaxAlumnos();
	$alumno -> idAlumno = $_POST["idAlumno"];
	$alumno -> ajaxEditarAlumno();
}
if(isset($_POST['tipo'])){
	//var_dump($_POST); die();
	if($_POST['tipo']=='registrarAsistencia'){
		$alumno = new AjaxAlumnos();
		$alumno->registros =  json_decode($_POST['idAlumnos'], true);
		$alumno->fecha = $_POST['fecha'];
		$alumno -> ajaxRegistrarAsistencia();
	}
}