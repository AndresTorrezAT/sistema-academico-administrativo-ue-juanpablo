<?php

class ControladorComportamiento{

    /*=============================================
	MOSTRAR REGISTRO DE COMPORTAMIENTO
	=============================================*/

	static public function ctrMostrarRegistroComportamiento($bimestre, $valor){

		$tabla = "comportamiento";

		$respuesta = ModeloComportamiento::MdlMostrarRegistroComportamiento($tabla, $bimestre, $valor);

		return $respuesta;
	}

	/*=========================================
    REGISTRO DE COMPORTAMIENTO
    ==========================================*/

    static public function ctrCrearRegistroComportamiento(){

        if(isset($_POST["nuevaObservacion"])){

            /*=============================================================================
                                     REGISTRO DE DATOS DE COMPORTAMIENTO
            ==============================================================================*/

            if(preg_match('/^[0-9]+$/', $_POST["nuevoAsignacion"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoInscrito"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoBimestre"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDetalle"]) ){ 


                $tabla ="comportamiento";

                $datos = array( "bi_com" => $_POST["nuevoBimestre"],
                                "fecha_reg" => $_POST["nuevaFecha"],
                                "observacion" => $_POST["nuevaObservacion"],
                                "detalle" => $_POST["nuevoDetalle"],
                                "cod_ins" => $_POST["nuevoInscrito"],
                                "cod_asig" =>  $_POST["nuevoAsignacion"]);

                // MOSTRAR VARIABLE EN PANTALLA

                $respuesta = ModeloComportamiento::mdlCrearRegistroComportamiento($tabla, $datos);

                /*=============================================================================
                                     OBTENER CODIGO DE USUARIO
                ==============================================================================*/
                var_dump($respuesta); 
                if($respuesta == "ok"){

					echo'<script>

					swal({

						type: "success",
						title: "¡El registro de comportamiento ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "index.php?ruta=comportamiento-registro&idEstudiante='.$_POST["estudiante"].'&bimestre='.$_POST["nuevoBimestre"].'&idGestion='.$_POST["idGestion"].'&idAsignacion='.$_POST["nuevoAsignacion"].'";

						}

					})
					
					</script>';
     
 
                }

                

            }
            else{

                echo'<script>

                    swal({

                        type: "error",
                        title: "¡El registro de comportamiento no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "index.php?ruta=comportamiento-registro&idEstudiante='.$_POST["estudiante"].'&bimestre='.$_POST["nuevoBimestre"].'&idGestion='.$_POST["idGestion"].'&idAsignacion='.$_POST["nuevoAsignacion"].'";

                        }

                    })
                    
                    </script>';

            }
        }
    }

}