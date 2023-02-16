<?php

require_once "conexion.php";

class ModeloDimenciones{

	/*=============================================
	MOSTRAR DIMENCIONES POR NUMERO Y BIMESTRE
	=============================================*/

	  static public function MdlMostrarDimenciones($tabla, $idAsignacion, $num, $bimestre){

      if($num != null){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cod_asig = :cod_asig AND num = :num AND cod_bimestre = :bimestre");

        $stmt -> bindParam(":cod_asig", $idAsignacion, PDO::PARAM_INT);
        $stmt -> bindParam(":num", $num, PDO::PARAM_INT);
        $stmt -> bindParam(":bimestre", $bimestre, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch();
        
      }else {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cod_asig = :cod_asig AND cod_bimestre = :bimestre ORDER BY tipo_dim ASC, num ASC");

        $stmt -> bindParam(":cod_asig", $idAsignacion, PDO::PARAM_INT);
        $stmt -> bindParam(":bimestre", $bimestre, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();
      
      }     

      $stmt -> close();
      $stmt = null;

    }


    /*=============================================
    MOSTRAR DIMENCIONES ESPECIFICAS
    =============================================*/

	  static public function MdlMostrarDimencionesEspecificas($tabla, $idAsignacion, $tipo, $bimestre){

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cod_asig = :cod_asig AND tipo_dim = :tipo_dim AND cod_bimestre = :cod_bimestre ORDER BY num ASC");

      $stmt -> bindParam(":cod_asig", $idAsignacion, PDO::PARAM_INT);
      $stmt -> bindParam(":tipo_dim", $tipo, PDO::PARAM_INT);
      $stmt -> bindParam(":cod_bimestre", $bimestre, PDO::PARAM_INT);

      $stmt -> execute();

      return $stmt -> fetchAll();

      $stmt -> close();
      $stmt = null;
    
    }


    /*===================================
    CREAR CATEGORIA
    ===================================*/

    static public function MdlCrearDimencion($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_asig, tipo_dim, num, nom_dim, cod_bimestre) VALUES (:cod_asig, :tipo_dim, :num, :nom_dim, :cod_bimestre)");

      $stmt->bindParam(":cod_asig", $datos["cod_asig"], PDO::PARAM_INT);
      $stmt->bindParam(":tipo_dim", $datos["tipo_dim"], PDO::PARAM_INT);
      $stmt->bindParam(":num", $datos["num"], PDO::PARAM_INT);
      $stmt->bindParam(":nom_dim", $datos["nom_dim"], PDO::PARAM_STR);
      $stmt->bindParam(":cod_bimestre", $datos["cod_bimestre"], PDO::PARAM_INT);

      if($stmt->execute()){

          return "ok";

      }else{

          return "error";
          
      }

      $stmt->close();
      $stmt = null;

  }


  /*=============================================
	EDITAR DIMENCION
	=============================================*/

	static public function mdlActualizarDimencion($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}