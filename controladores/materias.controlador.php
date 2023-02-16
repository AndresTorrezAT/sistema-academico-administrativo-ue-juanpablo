<?php

class ControladorMaterias{

    /*======================================
    MOSTRAR MATERIAS
    ======================================*/

    static public function ctrMostrarMaterias($item, $valor){

        $tabla = "materia";

        $respuesta = ModeloMaterias::mdlMostrarMaterias($tabla, $item, $valor);
        
        return $respuesta;
    }


	/*=============================================
	MOSTRAR MATERIAS SEGUN NIVEL
	=============================================*/

	static public function ctrMostrarMateriasNivel($valor, $gestion){

		$tabla = "materia";

		$respuesta = ModeloMaterias::mdlMostrarMateriasNivel($tabla, $valor, $gestion);

		return $respuesta;
	}


    /*=============================================
	CREAR MATERIA
	=============================================*/

	static public function ctrCrearMateria(){

		if(isset($_POST["nuevaMateria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMateria"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoNivel"])){


				// $item = "gestion";
				// $valor = $_SESSION["gestion"];

				// $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

				$idGestion = $_SESSION["gestion"];

				$tabla = "materia";

				$datos = array("nombre" => $_POST["nuevaMateria"],
					           "nivel" => $_POST["nuevoNivel"],
							   "cod_gestion" => $idGestion);

				$respuesta = ModeloMaterias::mdlCrearMateria($tabla, $datos);


				if($respuesta != "error"){

					/*=============================================
					AGREGAR ASIGNACIONES
					=============================================*/

					// OBTENER CODIGO DE LA MATERIA

					//$Rmateria = ModeloMaterias::mdlMostrarMateriaEspecifica($tabla, $datos);

					$valor = $_POST["nuevoNivel"];
					$gestion = $idGestion;
					
					$Rcurso = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

					foreach ($Rcurso as $key => $value) {

						$materia = $respuesta;
						$curso = $value["cod_cur"];
						$docente = null;

						$Rasignacion = ControladorAsignacion::ctrGuardarAsignacion($materia, $curso, $docente);

					}

					if($Rasignacion == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "¡La Materia ha sido guardado correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "materias";

								}

							});
						

							</script>';

					}


					

				}
			

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La Materia no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "materias";

						}

					});
				

				</script>';

			}


		}


	}




	/*=============================================
	EDITAR MATERIA
	=============================================*/

	static public function ctrEditarMaterias(){

		if(isset($_POST["editarMateria"])){

			if(preg_match('/^[a-zA-Z]+$/', $_POST["editarMateria"])){

				$tabla = "materia";

				$datos = array("cod_mat" => $_POST["editarCod"],
							   "nombre_mat" => $_POST["editarMateria"],
							   "nivel" => $_POST["editarNivel"]);

				$respuesta = ModeloMaterias::mdlEditarMateria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La materia ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "materias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Materia no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "materias";

							}
						})

			  	</script>';

			}

		}

	}



	/*=============================================
	BORRAR MATERIA
	=============================================*/

	static public function ctrBorrarMateria(){

		if(isset($_GET["idMateria"])){

			$tabla ="materia";
			$datos = $_GET["idMateria"];

			$respuesta = ModeloMaterias::mdlBorrarMateria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La materia ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "materias";

								}
							})

				</script>';

			}		

		}

	}



	/*=============================================
	CREAR HORARIO
	=============================================*/

	static public function ctrCrearHorario(){

		if(isset($_POST["idCurso"])){

				$tabla = "horario";
				
				$datos = array("cod_cur" => $_POST["idCurso"],
								
							   "row11" => $_POST["row-11"],
							   "row12" => $_POST["row-12"],
							   "row13" => $_POST["row-13"],
							   "row14" => $_POST["row-14"],
							   "row15" => $_POST["row-15"],
							   
							   "row21" => $_POST["row-21"],
							   "row22" => $_POST["row-22"],
							   "row23" => $_POST["row-23"],
							   "row24" => $_POST["row-24"],
							   "row25" => $_POST["row-25"],
							   
							   "row31" => $_POST["row-31"],
							   "row32" => $_POST["row-32"],
							   "row33" => $_POST["row-33"],
							   "row34" => $_POST["row-34"],
							   "row35" => $_POST["row-35"],
							  
							   "row41" => $_POST["row-41"],
							   "row42" => $_POST["row-42"],
							   "row43" => $_POST["row-43"],
							   "row44" => $_POST["row-44"],
							   "row45" => $_POST["row-45"],
							   
							   "row61" => $_POST["row-61"],
							   "row62" => $_POST["row-62"],
							   "row63" => $_POST["row-63"],
							   "row64" => $_POST["row-64"],
							   "row65" => $_POST["row-65"],

							   "row71" => $_POST["row-71"],
							   "row72" => $_POST["row-72"],
							   "row73" => $_POST["row-73"],
							   "row74" => $_POST["row-74"],
							   "row75" => $_POST["row-75"],

							   "row81" => $_POST["row-81"],
							   "row82" => $_POST["row-82"],
							   "row83" => $_POST["row-83"],
							   "row84" => $_POST["row-84"],
							   "row85" => $_POST["row-85"],

							   "row91" => $_POST["row-91"],
							   "row92" => $_POST["row-92"],
							   "row93" => $_POST["row-93"],
							   "row94" => $_POST["row-94"],
							   "row95" => $_POST["row-95"],
							   );
							   
				//var_dump($datos); 

				$respuesta = ModeloMaterias::mdlCrearHorario($tabla, $datos);

				if($respuesta == "ok"){

					$tabla = "curso";
					$id = $_POST["idCurso"];
					$dato = 1;

					$respuesta = ModeloCursos::mdlActualizarCurso($tabla, $id, $dato);

					if($respuesta == "ok"){

						echo '<script>
	
						swal({
	
							type: "success",
							title: "¡La horario ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
	
						}).then(function(result){
	
							if(result.value){
							
								window.location = "ver-horario";
	
							}
	
						});
					
	
						</script>';
	
					}

				}	

		}
		// else{

		// 	echo '<script>

		// 		swal({

		// 			type: "error",
		// 			title: "¡La Materia no puede ir vacío o llevar caracteres especiales!",
		// 			showConfirmButton: true,
		// 			confirmButtonText: "Cerrar"

		// 		}).then(function(result){

		// 			if(result.value){
					
		// 				window.location = "crear-horario";

		// 			}

		// 		});
			

		// 	</script>';

		// }


	}

}