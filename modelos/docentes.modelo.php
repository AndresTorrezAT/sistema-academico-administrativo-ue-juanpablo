<?php

require_once "conexion.php";

class ModeloDocentes{


    /*=============================================
	REGISTRO DE DOCENTE
	=============================================*/

	static public function mdlCrearDocente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_usu, formacion, estado, materia, nivel) VALUES (:cod_usu, :formacion, :estado, :materia, :nivel)");

		$stmt->bindParam(":cod_usu", $datos["cod_usu"], PDO::PARAM_INT);
		$stmt->bindParam(":formacion", $datos["formacion"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":materia", $datos["materia"], PDO::PARAM_INT);
		$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	


	/*=============================================
	MOSTRAR DOCENTE
	=============================================*/

	static public function mdlMostrarDocentes($tabla, $item, $valor){

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
	MOSTRAR DOCENTE E INFORMACION DE USUARIO
	=============================================*/

	static public function MdlMostrarDocentesInfoUsuario($tabla, $item, $valor){


		if($item == null){ 

			$stmt = Conexion::conectar()->prepare("SELECT d.* , u.* FROM $tabla d, usuarios u");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else {

			$stmt = Conexion::conectar()->prepare("SELECT d.* , u.* FROM $tabla d, usuarios u WHERE d.$item = :$item AND d.cod_usu = u.cod_usu");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR DOCENTE POR MATERIA
	=============================================*/

	static public function MdlMostrarDocentesPorMateria($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT d.* , u.* FROM $tabla d, usuarios u WHERE d.$item = :$item AND d.cod_usu = u.cod_usu");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	EDITAR DOCENTE
	=============================================*/

	static public function mdlEditarDocente($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET formacion = :formacion, materia = :materia  WHERE cod_usu = :cod_usu");

		$stmt -> bindParam(":formacion", $datos["formacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":cod_usu", $datos["cod_usu"], PDO::PARAM_INT);
		$stmt -> bindParam(":materia", $datos["materia"], PDO::PARAM_INT);
		
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

    }



	/*=============================================
	ACTUALIZAR DOCENTES
	=============================================*/

	static public function mdlActualizarDocente($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR DOCENTE
    =============================================*/

    static public function mdlBorrarDocente($tabla, $datos){

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