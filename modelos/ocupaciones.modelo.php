<?php

require_once "conexion.php";

class ModeloOcupacionales
{

	/*=============================================
	CREAR OCUPACION
	=============================================*/

	static public function mdlIngresarOcupacional($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(opcionOcupacional) VALUES (:ocupacion)");

		$stmt->bindParam(":ocupacion", $datos, PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
	}

	/*=============================================
	MOSTRAR OCUPACIONES
	=============================================*/

	static public function mdlMostrarOcupacional($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}
	}

	/*=============================================
	EDITAR OCUPACION
	=============================================*/

	static public function mdlEditarOcupacional($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET opcionOcupacional = :ocupacion WHERE id = :id");

		$stmt->bindParam(":ocupacion", $datos["ocupacion"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
	}

	/*=============================================
	BORRAR OCUPACION
	=============================================*/

	static public function mdlBorrarOcupacional($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
	}
}
