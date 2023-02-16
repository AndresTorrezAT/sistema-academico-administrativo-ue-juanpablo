<?php

require_once "conexion.php";

class ModeloGestion{


	/*=============================================
	MOSTRAR Gestion
	=============================================*/

	static public function mdlMostrarGestion($tabla, $item, $valor){

		if($item != null){ // MOSTRAR SOLO 1 FILA

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{ // MOSTRAR TODAS LAS FILAS

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR BIMESTRE
	=============================================*/

	static public function mdlMostrarBimestre($tabla, $item1, $valor1, $item2, $valor2){

		if ($valor1 != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);

			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
			
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2 = :$item2 ORDER BY numeroBi ASC");

			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}
		

		
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR Gestion
	=============================================*/

	static public function mdlMostrarGestionActualUltima($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY cod_gestion DESC LIMIT 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	EDITAR BIMESTRE
	=============================================*/

	static public function mdlEditarBimestre($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET inicio = :inicio , fin = :fin WHERE cod_bimestre = :cod_bimestre");

		$stmt -> bindParam(":cod_bimestre", $datos["cod_bimestre"], PDO::PARAM_INT);
		$stmt -> bindParam(":inicio", $datos["inicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":fin", $datos["fin"], PDO::PARAM_STR);
		
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



	
}