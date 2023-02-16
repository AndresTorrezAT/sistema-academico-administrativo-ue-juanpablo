<?php

require_once "conexion.php";

class ModeloCursos{

	/*=============================================
	MOSTRAR CURSOS
	=============================================*/

	static public function mdlMostrarCursos($tabla, $item, $valor, $gestion){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT c.* , g.* FROM $tabla c , gestion g WHERE c.$item = :$item AND c.cod_gestion = g.cod_gestion");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT c.* , g.* FROM $tabla c , gestion g WHERE c.cod_gestion = $gestion ORDER BY nivel ASC, grado ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR CURSOS (ESPECIFICO)
	=============================================*/

	static public function mdlMostrarCursoEspecifico($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("SELECT c.* , g.* FROM $tabla c , gestion g WHERE c.grado = :grado AND c.paralelo = :paralelo AND c.nivel = :nivel AND c.cupos = :cupos AND c.cod_gestion = :cod_gestion");

		$stmt->bindParam(":grado", $datos["grado"], PDO::PARAM_INT);
		$stmt->bindParam(":paralelo", $datos["paralelo"], PDO::PARAM_STR);
		$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_INT);
		$stmt->bindParam(":cupos", $datos["cupo"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_gestion", $datos["cod_gestion"], PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR CURSOS POR NIVEL
	=============================================*/

	static public function mdlMostrarCursosNivel($tabla, $valor ,$gestion){


		$stmt = Conexion::conectar()->prepare("SELECT c.* , g.* FROM $tabla c, gestion g WHERE c.nivel = :nivel AND g.cod_gestion = :gestion");

		$stmt -> bindParam(":nivel", $valor, PDO::PARAM_INT);
		$stmt -> bindParam(":gestion", $gestion, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();


		$stmt -> close();

		$stmt = null;

	}
	

	/*=============================================
	REGISTRO DE CURSOS
	=============================================*/

	static public function mdlCrearCurso($tabla, $datos){

		$pdo = Conexion::conectar();

		$stmt = $pdo->prepare("INSERT INTO $tabla(grado, paralelo, nivel, cupos, cod_gestion) VALUES (:grado, :paralelo, :nivel, :cupos, :cod_gestion)");

		$stmt->bindParam(":grado", $datos["grado"], PDO::PARAM_INT);
		$stmt->bindParam(":paralelo", $datos["paralelo"], PDO::PARAM_STR);
		$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_INT);
		$stmt->bindParam(":cupos", $datos["cupo"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_gestion", $datos["cod_gestion"], PDO::PARAM_INT);

		if($stmt->execute()){

			$lastInsertId = $pdo->lastInsertId();

			return $lastInsertId;	
			
		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	/*=============================================
	EDITAR CURSOS
	=============================================*/

	static public function mdlEditarCurso($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET grado = :grado, paralelo = :paralelo, nivel = :nivel, cupos = :cupos WHERE cod_cur = :cod_cur");

		$stmt -> bindParam(":grado", $datos["cod_cur"], PDO::PARAM_INT);
		$stmt -> bindParam(":paralelo", $datos["paralelo"], PDO::PARAM_STR);
		$stmt -> bindParam(":nivel", $datos["nivel"], PDO::PARAM_INT);
		$stmt -> bindParam(":cupos", $datos["cupos"], PDO::PARAM_INT);
		$stmt -> bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR CURSO
    =============================================*/
    
    static public function mdlActualizarCurso($tabla, $id, $dato){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET horario = :horario WHERE cod_cur = :cod_cur");

		$stmt -> bindParam(":horario", $dato, PDO::PARAM_INT);
		$stmt -> bindParam(":cod_cur", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

    }
	
	
	/*=============================================
	BORRAR CURSO
	=============================================*/

	static public function mdlBorrarCurso($tabla, $datos){

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