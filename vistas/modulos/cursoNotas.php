<?php

if ($_SESSION["perfil"] == "Secretario") {

  echo '<script>

    window.location = "crear-matricula";

  </script>';

  return;
}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Notas

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Notas y asistencia</li>

    </ol>

  </section>

  <div style="display: flex; justify-content: center;" class="card-footer">

			<a href="/extensiones/TCPDF-main/examples/reporte.php?idOcupacion=<?= $_SESSION['idOcupacion']?>" class="btn btn-dark" style="background-color: #808080; color: #ffffff;" target="_blank">Descargar Reporte</a>

			

		</div>

  <section class="content">

     

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th style="width:10px">Código</th>
              <th>Apellidos y Nombres</th>
              <th>Documento ID</th>
              <th>Ocupación</th>
              <th>Nota 1</th>
              <th>Nota 2</th>
              <th>Nota 3</th>
              <th>Promedio</th>
              <th>Estado</th>
              <th>Mes</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php
            $item = "usuario";
            $valor = $_SESSION["usuario"];

            // Que usuario ingresa al sistema?
            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            $item = "opcionOcupacional";
            $valor = $usuarios["opcionOcupacional"];
            // El usuario ingresa al sistema que ocupacion enseña
            $Alumnos = ControladorAlumnos::ctrMostrarAlumnoPorCurso($item, $valor);

            foreach ($Alumnos as $key => $value) {

              $promedio = (($value["notaUno"] + $value["notaDos"] + $value["notaTres"]) / 3);
              $estado = "Desaprobado";
              if (10.5 >= $promedio) {
                $estado = "Desaprobado";
              } else {
                $estado = "Aprobado";
              }
              echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["codigo"] . '</td>

                    <td>' . $value["apellidos"] . ' ' . $value["nombre"] . '</td>

                    <td>' . $value["dni"] . '</td>

                    <td>' . $value["opcionOcupacional"] . '</td>             
                    <td>' . $value["notaUno"] . '</td>             
                    <td>' . $value["notaDos"] . '</td>             
                    <td>' . $value["notaTres"] . '</td>
                    <td>' . number_format($promedio, 2, ',', '.') . '</td>             
                    <td>' . $estado . '</td>             
                    <td>' . $value["mes"] . '</td>   
                 


                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarAlumno" data-toggle="modal" data-target="#modalEditarAlumno" idAlumno="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador" or $_SESSION["perfil"] == "Secretaria") {

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
MODAL EDITAR Alumno
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

                <input type="text" class="form-control input-lg" name="editarAlumno" id="editarAlumno" readonly required>
                <input type="hidden" id="idAlumno" name="idAlumno">
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon">DNI</span>

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon">Nota 1</span>

                <input type="number" min="0" max="20" class="form-control input-lg" name="editarNotaUno" id="editarNotaUno" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon">Nota 2</span>

                <input type="number" min="0" max="20" class="form-control input-lg" name="editarNotaDos" id="editarNotaDos" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon">Nota 3</span>

                <input type="number" min="0" max="20" class="form-control input-lg" name="editarNotaTres" id="editarNotaTres" required>


                <input type="hidden" id="editarAsistencia" name="editarAsistencia">
              

              </div>

            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Mes</span>
                <select class="form-control" name="editarMes" id="editarMes" required>
                  <option value="Enero">Enero</option>
                  <option value="Febrero">Febrero</option>
                  <option value="Marzo">Marzo</option>
                  <!-- Agrega aquí los demás meses -->
                </select>
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
      $editarAlumno->ctrEditarAlumnoNotas();

      ?>



    </div>

  </div>

</div>

<?php

$eliminarAlumno = new ControladorAlumnos();
$eliminarAlumno->ctrEliminarAlumno();

?>