

<?php
if ($_SESSION["perfil"] == "Secretario") {
  echo '<script>window.location = "crear-matricula";</script>';
  return;
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Asistencias
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Notas y asistencia</li>
    </ol>
  </section>

  <div style="display: flex; justify-content: center;" class="card-footer">

<button class="btn btn-primary" id="btnPasarAsistencia" style="margin-right:10px">Tomar asistencia</button>
<a href="/extensiones/TCPDF-main/examples/reporteasistencia.php?idOcupacion=<?= $_SESSION['idOcupacion']?>" class="btn btn-dark" style="background-color: #808080; color: #ffffff;" target="_blank">Descargar Reporte</a>

</div>


  <section class="content">
    <div class="box">
      <div class="box-body">

			<div class="row checks hidden" style="margin: 10px 0;" >
				<div class="col-sm-6 form-inline">
					<label for="">Fecha de asistencia</label>
					<input id="txtFechaAsistencia" type="date" class="form-control" value="<?= date('Y-m-d')?>">
					<button class="btn btn-success" id="btnRegistrarAsistencia"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar asistencia</button>
				</div>
			</div>

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">Código</th>
              <th>Nombre</th>
              <th>Documento ID</th>
              <th>Ocupación matriculado</th>
              <th>Asistencias</th>
              <th>Mes</th>
							<th class="checks hidden">Marcar</th>
              <th class="acciones">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item = "usuario";
            $valor = $_SESSION["usuario"];
            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            $item = "idOcupacion";
            $valor = $usuarios["idOcupacion"];
            $Alumnos = ControladorAlumnos::ctrMostrarAlumnoPorCurso($item, $valor);

            foreach ($Alumnos as $key => $value) {
              echo '<tr>
                <td>' . $value["codigo"] . '</td>
                <td>' . $value["nombre"] . '</td>
                <td>' . $value["dni"] . '</td>
                <td>' . $value["opcionOcupacional"] . '</td>
                <td>' . $value["asistencia"] . '</td>    
                <td>' . $value["mes"] . '</td>
                <td class="checks hidden" data-id="'.$value['id'].'">
									<div class="checkbox">
									<label> <input type="checkbox" checked >  </label>
									</div>
								</td>
                <td class="acciones">
                  <div class="btn-group">
										<a href="/extensiones/reporte-asistencia.php?idAlumno='.$value['id'].'" class="btn btn-success" target="_blank" idAlumno="' . $value["id"] . '"><i class="fa fa-file-o"></i></a>
                    <button class="btn btn-warning btnEditarAlumno" data-toggle="modal" data-target="#modalEditarAlumno" idAlumno="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {
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
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar alumno</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="editarAlumno" id="editarAlumno" required>
                <input type="hidden" id="idAlumno" name="idAlumno">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">DNI</span>
                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Asistencia</span>
                <input type="number" min="0" class="form-control input-lg" name="editarAsistencia" id="editarAsistencia" required>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <input type="hidden" id="editarNotaUno" name="editarNotaUno">
        <input type="hidden" id="editarNotaDos" name="editarNotaDos">
        <input type="hidden" id="editarNotaTres" name="editarNotaTres">
      </form>
      <?php
      $editarAlumno = new ControladorAlumnos();
      $editarAlumno->ctrEditarAlumnoAsistencia();
      ?>
    </div>
  </div>
</div>

<?php
$eliminarAlumno = new ControladorAlumnos();
$eliminarAlumno->ctrEliminarAlumno();
?>
