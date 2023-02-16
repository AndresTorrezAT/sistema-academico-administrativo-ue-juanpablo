<?php

class ControladorHorarios{

    
    /*======================================
    MOSTRAR HORARIOS
    ======================================*/

    static public function ctrMostrarHorarios($item, $valor){

        $tabla = "horario";

        $respuesta = ModeloHorarios::mdlMostrarHorarios($tabla, $item, $valor);
        
        return $respuesta;
    }

    

    /*======================================
    MOSTRAR PERIODOS ESPECIFICOS
    ======================================*/

    static public function ctrMostrarPeriodoEspecificos($dia, $periodo, $idCurso){

        $tabla = "horario";

        $respuesta = ModeloHorarios::mdlMostrarPeriodoEspecificos($tabla, $dia, $periodo, $idCurso);
        
        return $respuesta;
    }


    /*=========================================
    BORRAR HORARIO
    ==========================================*/

    static public function ctrBorrarHorario(){

        if(isset($_GET["idCurso"])){

            $tabla = "curso";
            $id = $_GET["idCurso"];
            $dato = 0;

            $respuesta = ModeloCursos::mdlActualizarCurso($tabla, $id, $dato);

            if($respuesta == "ok"){

                
                $tabla = "horario";
                $datos = $_GET["idCurso"];

                $respuesta = ModeloHorarios::mdlBorrarHorario($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                        swal({

                            type: "success",
                            title: "El Horario ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result) =>{

                                    if(result.value){

                                        window.location = "ver-horario";
                                    }

                            })
                        
                        </script>';

                }

            }


        }


    }

}