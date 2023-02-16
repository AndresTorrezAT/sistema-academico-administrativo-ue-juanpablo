<?php

class ControladorGestion{

    /*======================================
    MOSTRAR GESTION
    ======================================*/

    static public function ctrMostrarGestion($item, $valor){

        $tabla = "gestion";

        $respuesta = ModeloGestion::mdlMostrarGestion($tabla, $item, $valor);
        
        return $respuesta;
    }

	/*======================================
    MOSTRAR GESTION
    ======================================*/

    static public function ctrMostrarGestionActualUltima(){

        $tabla = "gestion";

        $respuesta = ModeloGestion::mdlMostrarGestionActualUltima($tabla);
        
        return $respuesta;
    }


	/*======================================
    MOSTRAR GESTION
    ======================================*/

    static public function ctrMostrarBimestre($item1, $valor1, $item2, $valor2){

        $tabla = "bimestre";

        $respuesta = ModeloGestion::mdlMostrarBimestre($tabla, $item1, $valor1, $item2, $valor2);
        
        return $respuesta;
    }



    static public function ctrEditarBimestre(){

		if(isset($_POST["numeroBimestres"])){

			if(preg_match('/^[0-9]+$/', $_POST["numeroBimestres"])){

				for ($i=1; $i <= $_POST["numeroBimestres"] ; $i++) { 
                    					
					$tabla = "bimestre";

                    $datos = array("cod_bimestre" => $_POST["idBimestre".$i],
                                    "inicio" => $_POST["inicioBimestre".$i],
                                    "fin" => $_POST["finBimestre".$i]);
		
					//var_dump($datos);

					$respuestaBimestre = ModeloGestion::mdlEditarBimestre($tabla, $datos);
					
				}

					if($respuestaBimestre == "ok"){

						echo'<script>
	
						swal({
	
							type: "success",
							title: "¡Los bimestres han sido definidos correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
	
						}).then((result)=>{
	
							if(result.value){
	
								window.location = "inicio";
	
							}
	
						})
						
						</script>';
	
					}

			}

		}

		
	}

    


}