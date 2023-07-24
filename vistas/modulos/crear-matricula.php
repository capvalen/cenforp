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

      <form role="form" method="post">

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

            <h3>Codigo de Matricula</h3>

            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="101" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR OCUPACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevoOcupacion" name="nuevoOcupacion" required>

                  <option value="">Selecionar ocupación</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorOcupaciones::ctrMostrarOcupaciones($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo '<option value="' . $value["opcionOcupacional"] . '">' . $value["opcionOcupacional"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>
            <!-- <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-user"></i></span>

            <input type="text" class="form-control input-lg" name="nuevoCurso" placeholder="Ingresar Curso Taller" required>

          </div>

        </div> -->

            <!-- ENTRADA PARA EL ESTADO CIVIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevoCondicion" required>

                  <option value="">Selecionar condición</option>

                  <option value="Becado">Becado</option>
                  <option value="Regular">Regular</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL TURNO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevoTurno" required>

                  <option value="">Selecionar turno</option>

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

                <input type="text" class="form-control input-lg" name="nuevoObservaciones" placeholder="Ingresar observaciones" required>

              </div>

            </div>

            <h3>Datos personales</h3>

            <!-- ENTRADA PARA EL NOMBRE y APELIIDOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre y apellidos" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ESTADO CIVIL -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevoOcupacionEstudiante" required>

                  <option value="">Selecionar ocupacion del estudiante</option>

                  <option value="Soltero">Soltero</option>
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

                <input type="text" class="form-control input-lg" name="nuevoDNI" placeholder="Ingresar DNI" data-inputmask="'mask':'99999999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevoOcupacionEstudiante" required>

                  <option value="">Selecionar estado civil</option>

                  <option value="Estudiante">Estudiante</option>
                  <option value="Casado">Casado</option>
                  <option value="Divorciado">Divorciado</option>
                  <option value="Conviviente">Conviviente</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevoNacionalidad" required>

                  <option value="">Selecionar nacionalidad</option>

                  <option value="Peruana">Peruana</option>
                  <option value="Venezolana">Venezolana</option>
                  <option value="Otra">Otra</option>

                </select>

              </div>

            </div>
            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoLugarNacimiento" placeholder="Ingresar lugar de nacimiento" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevoIdioma" required>

                  <option value="">Selecionar idioma</option>

                  <option value="Español">Español</option>
                  <option value="Otra">Otra</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar correo electronico" required>

              </div>

            </div>
            
            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInstitucion" placeholder="Ingresar nombre de la institución anterior" required>

              </div>

            </div>

            <h3>Domicilio del participante</h3>

            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCalle" placeholder="Ingresar calle" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNumero" placeholder="Ingresar numero de la cuadra" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDistrito" placeholder="Ingresar distrito" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL CENTRO DE ESTUDIO DONDE CULMINÓ -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoProvincia" placeholder="Ingresar provincia" required>

              </div>

            </div>
            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDepartamento" placeholder="Ingresar departamento" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'999999999'" data-mask required>

              </div>

            </div>

            <h3>Datos personales del padre/apoderado</h3>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaNombreApoderado" placeholder="Ingresar nombre y apellidos" required>

              </div>

            </div>
            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevaOcupacionApoderado" required>

                  <option value="">Selecionar ocupacion del apoderado</option>

                  <option value="Soltero">Soltero</option>
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

                <select class="form-control input-lg" name="nuevaGradoApoderado" required>

                  <option value="">Selecionar grado de instrucción del apoderado</option>

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

                <select class="form-control input-lg" name="nuevoEstadoCivilApoderado" required>

                  <option value="">Selecionar estado civil del apoderado</option>

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

                <select class="form-control input-lg" name="nuevaNacionalidadApoderado" required>

                  <option value="">Selecionar nacionalidad del apoderado</option>

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

                <input type="text" class="form-control input-lg" name="nuevaDomicilioApoderado" placeholder="Ingresar domocilio" required>

              </div>

            </div>
            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFirma" placeholder="Ingresar firma" required>

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