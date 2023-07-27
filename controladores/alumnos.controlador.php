<?php

class ControladorAlumnos
{
	/*=============================================
	CREAR ALUMNOS
	=============================================*/

	static public function ctrCrearAlumno()
	{

		//var_dump($_POST); die();
		if (isset($_POST["nuevoCodigo"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigo"])
			) {

				$tabla = "alumnos";

				$datos = array(
					"codigo" => strtoupper($_POST["nuevoCodigo"]),
					"curso" => strtoupper($_POST["nuevoOcupacion"]),
					"condicion" => strtoupper($_POST["nuevoCondicion"]),
					"turno" => strtoupper($_POST["nuevoTurno"]),
					"observaciones" => strtoupper($_POST["nuevoObservaciones"]),
					"idOcupacion" => $_POST["nuevoOcupacion"],
					"nombre" => strtoupper($_POST["nuevoNombre"]),
					"apellido" => strtoupper($_POST["nuevoApellido"]),
					"estadoCivil" => strtoupper($_POST["nuevoEstadoCivil"]),
					"dni" => strtoupper($_POST["nuevoDNI"]),
					"ocupacion" => strtoupper($_POST["nuevoOcupacion"]),
					"fechaNacimiento" => $_POST["nuevaFechaNacimiento"],
					"idNacionalidad" => intval($_POST["nuevoNacionalidad"]),
					"lugarNacimiento" => strtoupper($_POST["nuevoLugarNacimiento"]),
					"idioma" => strtoupper($_POST["nuevoIdioma"]),
					"correo" => strtoupper($_POST["nuevoCorreo"]),
					"institucion" => strtoupper($_POST["nuevoInstitucion"]),
					"calle" => strtoupper($_POST["nuevoCalle"]),
					"numero" => strtoupper($_POST["nuevoNumero"]),
					"distrito" => strtoupper($_POST["nuevoDistrito"]),
					"provincia" => strtoupper($_POST["nuevoProvincia"]),
					"departamento" => strtoupper($_POST["nuevaDepartamento"]),
					"telefono" => $_POST["nuevoTelefono"],
					"nombreApoderado" => strtoupper($_POST["nuevaNombreApoderado"]),
					"ocupacionApoderado" => strtoupper($_POST["nuevaOcupacionApoderado"]),
					"gradoApoderado" => strtoupper($_POST["nuevaGradoApoderado"]),
					"estadoCivilApoderado" => strtoupper($_POST["nuevoEstadoCivilApoderado"]),
					"nacionalidadApoderado" => strtoupper($_POST["nuevaNacionalidadApoderado"]),
					"domicilioApoderado" => strtoupper($_POST["nuevaDomicilioApoderado"]),
					"firma" => strtoupper($_POST["nuevaFirma"])
				);

				$respuestaID = ModeloAlumnos::mdlIngresarAlumno($tabla, $datos);

				if ( $respuestaID>0 ) {

					echo '<script>

					swal({
						  type: "success",
						  title: "El alumno ha sido guardado correctamente",
						  showConfirmButton: true,
						  showCancelButton: false,
						  confirmButtonText: "Ver Constancia"
						  }).then(function(result){
								if (result.value) {
								window.open( "extensiones/constancia-matricula.php?id='.$respuestaID.'", "blank");
								}
							})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El alumno no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "alumnos";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR ALUMNOS
	=============================================*/

	static public function ctrMostrarAlumnos($item, $valor)
	{

		$tabla = "alumnos";

		$respuesta = ModeloAlumnos::mdlMostrarAlumnos($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarAlumnoPorCurso($item, $valor)
	{

		$tabla = "alumnos";

		$respuesta = ModeloAlumnos::mdlMostrarAlumnosPorCurso($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ALUMNO
	=============================================*/

	static public function ctrEditarAlumnoNotas()
	{

		if (isset($_POST["editarAlumno"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAlumno"]) &&
				preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"])
			) {

				$tabla = "alumnos";

				$datos = array(
					"id" => $_POST["idAlumno"],
					"nombre" => $_POST["editarAlumno"],
					"dni" => $_POST["editarDocumentoId"],
					"notaUno" => $_POST["editarNotaUno"],
					"notaDos" => $_POST["editarNotaDos"],
					"notaTres" => $_POST["editarNotaTres"],
					"asistencia" => $_POST["editarAsistencia"],
					"mes" => $_POST["editarMes"],
					
				);

				$respuesta = ModeloAlumnos::mdlEditarAlumno($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La nota del alumno ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cursoNotas";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La nota del alumno no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cursoNotas";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	EDITAR ALUMNO
	=============================================*/

	static public function ctrEditarAlumnoAsistencia()
	{

		if (isset($_POST["editarAlumno"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAlumno"]) &&
				preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"])
			) {

				$tabla = "alumnos";

				$datos = array(
					"id" => $_POST["idAlumno"],
					"nombre" => $_POST["editarAlumno"],
					"dni" => $_POST["editarDocumentoId"],
					"notaUno" => $_POST["editarNotaUno"],
					"notaDos" => $_POST["editarNotaDos"],
					"notaTres" => $_POST["editarNotaTres"],
					"asistencia" => $_POST["editarAsistencia"],
					"mes" => $_POST["editarMes"],
				);

				$respuesta = ModeloAlumnos::mdlEditarAlumno($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La asistencia del alumno ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "asistenciaCurso";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La asistencia del alumno no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "asistenciaCurso";

							}
						})

			  	</script>';
			}
		}
	}
	static public function ctrEditarAlumnoGestion()
	{

		if (isset($_POST["editarAlumno"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAlumno"]) &&
				preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"])
			) {

				$tabla = "alumnos";

				$datos = array(
					"id" => $_POST["idAlumno"],
					"nombre" => $_POST["editarAlumno"],
					"dni" => $_POST["editarDocumentoId"],
					"correo" => $_POST["editarEmail"],
					"telefono" => $_POST["editarTelefono"],
					"opcionOcupacional" => $_POST["editarOcupacion"],
					"fechaNacimiento" => $_POST["editarFechaNacimiento"],
				);

				$respuesta = ModeloAlumnos::mdlEditarAlumnoGestion($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "El alumno ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "alumnos";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El alumno no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "alumnos";

							}
						})

			  	</script>';
			}
		}
	}
	/*=============================================
	ELIMINAR ALUMNO
	=============================================*/

	static public function ctrEliminarAlumno()
	{
		if (isset($_GET["idAlumno"])) {

			$tabla = "alumnos";
			$datos = $_GET["idAlumno"];


			$respuesta = ModeloAlumnos::mdlEliminarAlumno($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El alumno ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "alumnos";

								}
							})

				</script>';
			}
		}
	}
}
