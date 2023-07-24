<?php

class ControladorOcupaciones{

	/*=============================================
	CREAR OCUPACIONES
	=============================================*/

	static public function ctrCrearOcupacion(){

		if(isset($_POST["nuevaOcupacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaOcupacion"])){

				$tabla = "ocupaciones";

				$datos = $_POST["nuevaOcupacion"];

				$respuesta = ModeloOcupacionales::mdlIngresarOcupacional($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La ocupación ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ocupaciones";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La ocupación no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ocupaciones";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR OCUPACIONES
	=============================================*/

	static public function ctrMostrarOcupaciones($item, $valor){

		$tabla = "ocupaciones";

		$respuesta = ModeloOcupacionales::mdlMostrarOcupacional($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR OCUPACION
	=============================================*/

	static public function ctrEditarOcupacion(){

		if(isset($_POST["editarOcupacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarOcupacion"])){

				$tabla = "ocupaciones";

				$datos = array("ocupacion"=>$_POST["editarOcupacion"],
							   "id"=>$_POST["idOcupacion"]);

				$respuesta = ModeloOcupacionales::mdlEditarOcupacional($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La ocupación ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ocupaciones";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La ocupación no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cursos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR OCUPACION
	=============================================*/

	static public function ctrBorrarOcupacion(){

		if(isset($_GET["idOcupacion"])){

			$tabla ="ocupaciones";
			$datos = $_GET["idOcupacion"];

			$respuesta = ModeloOcupacionales::mdlBorrarOcupacional($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La ocupación ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ocupaciones";

									}
								})

					</script>';
			}
		}
		
	}
}
