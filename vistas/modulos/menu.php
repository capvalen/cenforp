<aside class="main-sidebar">

	<section class="sidebar">

		<ul class="sidebar-menu" id="menuBarra">

			<?php

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Secretario") {
				echo '<li>

						<a href="crear-matricula">
							
							<i class="fa fa-plus"></i>
							<span>Crear matricula</span>

						</a>

			</li>';
			}
			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Secretario") {

				echo '<li class="treeview">

					<a href="#">

						<i class="fa fa-list-ul"></i>
						
						<span>Notas y Asistencia</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

				<ul class="treeview-menu">
					
					
					<li>
						<a href="asistencia">
							<i class="fa fa-circle-o"></i>
							<span>Asistencia</span>
						</a>

					</li>
					<li>

						<a href="notas">
							
							<i class="fa fa-circle-o"></i>
							<span>Notas</span>

						</a>

					</li>';

				echo '</ul>
					
					</li>';
			}

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Secretario") {

				echo '
			<li>

				<a href="alumnos">

					<i class="fa fa-user"></i>
					<span>Alumnos</span>
				</a>

			</li>';
			}

			if ($_SESSION["perfil"] == "Docente") {


				echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>';

				$item = "usuario";
				$valor = $_SESSION["usuario"];

				$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

				echo $usuarios["opcionOcupacional"];

				echo '</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					
					<li>
						<a href="asistenciaCurso">
							<i class="fa fa-circle-o"></i>
							<span>Asistencia</span>
						</a>

					</li>
					<li>

						<a href="cursoNotas">
							
							<i class="fa fa-circle-o"></i>
							<span>Notas</span>

						</a>

					</li>';
			echo '</li>
				</ul>';
			}


			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Secretario") {

				echo '

			<li>

				<a href="ocupaciones">

					<i class="fa fa-product-hunt"></i>
					<span>Ocupaciones</span>

				</a>

			</li>';
			}

			if ($_SESSION["perfil"] == "Administrador") {

				echo '<li>

				<a href="usuarios">

					<i class="fa fa-users"></i>
					<span>Usuarios</span>

				</a>

			</li>';
			}
			echo '<li>

			<a href="correo">

				<i class="fa fa-envelope"></i>
				<span>Correo</span>

			</a>

		</li>'


			?>

		</ul>

	</section>

</aside>