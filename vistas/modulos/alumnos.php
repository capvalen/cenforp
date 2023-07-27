<?php

if ($_SESSION["perfil"] == "Secretaria") {

  echo '<script>

    window.location = "crear-matricula";

  </script>';

  return;
}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Gestion de alumnos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Notas y asistencia</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">


      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Código</th>
              <th>Apellidos y Nombres</th>
              <th>DNI</th>
              <th>Email</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Fecha nacimiento</th>
              <th>Ocupación matriculado</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $alumnos = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);

            foreach ($alumnos as $key => $value) {

              echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["codigo"] . '</td>

                    <td>' . $value["apellidos"] .' ' . $value["nombre"] . '</td>

                    <td>' . $value["dni"] . '</td>

                    <td>' . $value["correo"] . '</td>

                    <td>' . $value["telefono"] . '</td>

                    <td>' . $value["distrito"] . '</td>

                    <td>' . $value["fechaNacimiento"] . '</td>     

                    <td>' . $value["opcionOcupacional"] . '</td>             

                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" href="extensiones/constancia-matricula.php?id='.$value["id"].'" target=_blank><i class="fa fa-file-o" aria-hidden="true"></i></a>
                        <button class="btn btn-warning btnEditarAlumno" data-toggle="modal" data-target="#modalEditarAlumno" idAlumno="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador" or $_SESSION["perfil"] == "Secretario") {

                echo '<button class="btn btn-danger btnEliminarAlumno" idAlumno="' . $value["id"] . '"><i class="fa fa-times"></i></button>';
              }

              echo '</div>  

                    </td>

                  </tr>';
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR ALUMNO
======================================-->

<div id="modalEditarAlumno" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar alumno</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarAlumno" id="editarAlumno" required>
                <input type="hidden" id="idAlumno" name="idAlumno">
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'999999999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="editarOcupacion" name="editarOcupacion">

                  <option value="">Selecionar ocupación</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $ocupacions = ControladorOcupaciones::ctrMostrarOcupaciones($item, $valor);

                  foreach ($ocupacions as $key => $value) {

                    echo '<option value="' . $value["idOcupacion"] . '">' . $value["ocupacion"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

      $editarAlumno = new ControladorAlumnos();
      $editarAlumno->ctrEditarAlumnoGestion();

      ?>



    </div>

  </div>

</div>

<?php

$eliminarAlumno = new ControladorAlumnos();
$eliminarAlumno->ctrEliminarAlumno();

?>