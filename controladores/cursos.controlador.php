<?php

class ControladorCursos{

    /*=============================================
	MOSTRAR CURSO
	=============================================*/

	static public function ctrMostrarCursos($item, $valor, $gestion){

		$tabla = "curso";

		$respuesta = ModeloCursos::MdlMostrarCursos($tabla, $item, $valor, $gestion);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR CURSO SEGUN NIVEL
	=============================================*/

	static public function ctrMostrarCursosNivel($valor, $gestion){

		$tabla = "curso";

		$respuesta = ModeloCursos::MdlMostrarCursosNivel($tabla, $valor ,$gestion);

		return $respuesta;
	}


	/*=============================================
	CREAR CURSO
	=============================================*/

	static public function ctrCrearCursos(){

		if(isset($_POST["nuevoGrado"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoGrado"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoNivel"]) &&
			   preg_match('/^[a-zA-Z]+$/', $_POST["nuevoParalelo"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoCupo"])){


				//$item = "gestion";
				//$valor = $_SESSION["gestion"];

				//$gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

				$idGestion = $_SESSION["gestion"];
				
				$tabla = "curso";

				$datos = array("grado" => $_POST["nuevoGrado"],
					           "nivel" => $_POST["nuevoNivel"],
					           "paralelo" => $_POST["nuevoParalelo"],
							   "cupo" => $_POST["nuevoCupo"],
							   "cod_gestion" =>	$idGestion);

				$respuesta = ModeloCursos::mdlCrearCurso($tabla, $datos);


				if($respuesta != "error"){

					/*=============================================
					AGREGAR ASIGNACIONES
					=============================================*/

					// OBTENER CODIGO DEL CURSO					

					//$Rcurso = ModeloCursos::mdlMostrarCursoEspecifico($tabla, $datos);

					$gestion = $idGestion;

					$valor = $_POST["nuevoNivel"];				

					$Rmateria = ControladorMaterias::ctrMostrarMateriasNivel($valor, $gestion);

					if (!empty($Rmateria)) {

						foreach ($Rmateria as $key => $value) {

							$materia = $value["cod_mat"];
							$curso = $respuesta;
							$docente = null;
	
							$Rasignacion = ControladorAsignacion::ctrGuardarAsignacion($materia, $curso, $docente);
	
						}
						
					}else{

						$Rasignacion = "ok";

					}

					

					if($Rasignacion == "ok"){

						echo '<script>

						swal({

							type: "success",
							title: "¡El curso ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "curso";

							}

						});
					

						</script>';

					}

						

				}
			

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El curso no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "curso";

						}

					});
				

				</script>';

			}


		}


	}





	/*=============================================
	EDITAR CURSO
	=============================================*/

	static public function ctrEditarCursos(){

		if(isset($_POST["editarGrado"])){

			if(preg_match('/^[0-9]+$/', $_POST["editarGrado"])){

				$tabla = "curso";

				$datos = array("cod_cur" => $_POST["editarCod"],
							   "grado" => $_POST["editarGrado"],
							   "paralelo" => $_POST["editarParalelo"],
							   "nivel" => $_POST["editarNivel"],
							   "cupos" => $_POST["editarCupo"]);

				$respuesta = ModeloCursos::mdlEditarCurso($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Curso ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "curso";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Curso no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "curso";

							}
						})

			  	</script>';

			}

		}

	}





	
	/*=============================================
	BORRAR CURSO
	=============================================*/

	static public function ctrBorrarCurso(){

		if(isset($_GET["idCurso"])){

			$tabla ="curso";
			$datos = $_GET["idCurso"];

			$respuesta = ModeloCursos::mdlBorrarCurso($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Curso ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "curso";

								}
							})

				</script>';

			}		

		}

	}

	



}