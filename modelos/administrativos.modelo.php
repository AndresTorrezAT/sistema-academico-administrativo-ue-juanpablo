<?php

require_once "conexion.php";

class ModeloAdministrativos{


    /*=============================================
	REGISTRO DE ADMINISTRATIVOS
	=============================================*/

	static public function mdlCrearAdministrativo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_usu, cargo, estado) VALUES (:cod_usu, :cargo, :estado)");

		$stmt->bindParam(":cod_usu", $datos["cod_usu"], PDO::PARAM_INT);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	


	/*=============================================
	MOSTRAR ADMINISTRATIVOS
	=============================================*/

	static public function mdlMostrarAdministrativos($tabla, $item, $valor){

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
	EDITAR ADMINISTRATIVO
	=============================================*/

	static public function mdlEditarAdministrativo($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cargo = :cargo WHERE cod_usu = :cod_usu");

		$stmt -> bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt -> bindParam(":cod_usu", $datos["cod_usu"], PDO::PARAM_INT);
		
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

    }



	/*=============================================
	ACTUALIZAR ADMINISTRATIVO
	=============================================*/

	static public function mdlActualizarAdministrativo($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	BORRAR ADMINISTRATIVO
    =============================================*/

    static public function mdlBorrarAdministrativo($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cod_usu = :cod_usu");

        $stmt -> bindParam(":cod_usu", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }

        $stmt -> close();
        
        $stmt = null;

    }
    

}    