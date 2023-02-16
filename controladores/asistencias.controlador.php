<?php

class ControladorAsistencia{

    /*=============================================
	MOSTRAR ASISTENCIA DE UN ESTUDIANTE EN UNA ASIGNACION
	=============================================*/

	static public function ctrMostrarAsistencia($item1, $valor1, $item2, $valor2, $item3, $valor3){

		$tabla = "asistencia";

		$respuesta = ModeloAsistencia::MdlMostrarAsistencia($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);

		return $respuesta;
	}
	
	/*=============================================
	MOSTRAR FECHA DE UN BIMESTRE DE UNA ASIGANCION
	=============================================*/

	static public function ctrMostrarFechas($bimestre, $cod_asig){

		$tabla = "asistencia";

		$respuesta = ModeloAsistencia::MdlMostrarFechas($tabla, $bimestre, $cod_asig);

		return $respuesta;
	}




	/*=============================================
	MOSTRAR REGISTROS DE FECHA DE UN BIMESTRE DE UN ESTUDIANTE EN TODAS LAS ASIGNACIONES
	=============================================*/

	static public function ctrMostrarFechasEstudiante($idBimestre, $idInscrito){

		$tabla = "asistencia";

		$respuesta = ModeloAsistencia::MdlMostrarFechasEstudiante($tabla, $idBimestre, $idInscrito);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR FECHA ESPECIFICA DE ESTUDIANTE
	=============================================*/

	static public function ctrMostarFechaEspecificaEst($idInscrito, $idAsignacion, $fechaAsis){

		$tabla = "asistencia";

		$respuesta = ModeloAsistencia::MdlMostarFechaEspecificaEst($tabla, $idInscrito, $idAsignacion, $fechaAsis);

		return $respuesta;
	}

	
	/*=============================================
	GUARDAR ASISTENCIAS
	=============================================*/

	static public function ctrGuardarAsistencias(){

		if(isset($_POST["asignacion"])){

			if(preg_match('/^[0-9]+$/', $_POST["asignacion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["bimestre"])){

				$curso = $_GET["idCurso"];

				$respuesta = ModeloUsuarios::mdlMostrarListaE($curso);

				foreach ($respuesta as $key => $value) {

					$variable ="cod_ins".$value["cod_ins"];

					$tabla = "asistencia";

					date_default_timezone_set('America/La_Paz');
					$fecha = date('Y-m-d');

					$datos = array("bi_asis" => $_POST["bimestre"],
								   "fecha_asis" => $fecha,
								   "estado_asis" => $_POST["nuevaAsistencia".$value["cod_ins"]],
								   "cod_ins" => $value["cod_ins"],
								   "cod_asig" => $_POST["asignacion"]);

					//var_dump($datos);
					$respuestaAsis = ModeloAsistencia::mdlGuardarAsistencias($tabla, $datos);
					
				}
				

				if($respuestaAsis == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La lista de asistencia ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "index.php?ruta=asistencia&idAsignacion='.$_GET["idAsignacion"].'&nombreMat='.$_GET["nombreMat"].'&idCurso='.$_GET["idCurso"].'&bimestre='.$_GET["bimestre"].'";

						}

					});
				

					</script>';

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
	MOSTRAR ASISTENCIA  DE UNA FECHA ESPECIFICA DE UN CURSO EN UNA MATERIA
	=============================================*/

	static public function ctrMostarAsistenciaEspecificaCursoAsignacion($fecha, $bimestre, $idCurso){

		$tabla = "asistencia";

		$respuesta = ModeloAsistencia::MdlMostarAsistenciaEspecificaCursoAsignacion($tabla, $fecha, $bimestre, $idCurso);

		return $respuesta;
	}
}