<?php

require_once "../controladores/ocupaciones.controlador.php";
require_once "../modelos/ocupaciones.modelo.php";

class AjaxOcupaciones{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idOcupacion;

	public function ajaxEditarOcupacion(){

		$item = "id";
		$valor = $this->idOcupacion;

		$respuesta = ControladorOcupaciones::ctrMostrarOcupaciones($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idOcupacion"])){

	$ocupacion = new AjaxOcupaciones();
	$ocupacion -> idOcupacion = $_POST["idOcupacion"];
	$ocupacion -> ajaxEditarOcupacion();
}
