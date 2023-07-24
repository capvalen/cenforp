<?php

require_once "../controladores/alumnos.controlador.php";
require_once "../modelos/alumnos.modelo.php";

class AjaxAlumnos{

	/*=============================================
	EDITAR Alumno
	=============================================*/	

	public $idAlumno;

	public function ajaxEditarAlumno(){

		$item = "id";
		$valor = $this->idAlumno;

		$respuesta = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR Alumno
=============================================*/	

if(isset($_POST["idAlumno"])){

	$alumno = new AjaxAlumnos();
	$alumno -> idAlumno = $_POST["idAlumno"];
	$alumno -> ajaxEditarAlumno();

}