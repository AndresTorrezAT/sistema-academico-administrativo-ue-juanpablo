<?php

require_once "conexion.php";

class ModeloComportamiento{

    /*=============================================
	MOSTRAR REGISTRO DE COMPORTAMIENTO
	=============================================*/

	static public function MdlMostrarRegistroComportamiento($tabla, $bimestre, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cod_ins = :cod_ins  AND cod_bi = :bi_com");

        $stmt -> bindParam(":bi_com", $bimestre, PDO::PARAM_INT);
        $stmt -> bindParam(":cod_ins", $valor, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

    }

    /*=============================================
	REGISTRO DE ADMINISTRATIVOS
	=============================================*/

	static public function mdlCrearRegistroComportamiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_bi, fecha_reg, observacion, detalle, cod_ins, cod_asig) VALUES (:cod_bi, :fecha_reg, :observacion, :detalle, :cod_ins, :cod_asig)");

		$stmt->bindParam(":cod_bi", $datos["bi_com"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_reg", $datos["fecha_reg"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
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
}