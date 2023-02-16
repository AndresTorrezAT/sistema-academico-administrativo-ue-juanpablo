<?php

require_once "conexion.php";

class ModeloDetalleCal{

	/*=============================================
	MOSTRAR CALIFICACIONES DE FORMA DETALLADA FILAS QUE COMPONEN EL (SER-SABER-HACER-DECIDIR)
	=============================================*/

	static public function MdlMostrarDetallesDeCalificacion($tabla, $idDimencion, $idCalificacion){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cod_dim = :cod_dim AND cod_cal = :cod_cal");

        $stmt -> bindParam(":cod_dim", $idDimencion, PDO::PARAM_INT);
        $stmt -> bindParam(":cod_cal", $idCalificacion, PDO::PARAM_INT);
      

        $stmt -> execute();

        return $stmt -> fetch();
		
		$stmt -> close();

		$stmt = null;

  }

  /*===================================
    CREAR CATEGORIA
    ===================================*/

  static public function MdlCrearCalificacionDetalleDefault($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cod_dim, cod_cal, tipo, ponderacion) VALUES (:cod_dim, :cod_cal, :tipo, :ponderacion)");

    $stmt->bindParam(":cod_dim", $datos["cod_dim"], PDO::PARAM_INT);
    $stmt->bindParam(":cod_cal", $datos["cod_cal"], PDO::PARAM_INT);
    $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_INT);
    $stmt->bindParam(":ponderacion", $datos["ponderacion"], PDO::PARAM_INT);
 

    if($stmt->execute()){

        return "ok";

    }else{

        return "error";
        
    }

    $stmt->close();
    $stmt = null;

  }

  /*=============================================
  REGISTRAR PONDERACION - DIMENCION
  =============================================*/
  
  static public function MdlRegistrarNotaDetalle($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ponderacion = :ponderacion WHERE cod_cal = :cod_cal AND cod_dim = :cod_dim");

    $stmt -> bindParam(":cod_cal", $datos["cod_cal"], PDO::PARAM_INT);
    $stmt -> bindParam(":cod_dim", $datos["cod_dim"], PDO::PARAM_INT);
    $stmt -> bindParam(":ponderacion", $datos["ponderacion"], PDO::PARAM_INT);

    if($stmt -> execute()){

      return "ok";
    
    }else{

      return "error";	

    }

    $stmt -> close();

    $stmt = null;

  }

}