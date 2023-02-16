<?php

require_once "conexion.php";

class ModeloEstudiantes{


    /*=============================================
	REGISTRO DE ESTUDIANTES
	=============================================*/

	static public function mdlCrearEstudiante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_usu, genero, estado, peso, talla) VALUES (:cod_usu, :genero, :estado, :peso, :talla)");

		$stmt->bindParam(":cod_usu", $datos["cod_usu"], PDO::PARAM_INT);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_INT);
		$stmt->bindParam(":talla", $datos["talla"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	


	/*=============================================
	MOSTRAR ESTUDIANTES
	=============================================*/

	static public function mdlMostrarEstudiantes($tabla, $item, $valor){

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
	MOSTRAR DATOS DE lOS RESPONSABLES
	=============================================*/

	static public function mdlMostrarResponsablesInfo($valor){

		$stmt = Conexion::conectar()->prepare("SELECT *	FROM responsables WHERE cod_est = :cod_est");

		$stmt -> bindParam(":cod_est", $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}



	// /*=============================================
	// EDITAR ADMINISTRATIVO
	// =============================================*/

	// static public function mdlEditarAdministrativo($tabla, $datos){
	
	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cargo = :cargo WHERE cod_usu = :cod_usu");

	// 	$stmt -> bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":cod_usu", $datos["cod_usu"], PDO::PARAM_INT);
		
	// 	if($stmt -> execute()){

	// 		return "ok";
		
	// 	}else{

	// 		return "error";	

	// 	}

	// 	$stmt -> close();

	// 	$stmt = null;

    // }



	// /*=============================================
	// ACTUALIZAR ADMINISTRATIVO
	// =============================================*/

	// static public function mdlActualizarAdministrativo($tabla, $item1, $valor1, $item2, $valor2){

	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

	// 	$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
	// 	$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

	// 	if($stmt -> execute()){

	// 		return "ok";
		
	// 	}else{

	// 		return "error";	

	// 	}

	// 	$stmt -> close();

	// 	$stmt = null;

	// }



	// /*=============================================
	// BORRAR ADMINISTRATIVO
    // =============================================*/

    // static public function mdlBorrarAdministrativo($tabla, $datos){

    //     $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cod_usu = :cod_usu");

    //     $stmt -> bindParam(":cod_usu", $datos, PDO::PARAM_INT);

    //     if($stmt -> execute()){

    //         return "ok";

    //     }else{

    //         return "error";
    //     }

    //     $stmt -> close();
        
    //     $stmt = null;

    // }
	
	
	/*=============================================
	REGISTRO DE NOTA
	=============================================*/

	static public function mdlCrearNota($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_obs, descrip_obs, cod_est) VALUES (:fecha_obs, :descrip_obs, :cod_est)");

		$stmt->bindParam(":fecha_obs", $datos["fecha_obs"], PDO::PARAM_STR);
		$stmt->bindParam(":descrip_obs", $datos["descrip_obs"], PDO::PARAM_STR);
        $stmt->bindParam(":cod_est", $datos["cod_est"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

}    