<?php

require_once "conexion.php";

class ModeloCorreo
{

	/*=============================================
	CREAR ALUMNO
	=============================================*/

	static public function mdlIngresarCorreo($datos)
	{

		$to = $datos["correoTo"];
		$subject = $datos["asunto"];
		$message = $datos["mensaje"];
		$headers = "From: ". $datos["correoFrom"] ."\r\n" . "CC:" . $datos["correoTo"];

		var_dump($datos);
		if (mail($to, $subject, $message, $headers)) {

			return "ok";
		} else {

			return "error";
		}
	}
}
