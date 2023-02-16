<?php

require_once "conexion.php";

class ModeloInscritos{


    /*=============================================
	REGISTRO DE INSCRITOS
	=============================================*/

	static public function mdlCrearInscripcion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_ins, cod_gestion, cod_est, cod_deins, cod_cur) VALUES (:fecha_ins, :cod_gestion, :cod_est, :cod_deins, :cod_cur)");

		$stmt->bindParam(":fecha_ins", $datos["fecha_ins"], PDO::PARAM_STR);
		$stmt->bindParam(":cod_gestion", $datos["gestio_ins"], PDO::PARAM_STR);
        $stmt->bindParam(":cod_est", $datos["cod_est"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_deins", $datos["cod_deins"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);
       		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	


	/*=============================================
	ACTUALIZAR INSCRITOS
	=============================================*/

	static public function mdlActualizarInscrito($tabla, $item1, $valor1, $item2, $valor2){

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
	MOSTRAR INSCRITOS
	=============================================*/

	static public function mdlMostrarInscritos($tabla, $item, $valor , $gestion){

		if($item != null && $gestion != null){ // MOSTRAR SOLO 1 FILA

			$stmt = Conexion::conectar()->prepare("SELECT i.*, d.* FROM $tabla i, detalle_ins d WHERE i.$item = :$item AND i.cod_gestion = $gestion AND i.cod_deins = d.cod_deins");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}

		if($item == null && $gestion != null){ // MOSTRAR TODAS LAS FILAS

			$stmt = Conexion::conectar()->prepare("SELECT i.*, d.* FROM $tabla i, detalle_ins d WHERE i.cod_gestion = $gestion  AND i.cod_deins = d.cod_deins");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		if($item != null && $gestion == null){ // MOSTRAR TODAS LAS FILAS

			$stmt = Conexion::conectar()->prepare("SELECT i.*, d.* FROM $tabla i, detalle_ins d WHERE i.$item = :$item AND i.cod_deins = d.cod_deins");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}
		
		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR SUMA INSCRITOS
	=============================================*/

	static public function mdlMostrarSumaInscritos($tabla, $gestion){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(cod_est) as total FROM $tabla WHERE cod_gestion = $gestion AND estadoIns = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SUMA INSCRITOS SEGUN GENERO , NIVEL Y GESTION
	=============================================*/

	static public function mdlMostrarSumaInscritosGeneroNivel($tabla, $gestion, $estadoIns, $genero, $nivel){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(i.cod_ins) as total FROM $tabla i, estudiante e , curso c WHERE i.cod_gestion = $gestion AND i.estadoIns = $estadoIns AND i.cod_est = e.cod_est AND e.genero = $genero AND i.cod_cur = c.cod_cur AND c.nivel = $nivel");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR CANTIDAD DE INSCRITOS EN UN MISMO CURSO
	=============================================*/
	
	static public function mdlMostrarCantidadInscritosCurso($item, $valor, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(cod_ins) as cantidad FROM $tabla  WHERE $item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT); 

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SUMA INSCRITOS SEGUN NIVEL Y GESTION
	=============================================*/

	static public function mdlMostrarSumaInscritosNivel($tabla, $gestion, $estadoIns, $nivel){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(i.cod_ins) as total FROM $tabla i , curso c WHERE i.cod_gestion = $gestion AND i.estadoIns = $estadoIns AND i.cod_cur = c.cod_cur AND c.nivel = $nivel");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlMostrarInformacionCompletaInscrito($valor, $item){

		$stmt = Conexion::conectar()->prepare("SELECT u.*, e.*, i.*, d.*, c.* , g.* FROM usuarios u, estudiante e, inscripcion i, detalle_ins d, curso c, gestion g WHERE i.$item = :$item AND i.cod_est = e.cod_est AND e.cod_usu = u.cod_usu AND i.cod_deins = d.cod_deins AND i.cod_cur = c.cod_cur AND i.cod_gestion = g.cod_gestion");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT); 

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}    
