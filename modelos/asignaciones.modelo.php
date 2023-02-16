<?php

require_once "conexion.php";

class ModeloAsignacion{

	/*=============================================
		MOSTRAR LAS ASIGNACIONES (ESPECIFICAS) - cod_curso - cod_materia
	=============================================*/

	static public function MdlMostrarAsignacionesEspecificas($tabla, $item, $valor){

		if ($item == "cod_cur") {
			
			$stmt = Conexion::conectar()->prepare("SELECT a.*, m.* FROM $tabla a, materia m WHERE a.$item = :$item AND a.cod_mat = m.cod_mat");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

        $stmt -> close();

        $stmt = null;

    }

	/*=============================================
		MOSTRAR LAS ASIGNACIONES 
	=============================================*/

	static public function MdlMostrarAsignacionGeneral($tabla, $item, $valor){ // cod_asig

		if ($valor != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
			
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); // todos los registros

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}
		
		$stmt -> close();

		$stmt = null;

    }


	/*=============================================
		MOSTRAR ASIGNACIONES DE UN DOCENTE
	=============================================*/

	static public function MdlMostrarAsignacionDocenteGestion($tabla, $item, $valor, $idGestion){

        $stmt = Conexion::conectar()->prepare("SELECT a.*, c.cod_gestion FROM $tabla a, curso c WHERE a.$item = :$item AND a.cod_cur = c.cod_cur AND c.cod_gestion = $idGestion");

        $stmt -> bindParam(":".$item , $valor, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

	/*=============================================
		MOSTRAR CURSOS ASIGNADOS DE UN DOCENTE
	=============================================*/

	static public function MdlMostrarCursosAsignadosADocenteGestion($tabla, $item, $valor, $idGestion){
		
        $stmt = Conexion::conectar()->prepare("SELECT c.* FROM $tabla a, curso c WHERE a.$item = :$item AND a.cod_cur = c.cod_cur AND c.cod_gestion = $idGestion GROUP BY a.cod_cur");

        $stmt -> bindParam(":".$item , $valor, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }


	/*=============================================
	MOSTRAR ASIGNACION
	=============================================*/

	static public function MdlMostrarAsignacion($tabla, $materia, $curso){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cod_cur = :cod_cur AND cod_mat = :cod_mat");


        $stmt -> bindParam(":cod_cur", $curso, PDO::PARAM_INT);

        $stmt -> bindParam(":cod_mat", $materia, PDO::PARAM_INT);

       

        $stmt -> execute();


        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;

    }


  /*=============================================
	GUARDAR ASIGANCION
	=============================================*/

	static public function mdlGuardarAsignacion($tabla, $materia, $curso, $docente){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_cur, cod_doc, cod_mat) VALUES (:cod_cur, :cod_doc, :cod_mat)");

		$stmt -> bindParam(":cod_cur", $curso, PDO::PARAM_STR);
		$stmt -> bindParam(":cod_doc", $docente, PDO::PARAM_STR);
    	$stmt -> bindParam(":cod_mat", $materia, PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	/*=============================================
	EDITAR (guardar) ASIGNACION
	=============================================*/

	static public function mdlEditarAsignacion($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cod_doc = :cod_doc WHERE cod_cur = :cod_cur AND cod_mat = :cod_mat");

		$stmt -> bindParam(":cod_doc", $datos["cod_doc"], PDO::PARAM_INT);
		$stmt -> bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);
		$stmt -> bindParam(":cod_mat", $datos["cod_mat"], PDO::PARAM_INT);
	
		
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

    }

}