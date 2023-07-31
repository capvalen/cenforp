<?php

require_once "conexion.php";

class ModeloAlumnos
{

	/*=============================================
	CREAR ALUMNO
	=============================================*/

	static public function mdlIngresarAlumno($tabla, $datos)
	{

		$conexion = Conexion::conectar();
		$stmt = $conexion ->prepare("INSERT INTO $tabla(codigo, idOcupacion, condicion, turno, observaciones, nombre, apellidos, dni, ocupacion, fechaNacimiento, idNacionalidad, lugarNacimiento, idioma, correo, institucion, calle, numero, distrito, provincia,departamento, telefono, nombreApoderado, ocupacionApoderado, grado, estadoCivil, nacionalidadApoderado, domicilioApoderado, firma, voucher) VALUES
		(:codigo, :idOcupacion, :condicion, :turno, :observaciones, 
		:nombre, :apellido, :dni, :ocupacion, :fechaNacimiento, :idNacionalidad, 
		:lugarNacimiento, :idioma, :correo, :institucion, :calle, 
		:numero, :distrito, :provincia, :departamento, :telefono, 
		:nombreApoderado, :ocupacionApoderado, :grado, :estadoCivil, :nacionalidadApoderado, 
		:domicilioApoderado, :firma, :adjunto)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":idOcupacion", $datos["idOcupacion"], PDO::PARAM_STR);
		$stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_STR);
		$stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":ocupacion", $datos["ocupacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":idNacionalidad", $datos["idNacionalidad"], PDO::PARAM_INT);

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
		$stmt->bindParam(":adjunto", $datos["adjunto"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return $conexion -> lastInsertId();
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

			$stmt = Conexion::conectar()->prepare("SELECT a.*, date_format(registro, '%d/%m/%Y %h:%i %p') as fechaRegistro, o.opcionOcupacional FROM alumnos a
			inner join ocupaciones o on o.id = a.idOcupacion order by apellidos asc");

			$stmt->execute();

			return $stmt->fetchAll();
		}
	}

	static public function mdlMostrarNotas($idAlumno){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM  notas where idAlumno = :idAlumno ");
		$stmt->bindParam(":idAlumno" , $idAlumno, PDO::PARAM_INT);
		$stmt->execute();

		$datos = Conexion::conectar()->prepare("SELECT * FROM  alumnos where id = :idAlumno ");
		$datos->bindParam(":idAlumno" , $idAlumno, PDO::PARAM_INT);
		$datos->execute();
		$alumno = $datos->fetchAll();

		$sent = Conexion::conectar()->prepare('SELECT * FROM configuraciones WHERE campo = "cantidadNotas"');
		$sent -> execute();
		$cantidadNotas = $sent->fetchAll();
		return array ('notas' => $stmt->fetchAll(), 'cantidadNotas'=> $cantidadNotas[0]['valor'], 'alumno'=> $alumno[0]);
	}
	// Por Curso
	static public function mdlMostrarAlumnosPorCurso($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT t.*, o.opcionOcupacional FROM $tabla t inner join ocupaciones o on o.id = t.idOcupacion WHERE $item = :$item order by apellidos asc ");

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


	static public function mdlEditarNotas($idAlumno, $datos)
	{
		$borrarNotas = Conexion::conectar()->prepare("DELETE FROM `notas` WHERE idAlumno = :id");
		$borrarNotas->bindParam(":id", $idAlumno, PDO::PARAM_INT);
		$fin = $borrarNotas->execute();

		foreach ($datos as $dato) {
			$stmt = Conexion::conectar()->prepare("INSERT INTO `notas`(`idAlumno`, `nota`) VALUES (:idAlumno, :nota);");
			$stmt->bindParam(":idAlumno", $idAlumno, PDO::PARAM_INT);
			$stmt->bindParam(":nota", $dato, PDO::PARAM_INT);
			$stmt->execute();
		}
		

		if($fin){ return "ok"; }
		else { return "error"; }

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
	static public function mdlRegistrarAsistencia($registros, $fecha){
		//var_dump($registros);die();
		foreach ($registros as $registro) {
			$stmt = Conexion::conectar()->prepare("INSERT INTO `asistencias`( `idAlumno`, `fecha`, `presente`) VALUES ( :id, :fecha, :presente);
			UPDATE `alumnos` SET `asistencia` = `asistencia` + :presente WHERE `alumnos`.`id` = :id; 
			");

			$stmt->bindParam(":id", $registro['id'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
			$stmt->bindParam(":presente", $registro['presente'], PDO::PARAM_STR);
			$stmt->bindParam(":id", $registro['id'], PDO::PARAM_STR);
			$stmt->bindParam(":presente", $registro['presente'], PDO::PARAM_STR);
			$stmt->execute();
		}
		return 'ok';
		//else return 'error';
	}
}
