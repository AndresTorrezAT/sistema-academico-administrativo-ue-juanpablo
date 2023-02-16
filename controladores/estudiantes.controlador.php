<?php


class ControladorEstudiantes{

    /*=========================================
    MOSTRAR ESTUDIANTES
    ==========================================*/

    static public function ctrMostrarEstudiantes($item, $valor){

        $tabla = "estudiante";

        $respuesta = ModeloEstudiantes::mdlMostrarEstudiantes($tabla, $item, $valor);
        
        return $respuesta;
    }



}