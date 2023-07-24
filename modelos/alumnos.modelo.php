<?php

require_once "conexion.php";

class ModeloAlumnos
{

	/*=============================================
	CREAR ALUMNO
	=============================================*/

	static public function mdlIngresarAlumno($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, opcionOcupacional, condicion, turno, observaciones, nombre, dni, ocupacion, fechaNacimiento, nacionalidad, lugarNacimiento, idioma, correo, institucion, calle, numero, distrito, provincia,departamento, telefono, nombreApoderado, ocupacionApoderado, grado, estadoCivil, nacionalidadApoderado, domicilioApoderado, firma) VALUES (:codigo, :opcionOcupacional, :condicion, :turno, :observaciones, :nombre, :dni, :ocupacion, :fechaNacimiento, :nacionalidad, :lugarNacimiento, :idioma, :correo, :institucion, :calle, :numero, :distrito, :provincia, :departamento, :telefono, :nombreApoderado, :ocupacionApoderado, :grado, :estadoCivil, :nacionalidadApoderado, :domicilioApoderado, :firma)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":opcionOcupacional", $datos["ocupacion"], PDO::PARAM_STR);
		$stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_STR);
		$stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":ocupacion", $datos["ocupacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
		$stmt->bindParam(":lugarNacimiento", $datos["lugarNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":idioma", $datos["idioma"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":institucion", $datos["institucion"], PDO::PARAM_STR);
		$stmt->bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreApoderado", $datos["nombreApoderado"], PDO::PARAM_STR);
		$stmt->bindParam(":ocupacionApoderado", $datos["ocupacionApoderado"], PDO::PARAM_STR);
		$stmt->bindParam(":grado", $datos["gradoApoderado"], PDO::PARAM_STR);
		$stmt->bindParam(":estadoCivil", $datos["estadoCivilApoderado"], PDO::PARAM_STR);
		$stmt->bindParam(":nacionalidadApoderado", $datos["nacionalidadApoderado"], PDO::PARAM_STR);
		$stmt->bindParam(":domicilioApoderado", $datos["domicilioApoderado"], PDO::PARAM_STR);
		$stmt->bindParam(":firma", $datos["firma"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
	}

	/*=============================================
	MOSTRAR ALUMNOS
	=============================================*/

	static public function mdlMostrarAlumnos($tabla, $item, $valor)
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
	// Por Curso
	static public function mdlMostrarAlumnosPorCurso($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} 
	}

	/*=============================================
	EDITAR ALUMNO
	=============================================*/

	static public function mdlEditarAlumno($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET notaUno = :notaUno, notaDos = :notaDos, notaTres = :notaTres, asistencia = :asistencia, mes = :mes WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":notaUno", $datos["notaUno"], PDO::PARAM_INT);
		$stmt->bindParam(":notaDos", $datos["notaDos"], PDO::PARAM_INT);
		$stmt->bindParam(":notaTres", $datos["notaTres"], PDO::PARAM_INT);
		$stmt->bindParam(":asistencia", $datos["asistencia"], PDO::PARAM_INT);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
	}

	static public function mdlEditarAlumnoGestion($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, dni = :dni, correo = :correo, telefono = :telefono, opcionOcupacional = :opcionOcupacional, fechaNacimiento = :fechaNacimiento WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$stmt->bindParam(":opcionOcupacional", $datos["opcionOcupacional"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
	}

	/*=============================================
	ELIMINAR ALUMNO
	=============================================*/

	static public function mdlEliminarAlumno($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
	}

	/*=============================================
	ACTUALIZAR ALUMNO
	=============================================*/

	static public function mdlActualizarAlumno($tabla, $item1, $valor1, $valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
	}
}
