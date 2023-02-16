<?php

require_once "conexion.php";

class ModeloHorarios{

    /*=====================================
    MOSTRAR HORARIOS
    =====================================*/

    static public function mdlMostrarHorarios($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;
    }


    /*=====================================
    MOSTRAR PERIODOS ESPECIFICOS
    =====================================*/

    static public function mdlMostrarPeriodoEspecificos($tabla, $dia, $periodo, $idCurso){

        $stmt = Conexion::conectar()->prepare("SELECT $periodo FROM $tabla WHERE dia = :dia AND cod_cur = :cod_cur");

        $stmt -> bindParam(":dia", $dia, PDO::PARAM_INT);

        $stmt -> bindParam(":cod_cur", $idCurso, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }


    /*=============================================
	BORRAR HORARIO
    =============================================*/

    static public function mdlBorrarHorario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cod_cur = :cod_cur");

        $stmt -> bindParam(":cod_cur", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }

        $stmt -> close();
        
        $stmt = null;

    }

}