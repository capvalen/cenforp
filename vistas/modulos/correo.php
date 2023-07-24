<div class="modal-dialog">

  <div class="modal-content">

    <form role="form" method="post">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Correo de Notificación</h4>

      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA PARA EL EMAIL PARA -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="email" class="form-control input-lg" name="nuevoCorreoTo" placeholder="Ingresar correo para quien se enviará" required>

            </div>

          </div>


          <!-- ENTRADA PARA EL EMAIL -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="mail" class="form-control input-lg" name="nuevoEmailFrom" placeholder="Ingresar email" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL ASUNTO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoAsunto" placeholder="Ingresar asunto" required>

            </div>

          </div>

          <!-- ENTRADA PARA LA MENSAJE -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoMensaje" placeholder="Ingresar mensaje" required>

            </div>

          </div>



        </div>

      </div>

      <!--=====================================
        PIE DEL MODAL
        ======================================-->

      <div class="modal-footer">

        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button> -->

        <button type="submit" class="btn btn-primary">Enviar correo</button>

      </div>

    </form>

    <?php

    $crearCorreo = new ControladorCorreo();
    $crearCorreo->ctrCrearCorreo();

    ?>

  </div>

</div>
<?php
