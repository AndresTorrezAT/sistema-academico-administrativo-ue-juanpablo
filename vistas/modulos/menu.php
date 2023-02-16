<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		

			<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<?php
		
			if($_SESSION["tipo"] == 1){

				echo'

					<li>

						<a href="curso">

						<i class="fa fa-window-maximize"></i>
							<span>Curso</span>

						</a>

					</li>

					<li>

						<a href="materias">

							<i class="fa fa-th"></i>
							<span>Materias</span>

						</a>

					</li>

					<li class="treeview">

						<a href="#">

							<i class="fa fa-clock-o"></i>
							
							<span>Horario</span>
							
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>

						</a>

						<ul class="treeview-menu">
							
							<li>

								<a href="crear-horario">
									
									<i class="fa fa-circle-o"></i>
									<span>Crear Horario</span>

								</a>

							</li>

							<li>

								<a href="ver-horario">
									
									<i class="fa fa-circle-o"></i>
									<span>Ver Horarios</span>

								</a>

							</li>

						</ul>

					</li>

					<li>

						<a href="inscripciones">

							<i class="fa fa-address-card"></i>
							<span>Inscripcion y Retiro</span>

						</a>

					</li>

					<li class="treeview">

						<a href="#">

							<i class="fa fa-product-hunt"></i>
							
							<span>Personal</span>
							
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>

						</a>

						<ul class="treeview-menu">
							
							<li>

								<a href="docentes">
									
									<i class="fa fa-circle-o"></i>
									<span>Docentes</span>

								</a>

							</li>

							<li>

								<a href="administrativos">
									
									<i class="fa fa-circle-o"></i>
									<span>Administrativos</span>

								</a>

							</li>

						</ul>

					</li>		

						

					<li>

						<a href="estudiantes">

							<i class="fa fa-users"></i>
							<span>Lista de Estudiantes</span>

						</a>

					</li>

					

					<li>

						<a href="registros">

							<i class="fa fa-pencil-square-o"></i>
							<span>Registros Academicos</span>

						</a>

					</li>
				
				';


				}

			?>

			<?php

			if($_SESSION["tipo"] == 2){

				echo'
					<li>

						<a href="docente-registros">

							<i class="fa fa-window-maximize"></i>
							<span>Registros</span>

						</a>

					</li>
				';


			}



			?>

			<?php

			if($_SESSION["tipo"] == 3){

				// echo'

				// 	<li>

				// 		<a href="estudiante-calificaciones">

				// 			<i class="fa fa-window-maximize"></i>
				// 			<span>Estudiante - Calificaiones</span>

				// 		</a>

				// 	</li>

				// 	<li>

				// 		<a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalAsistenciaEstudiante">

				// 			<i class="fa fa-calendar-o"></i>
				// 			<span>Estudiante - Asistencia</span>

				// 		</a>

				// 	</li>

				// 	<li>

				// 		<a href="estudiante-comportamiento" data-toggle="modal" data-target="#modalComportamientoEstudiante">

				// 			<i class="fa fa-book"></i>
				// 			<span>Estudiante - Kardex </span>

				// 		</a>

				// 	</li>
				// ';


			}

			?>

			<li>

				<a href="mensajes">

					<i class="fa fa-envelope"></i>
					<span>Mensajes y Comunicados</span>

				</a>

			</li>

		</ul>

	 </section>

</aside>



