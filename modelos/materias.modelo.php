<?php

require_once "conexion.php";

class ModeloMaterias {

    /*=====================================
    MOSTRAR MATERIAS
    =====================================*/

    static public function mdlMostrarMaterias($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;
    }

	/*=====================================
    MOSTRAR MATERIA (ESPECIFICA)
    =====================================*/

    static public function mdlMostrarMateriaEspecifica($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre_mat = :nombre_mat AND nivel = :nivel AND cod_gestion = :gestion");

		$stmt->bindParam(":nombre_mat", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_INT);
		$stmt->bindParam(":gestion", $datos["cod_gestion"], PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

	/*=============================================
	MOSTRAR MATERIAS POR NIVEL
	=============================================*/

	static public function mdlMostrarMateriasNivel($tabla, $valor, $gestion){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nivel = :nivel AND cod_gestion = :gestion");

		$stmt -> bindParam(":nivel", $valor, PDO::PARAM_INT);
		$stmt -> bindParam(":gestion", $gestion, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();


		$stmt -> close();

		$stmt = null;

	}


    /*=============================================
    REGISTRAR MATERIA A BASE DE DATOS
	=============================================*/

	static public function mdlCrearMateria($tabla, $datos){

		$pdo = Conexion::conectar();

		$stmt = $pdo->prepare("INSERT INTO $tabla(nombre_mat, nivel, cod_gestion) VALUES (:nombre_mat, :nivel, :gestion)");

		$stmt->bindParam(":nombre_mat", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":nivel", $datos["nivel"], PDO::PARAM_INT);
		$stmt->bindParam(":gestion", $datos["cod_gestion"], PDO::PARAM_INT);


		if($stmt->execute()){

			$lastInsertId = $pdo->lastInsertId();

			return $lastInsertId;	

		}else{

			return "error";
		
		}

		$stmt->close();
		$pdo->close();
		
		$stmt = null;

    }


    /*=============================================
	EDITAR MATERIA
	=============================================*/

	static public function mdlEditarMateria($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_mat = :nombre_mat, nivel = :nivel WHERE cod_mat = :cod_mat");

		$stmt -> bindParam(":nombre_mat", $datos["nombre_mat"], PDO::PARAM_STR);
		$stmt -> bindParam(":nivel", $datos["nivel"], PDO::PARAM_INT);
		$stmt -> bindParam(":cod_mat", $datos["cod_mat"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR MATERIA
	=============================================*/

	static public function mdlBorrarMateria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cod_mat = :cod_mat");

		$stmt -> bindParam(":cod_mat", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}


	/*=============================================
    REGISTRO DE HORARIO
	=============================================*/

	static public function mdlCrearHorario($tabla, $datos){

		//LUNES

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dia, periodo1, periodo2, periodo3, periodo4, periodo5, periodo6, periodo7, periodo8 ,cod_cur) VALUES ('1', :periodo1, :periodo2, :periodo3, :periodo4, :periodo5, :periodo6, :periodo7, :periodo8, :cod_cur)");

		$stmt->bindParam(":periodo1", $datos["row11"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo2", $datos["row21"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo3", $datos["row31"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo4", $datos["row41"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo5", $datos["row61"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo6", $datos["row71"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo7", $datos["row81"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo8", $datos["row91"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);

		$stmt->execute();
		

		//MARTES

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dia, periodo1, periodo2, periodo3, periodo4, periodo5, periodo6, periodo7, periodo8 ,cod_cur) VALUES ('2', :periodo1, :periodo2, :periodo3, :periodo4, :periodo5, :periodo6, :periodo7, :periodo8, :cod_cur)");

		$stmt->bindParam(":periodo1", $datos["row12"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo2", $datos["row22"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo3", $datos["row32"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo4", $datos["row42"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo5", $datos["row62"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo6", $datos["row72"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo7", $datos["row82"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo8", $datos["row92"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);

		$stmt->execute();


		//MIERCOLES

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dia, periodo1, periodo2, periodo3, periodo4, periodo5, periodo6, periodo7, periodo8 ,cod_cur) VALUES ('3', :periodo1, :periodo2, :periodo3, :periodo4, :periodo5, :periodo6, :periodo7, :periodo8, :cod_cur)");
		
		$stmt->bindParam(":periodo1", $datos["row13"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo2", $datos["row23"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo3", $datos["row33"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo4", $datos["row43"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo5", $datos["row63"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo6", $datos["row73"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo7", $datos["row83"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo8", $datos["row93"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);

		$stmt->execute();

		//JUEVES

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dia, periodo1, periodo2, periodo3, periodo4, periodo5, periodo6, periodo7, periodo8 ,cod_cur) VALUES ('4', :periodo1, :periodo2, :periodo3, :periodo4, :periodo5, :periodo6, :periodo7, :periodo8, :cod_cur)");
		
		$stmt->bindParam(":periodo1", $datos["row14"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo2", $datos["row24"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo3", $datos["row34"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo4", $datos["row44"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo5", $datos["row64"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo6", $datos["row74"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo7", $datos["row84"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo8", $datos["row94"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);

		$stmt->execute();

		//VIERNES

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dia, periodo1, periodo2, periodo3, periodo4, periodo5, periodo6, periodo7, periodo8 ,cod_cur) VALUES ('5', :periodo1, :periodo2, :periodo3, :periodo4, :periodo5, :periodo6, :periodo7, :periodo8, :cod_cur)");

		
		$stmt->bindParam(":periodo1", $datos["row15"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo2", $datos["row25"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo3", $datos["row35"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo4", $datos["row45"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo5", $datos["row65"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo6", $datos["row75"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo7", $datos["row85"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo8", $datos["row95"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

    }
    
}