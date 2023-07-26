<?php

class ControladorUbigeo{
	static public function listar($tabla, $valor){
		$respuesta = ModeloUbigeo::mostrar($tabla, $valor);
		return $respuesta;
	}
}