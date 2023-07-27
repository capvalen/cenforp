<?php

if ($_SESSION["perfil"] == "Docente") {

	echo '<script>

		window.location = "asistenciaCurso";

	</script>';

	return;
}

?>

<div class="content-wrapper">

	<div class="">

		<div class="modal-content-">

			<form role="form" method="post" enctype="multipart/form-data">

				<!--=====================================
		CABEZA DEL MODAL
		======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white;">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title" style="background:#3c8dbc; color:white; font-size: 30px;">Agregar alumno</h4>

				</div>

				<!--=====================================
		CUERPO DEL MODAL
		======================================-->

		<div class="modal-body">

			<div class="box-body">
				<div class="row">
					<div class="col-xs-12 col-md-12  ">
						<div class="box box-primary ">
							<div class="box-header">
								<h4 class="text-primary">Código de Matricula</h4>
							</div>
							<div class="box-body">
								<!-- ENTRADA PARA EL CÓDIGO -->
								<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-code"></i></span>
									<input type="text" class="form-control text-uppercase input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="101" >
								</div>
								</div>
								<!-- ENTRADA PARA SELECCIONAR OCUPACION -->
								<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th"></i></span>
									<select class="form-control input-lg" id="nuevoOcupacion" name="nuevoOcupacion" >
										<option value="">Seleccionar ocupación</option>
										<?php
										$item = null;
										$valor = null;
										$categorias = ControladorOcupaciones::ctrMostrarOcupaciones($item, $valor);
										foreach ($categorias as $key => $value) {
											echo '<option value="' . $value["id"] . '">' . $value["opcionOcupacional"] . '</option>';
										}
										?>
									</select>
								</div>
								</div>
								<!-- <div class="form-group">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control input-lg" name="nuevoCurso" placeholder="Ingresar Curso Taller" >
								</div>
								</div> -->
								<!-- ENTRADA PARA EL ESTADO CIVIL -->
								<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th"></i></span>
									<select class="form-control input-lg" name="nuevoCondicion" >
										<option value="">Seleccionar condición</option>
										<option value="Becado">Becado</option>
										<option value="Regular">Regular</option>
									</select>
								</div>
								</div>
								<!-- ENTRADA PARA EL TURNO -->
								<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th"></i></span>
									<select class="form-control input-lg" name="nuevoTurno" >
										<option value="">Seleccionar turno</option>
										<option value="Mañana">Mañana</option>
										<option value="Tarde">Tarde</option>
										<option value="Noche">Noche</option>
									</select>
								</div>
								</div>
								<!-- ENTRADA PARA EL Obervaciones  -->
								<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="text" class="form-control text-uppercase input-lg" name="nuevoObservaciones" placeholder="Ingresar observaciones">
								</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-xs-12 col-md-6 ">
						<div class="box box-primary">
							<div class="box-header">
								<h4 class="text-primary">Datos personales</h4>
							</div>
							<div class="box-body">
								<!-- ENTRADA PARA EL NOMBRE y APELIIDOS -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevoApellido" placeholder="Ingresar apellidos" >
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevoNombre" placeholder="Ingresar nombres" >
									</div>
								</div>
								<!-- ENTRADA PARA EL ESTADO CIVIL -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th"></i></span>
										<select class="form-control input-lg" name="nuevoEstadoCivil" >
											<option value="">Seleccionar ocupación del estudiante</option>
											<option value="Estudiante">Estudiante</option>
											<option value="Ama De Casa">Ama De Casa</option>
											<option value="Trabajador Independiente">Trabajador Independiente</option>
											<option value="Desempleado">Desempleado</option>
											<option value="Otro">Otro</option>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevoDNI" placeholder="Ingresar DNI" data-inputmask="'mask':'99999999'" data-mask >
									</div>
								</div>
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th"></i></span>
										<select class="form-control input-lg" name="nuevoOcupacionEstudiante" >
											<option value="">Seleccionar estado civil</option>
											<option value="Soltero">Soltero</option>
											<option value="Casado">Casado</option>
											<option value="Divorciado">Divorciado</option>
											<option value="Conviviente">Conviviente</option>
										</select>
									</div>
								</div>
								
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th"></i></span>
										<select class="form-control input-lg" name="nuevoNacionalidad" >
											<option value="">Seleccionar nacionalidad</option>
											<option value="1">Peruana</option>
											<option value="2">Venezolana</option>
											<option value="3">Otra</option>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask >
									</div>
								</div>	
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevoLugarNacimiento" placeholder="Ingresar lugar de nacimiento" >
									</div>
								</div>
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th"></i></span>
										<select class="form-control input-lg" name="nuevoIdioma" >
											<option value="">Seleccionar idioma</option>
											<option value="Español">Español</option>
											<option value="Otra">Otra</option>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevoCorreo" placeholder="Ingresar correo electronico" >
									</div>
								</div>
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevoInstitucion" placeholder="Ingresar nombre de la institución anterior" >
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 ">
						<div class="box box-primary">
							<div class="box-header">
								<h4 class="text-primary">Domicilio del participante</h4>
							</div>
							<div class="box-body">
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home"></i></span>
										<input type="text" class="form-control input-lg" name="nuevoCalle" placeholder="Ingresar calle" >
									</div>
								</div>
								<!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home"></i></span>
										<input type="text" class="form-control input-lg" name="nuevoNumero" placeholder="Ingresar numero de la calle" >
									</div>
								</div>
								<!-- ENTRADA PARA EL DEPARTAMENTO -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										<select class="form-control input-lg" id="nuevaDepartamento" name="nuevaDepartamento"  onchange="cambiarDepartamento()">
											<option value="">Seleccionar departamento</option>
										<?php
										$departamentos = ControladorUbigeo::listar('departamentos', null);
										foreach ($departamentos as $key => $value) {
											echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
										}
										?>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA LA PROVINCIA -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home"></i></span>
										<select class="form-control input-lg" id="nuevoProvincia" name="nuevoProvincia"  onchange="cambiarProvincia()">
											<option value="">Seleccionar provincia</option>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA EL DISTRITO -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-home"></i></span>
										<select class="form-control input-lg" id="nuevoDistrito" name="nuevoDistrito" >
											<option value="">Seleccionar provincia</option>
										</select>
									</div>
								</div>
								
								
								<!-- ENTRADA PARA EL TELÉFONO -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										<input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'999999999'" data-mask >
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-12 ">
						<div class="box box-primary">
							<div class="box-header">
								<h4 class="text-primary">Datos personales del padre/apoderado</h4>
							</div>
							<div class="box-body">
								<!-- ENTRADA PARA LA DIRECCIÓN -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevaNombreApoderado" placeholder="Ingresar nombre y apellidos" >
									</div>
								</div>
								<!-- ENTRADA PARA LA DIRECCIÓN -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th"></i></span>
										<select class="form-control input-lg" name="nuevaOcupacionApoderado" >
											<option value="">Seleccionar ocupación del apoderado</option>
											<option value="Trabajador Dependiente">Trabajador dependiente</option>
											<option value="Ama De Casa">Ama De Casa</option>
											<option value="Trabajador Independiente">Trabajador Independiente</option>
											<option value="Desempleado">Desempleado</option>
											<option value="Otro">Otro</option>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA LA GRADO APODERADO -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th"></i></span>
										<select class="form-control input-lg" name="nuevaGradoApoderado" >
											<option value="">Seleccionar grado de instrucción del apoderado</option>
											<option value="Primaria">Primaria</option>
											<option value="Secundaria">Secundaria</option>
											<option value="Superior Tecnico">Superior Tecnico</option>
											<option value="Superior Universitario">Superior Universitario</option>
											<option value="Otro">Otro</option>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA LA DIRECCIÓN -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th"></i></span>
										<select class="form-control input-lg" name="nuevoEstadoCivilApoderado" >
											<option value="">Seleccionar estado civil del apoderado</option>
											<option value="Soltero">Soltero</option>
											<option value="Casado">Casado</option>
											<option value="Divorciado">Divorciado</option>
											<option value="Conviviente">Conviviente</option>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA LA DIRECCIÓN -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th"></i></span>
										<select class="form-control input-lg" name="nuevaNacionalidadApoderado" >
											<option value="">Seleccionar nacionalidad del apoderado</option>
											<option value="Peruana">Peruana</option>
											<option value="Venezolano">Venezolano</option>
											<option value="Otra">Otra</option>
										</select>
									</div>
								</div>
								<!-- ENTRADA PARA LA DIRECCIÓN -->
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevaDomicilioApoderado" placeholder="Ingresar domicilio" >
									</div>
								</div>
								<!-- ENTRADA PARA LA DIRECCIÓN -->
								<div class="form-group hidden">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										<input type="text" class="form-control text-uppercase input-lg" name="nuevaFirma" placeholder="Ingresar firma">
									</div>
								</div>
								<!-- ENTRADA PARA EL ARCHIVO ADJUNTO -->
								<!-- <label for="">Vocuher de pago:</label>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										<input type="file" class="form-control input-lg" name="nuevoArchivo" placeholder="Adjuntar archivo">
									</div>
								</div> -->
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

	</div>

		<!--=====================================
		PIE DEL MODAL
		======================================-->

		<div class="modal-footer">

			<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

			<button type="submit" class="btn btn-primary">Guardar matricula</button>

		</div>

		</form>

		<?php

		$crearAlumno = new ControladorAlumnos();
		$crearAlumno->ctrCrearAlumno();

		?>

	</div>

</div>


</div>
