<?php

require_once "conexion.php";

class ModeloAsistencia{

    /*=============================================
	MOSTRAR REGISTRO DE ASISTENCIA DE UN ESTUDIANTE EN UNA MATERIA
	=============================================*/

	static public function MdlMostrarAsistencia($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 AND $item3 = :$item3");

        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }

    /*=============================================
	MOSTRAR TODOS LOS REGISTROS DE FECHAS DE UNA MATERIA EN UN BIMESTRE
	=============================================*/

	static public function MdlMostrarFechas($tabla, $bimestre, $cod_asig){

        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT fecha_asis FROM $tabla WHERE cod_bi = :bimestre AND cod_asig = :cod_asig ORDER BY fecha_asis ASC");

        $stmt -> bindParam(":bimestre", $bimestre, PDO::PARAM_INT);
        
        $stmt -> bindParam(":cod_asig", $cod_asig, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

    }


	/*=============================================
	MOSTRAR REGISTROS DE FECHA DE UN BIMESTRE DE UN ESTUDIANTE EN TODAS LAS ASIGNACIONES
	=============================================*/

	static public function MdlMostrarFechasEstudiante($tabla, $idBimestre, $idInscrito){

        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT fecha_asis FROM $tabla WHERE cod_bi = :cod_bi AND cod_ins = :cod_ins ORDER BY fecha_asis ASC");

        $stmt -> bindParam(":cod_bi", $idBimestre, PDO::PARAM_INT);
        
        $stmt -> bindParam(":cod_ins", $idInscrito, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

    }

	/*=============================================
	MOSTRAR FECHA ESPECIFICA DE ESTUDIANTE
	=============================================*/

	static public function MdlMostarFechaEspecificaEst($tabla, $idInscrito, $idAsignacion, $fechaAsis){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cod_ins = :cod_ins AND cod_asig = :cod_asig AND fecha_asis = :fecha");

        $stmt -> bindParam(":cod_ins", $idInscrito, PDO::PARAM_INT);
        
        $stmt -> bindParam(":cod_asig", $idAsignacion, PDO::PARAM_INT);

		$stmt -> bindParam(":fecha", $fechaAsis, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }


    /*=============================================
	REGISTRO DE ASISTENCIAS
	=============================================*/

	static public function mdlGuardarAsistencias($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_bi, fecha_asis, estado_asis, cod_ins, cod_asig) VALUES (:cod_bi, :fecha_asis, :estado_asis, :cod_ins, :cod_asig)");

		$stmt->bindParam(":cod_bi", $datos["bi_asis"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_asis", $datos["fecha_asis"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_asis", $datos["estado_asis"], PDO::PARAM_STR);
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

	/*=============================================
	MOSTRAR ASISTENCIA  DE UNA FECHA ESPECIFICA DE UN CURSO EN UNA MATERIA
	=============================================*/

	static public function MdlMostarAsistenciaEspecificaCursoAsignacion($tabla, $fecha, $bimestre, $idCurso){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE bi_asis = $bimestre AND fecha_asis = :fecha AND cod_cur = :cod_cur");

	      
        $stmt -> bindParam(":cod_cur", $idCurso, PDO::PARAM_INT);

		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

    }
}
