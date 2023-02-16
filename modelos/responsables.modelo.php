<?php

require_once "conexion.php";

class ModeloResponsables{


    /*=============================================
	REGISTRO DE RESPONSABLES
	=============================================*/

	static public function mdlCrearResponsables($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_est, ci, nom_res, pat_res, mat_res, tipo) VALUES (:cod_est, :ci, :nom_res, :pat_res, :mat_res, :tipo)");

		$stmt->bindParam(":cod_est", $datos["cod_est"], PDO::PARAM_INT);
		$stmt->bindParam(":ci", $datos["ci"], PDO::PARAM_INT);
        $stmt->bindParam(":nom_res", $datos["nom_res"], PDO::PARAM_STR);
        $stmt->bindParam(":pat_res", $datos["pat_res"], PDO::PARAM_STR);
        $stmt->bindParam(":mat_res", $datos["mat_res"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

    }
}    
	