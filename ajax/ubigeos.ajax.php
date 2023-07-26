<?php

require_once "../controladores/ubigeo.controlador.php";
require_once "../modelos/ubigeo.modelo.php";

class AjaxUbigeo{
	public $idFiltro;
	public $tabla;

	public function ajaxListar(){
		$respuesta = ControladorUbigeo::listar($this->tabla, $this->idFiltro);
		echo json_encode($respuesta);
	}
}


if(isset($_POST['tipo'])){
		$provincia = new AjaxUbigeo();
		$provincia->tabla = $_POST['tipo'];
		$provincia->idFiltro = $_POST['id'];
		$provincia->ajaxListar();
}