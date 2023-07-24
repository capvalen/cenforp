<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

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

  <section class="content">

    <div class="box">


      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Documento ID</th>
           <th>Ocupación matriculado</th>
           <th>Asistencias</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $Alumnos = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);

          foreach ($Alumnos as $key => $value) {

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["dni"].'</td>

                    <td>'.$value["opcionOcupacional"].'</td>             

                    <td>'.$value["asistencia"].'</td>             

                 


                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarAlumno" data-toggle="modal" data-target="#modalEditarAlumno" idAlumno="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarAlumno" idAlumno="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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

                <input type="text" class="form-control input-lg" name="editarAlumno" id="editarAlumno" required>
                <input type="hidden" id="idAlumno" name="idAlumno">
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon">DNI</span> 

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon">As</span> 

                <input type="number" min="0" class="form-control input-lg" name="editarAsistencia" id="editarAsistencia" required>

                
                <!-- PARA EDITAR -->
                <input type="hidden" id="editarNotaUno" name="editarNotaUno">
                <input type="hidden" id="editarNotaDos" name="editarNotaDos">
                <input type="hidden" id="editarNotaTres" name="editarNotaTres">


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
        $editarAlumno -> ctrEditarAlumnoAsistencia();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarAlumno = new ControladorAlumnos();
  $eliminarAlumno -> ctrEliminarAlumno();

?>


