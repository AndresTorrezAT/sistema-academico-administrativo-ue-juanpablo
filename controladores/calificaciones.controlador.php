<?php

class ControladorCalificaciones{

    /*=========================================
    MOSTRAR CALIFIACIONES GENERALES BIMESTRALES
    ==========================================*/

    static public function ctrCalificacionesGeneralesBimestrales($idAsignacion, $idInscrito, $bimestre){

        $tabla = "calificaciones";

        $respuesta = ModeloCalificaciones::MdlMostrarCalificacionesGeneralesBimestrales($tabla, $idAsignacion, $idInscrito, $bimestre);

        return $respuesta;
    }

    /*=========================================
    MOSTRAR CALIFIACION DE UN ESTUDIANTE
    ==========================================*/

    static public function ctrMostrarCalificacion($item, $valor){

        $tabla = "calificaciones";

        $respuesta = ModeloCalificaciones::MdlMostrarCalificacion($tabla, $item, $valor);

        return $respuesta;
    }


    /*=============================================
	GUARDAR ASISTENCIAS
	=============================================*/

	static public function ctrActualizarCalificacion($item1, $valor1, $item2, $valor2){

		if($valor1 <= 100){

            $tabla = "calificaciones";

            $respuesta = ModeloCalificaciones::MdlActualizarCalificaciones($tabla, $item1, $valor1, $item2, $valor2);

            return $respuesta;

		}
    }


  


}