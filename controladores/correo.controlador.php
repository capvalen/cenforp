<?php

class ControladorCorreo
{
	/*=============================================
	CREAR ALUMNOS
	=============================================*/

	static public function ctrCrearCorreo()
	{
		if (isset($_POST["nuevoMensaje"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMensaje"])
			) {

				$datos = array(
					"correoTo" => $_POST["nuevoCorreoTo"],
					"correoFrom" => $_POST["nuevoEmailFrom"],
					"asunto" => $_POST["nuevoAsunto"],
					"mensaje" => $_POST["nuevoMensaje"]
				);

				$respuesta = ModeloCorreo::mdlIngresarCorreo($datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "El correo ha sido enviado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "correo";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El correo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "correo";

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
