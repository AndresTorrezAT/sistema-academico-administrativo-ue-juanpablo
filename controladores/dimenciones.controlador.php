<?php

class ControladorDimenciones{

    /*=============================================
	MOSTRAR DIMENCION SEGUN EL NUMERO
	=============================================*/

	static public function ctrMostrarDimenciones($idAsignacion, $num, $bimestre){

		$tabla = "dimenciones";

		$respuesta = ModeloDimenciones::MdlMostrarDimenciones($tabla, $idAsignacion, $num, $bimestre);

        return $respuesta;
        
	}

	/*=============================================
	MOSTRAR VARIAS DIMENCIONES ESPECIFICAS
	=============================================*/

	static public function ctrMostrarDimencionesEspecificas($idAsignacion, $tipo, $bimestre){

		$tabla = "dimenciones";

		$respuesta = ModeloDimenciones::MdlMostrarDimencionesEspecificas($tabla, $idAsignacion, $tipo, $bimestre);

        return $respuesta;
        
	}


	/*=============================================
	CREAR DIMENCION
	=============================================*/

	static public function ctrCrearDimencionDefault($idAsignacion, $num , $bimestre){

		if($num <= 3 ){

			$tipo = 1;
		}

		if($num > 4 && $num <= 8){

			$tipo = 2;
		}

		if($num > 9 && $num <= 13){

			$tipo = 3;
		}

		if($num > 14 && $num <= 17){

			$tipo = 4;
		}

		$tabla = "dimenciones";

		$datos = array("cod_asig"=>$idAsignacion,
						"tipo_dim"=>$tipo,
						"num"=>$num,
						"nom_dim"=>"Dimen",
						"num_bi"=>$bimestre);

		$respuesta = ModeloDimenciones::MdlCrearDimencionDefault($tabla, $datos);


	}

	/*=============================================
	EDITAR DIMENCION
	=============================================*/

	static public function ctrEditarDimencion(){

		if(isset($_POST["cod_asig"])){

			if(preg_match('/^[0-9]+$/', $_POST["bimestre"])){

				$tabla = "dimenciones";

				$idAsignacion = $_POST["cod_asig"];

				$num = null;

				$bimestre = $_POST["bimestre"];

				$respuesta = ModeloDimenciones::MdlMostrarDimenciones($tabla, $idAsignacion, $num, $bimestre);

				foreach ($respuesta as $key => $value) {

					$item1= "nom_dim";
					$valor1= $_POST["d".$value["cod_dim"]]; ;

					$item2= "cod_dim";
					$valor2= $value["cod_dim"];

					$respuesta = ModeloDimenciones::mdlActualizarDimencion($tabla, $item1, $valor1, $item2, $valor2);
					
				}

				

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Las Dimenciones han sido editadas correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=detalle_cal_bimestre&idCurso='.$_POST["cod_cur"].'&nombreMat='.$_POST["nombre"].'&idAsignacion='.$_POST["cod_asig"].'&bimestre='.$_POST["bimestre"].'";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Las Dimenciones no pueden ir vacías o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

								window.location = "detalle_cal_bimestre";

							}
						})

			  	</script>';

			}

		}

	}
}