<?php

require_once "conexion.php";

class ModeloCalificaciones{

    /*=============================================
	MOSTRAR CURSOS
	=============================================*/

	static public function MdlMostrarCalificacionesGeneralesBimestrales($tabla, $idAsignacion, $idInscrito, $idBimestre){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cod_bi = :cod_bi AND cod_ins = :cod_ins AND cod_asig = :cod_asig");

        $stmt -> bindParam(":cod_bi", $idBimestre, PDO::PARAM_INT);
        $stmt -> bindParam(":cod_ins", $idInscrito, PDO::PARAM_INT);
        $stmt -> bindParam(":cod_asig", $idAsignacion, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }


    /*=============================================
	MOSTRAR CALIFICACION DE INSCRITO
	=============================================*/

	static public function MdlMostrarCalificacion($tabla, $item, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }
    
    /*===================================
    CREAR CALIFICACIONES
    ===================================*/

    static public function mdlIngresarCalificacionesBimestrales($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_bi, ser, saber, hacer, decidir, nota_bi, cod_ins, cod_asig) VALUES (:cod_bi, :ser, :saber, :hacer, :decidir, :nota_bi, :cod_ins, :cod_asig)");

        $stmt->bindParam(":cod_bi", $datos["cod_bi"], PDO::PARAM_INT);
        $stmt->bindParam(":ser", $datos["ser"], PDO::PARAM_INT);
        $stmt->bindParam(":saber", $datos["saber"], PDO::PARAM_INT);
        $stmt->bindParam(":hacer", $datos["hacer"], PDO::PARAM_INT);
        $stmt->bindParam(":decidir", $datos["decidir"], PDO::PARAM_INT);
        $stmt->bindParam(":nota_bi", $datos["nota_bi"], PDO::PARAM_INT);
        $stmt->bindParam(":cod_ins", $datos["cod_ins"], PDO::PARAM_INT);
        $stmt->bindParam(":cod_asig", $datos["cod_asig"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";
            
        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
	ACTUALIZAR CALIFICACIONES
	=============================================*/

	static public function mdlActualizarCalificaciones($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}