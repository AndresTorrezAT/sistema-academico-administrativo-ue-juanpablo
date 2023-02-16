<?php

class ControladorAsignacion{

	/*=============================================
	MOSTRAR ASIGNACIONES (ESPECIFICAS)
	=============================================*/

	static public function ctrMostrarAsignacionesEspecificas($item, $valor){

		$tabla = "asignacion";

		$respuesta = ModeloAsignacion::MdlMostrarAsignacionesEspecificas($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR ASIGNACIONES (GENERAL)
	=============================================*/

	static public function ctrMostrarAsignacionGeneral($item, $valor){

		$tabla = "asignacion";

		$respuesta = ModeloAsignacion::MdlMostrarAsignacionGeneral($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR ASIGNACIONES DE UN DOCENTE
	=============================================*/

	static public function ctrMostrarAsignacionDocenteGestion($item, $valor, $idGestion){

		$tabla = "asignacion";

		$respuesta = ModeloAsignacion::MdlMostrarAsignacionDocenteGestion($tabla, $item, $valor, $idGestion);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CURSOS ASIGNADOS A UN DOCENTE
	=============================================*/

	static public function ctrMostrarCursosAsignadosADocenteGestion($item, $valor, $idGestion){

		$tabla = "asignacion";

		$respuesta = ModeloAsignacion::MdlMostrarCursosAsignadosADocenteGestion($tabla, $item, $valor, $idGestion);

		return $respuesta;
	}


	
	/*=============================================
	GUARDAR ASIGNACION
	=============================================*/

	static public function ctrGuardarAsignacion($materia, $curso, $docente){

		$tabla = "asignacion";

		$respuesta = ModeloAsignacion::MdlGuardarAsignacion($tabla, $materia, $curso, $docente);

		return $respuesta;
	}


	/*=============================================
	EDITAR ASIGNACION
	=============================================*/

	static public function ctrEditarAsignacion(){

		if(isset($_POST["asigCurso"])){

			if(preg_match('/^[0-9]+$/', $_POST["asigCurso"])){

				$tabla = "asignacion";

				$item = "cod_cur";
				$valor = $_POST["asigCurso"];

				$respuesta = ModeloAsignacion::MdlMostrarAsignacionesEspecificas($tabla, $item, $valor);
				

				foreach ($respuesta as $valor) {

					
					$valorMateria = $valor["cod_mat"];

					$valorDocente = "asigDocente".$valor["cod_mat"]."";

					$valorCurso = $_POST["asigCurso"];

					$tabla = "asignacion";

					if($_POST[$valorDocente] != 0){

						$datos = array("cod_cur" => $valorCurso,
									   "cod_doc" => $_POST[$valorDocente],
									   "cod_mat" => $valorMateria);
					}else {
						$datos = array("cod_cur" => $valorCurso,
										"cod_doc" => null,
										"cod_mat" => $valorMateria);
					}

		
					// var_dump($datos);

					$respuestaAsignacion = ModeloAsignacion::mdlEditarAsignacion($tabla, $datos);

					if($respuestaAsignacion == "ok"){

						echo'<script>
	
						swal({
	
							type: "success",
							title: "¡La asignacion ha sido guardada correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
	
						}).then((result)=>{
	
							if(result.value){
	
								window.location = "curso";
	
							}
	
						})
						
						</script>';
	
					}
	
					
				}



				
				

			}

		}

		
	}
	
}