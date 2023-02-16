<?php

require_once "conexion.php";

class ModeloDetalleIns{


    /*=============================================
	REGISTRO DE DETALLE DE INSCRIPCION
	=============================================*/

	static public function mdlCrearDetalleIns($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(libreta_ori, cert_vac, cert_nac, factura, rude, tel_fijo, celular_con, direccion, num_puerta) VALUES (:libreta_ori, :cert_vac, :cert_nac, :factura, :rude, :tel_fijo, :celular_con, :direccion, :num_puerta)");
        
		$stmt->bindParam(":libreta_ori", $datos["libreta_ori"], PDO::PARAM_INT);
		$stmt->bindParam(":cert_vac", $datos["cert_vac"], PDO::PARAM_INT);
        $stmt->bindParam(":cert_nac", $datos["cert_nac"], PDO::PARAM_INT);
        $stmt->bindParam(":factura", $datos["factura"], PDO::PARAM_INT);
        $stmt->bindParam(":rude", $datos["rude"], PDO::PARAM_INT);
        $stmt->bindParam(":tel_fijo", $datos["tel_fijo"], PDO::PARAM_INT);
        $stmt->bindParam(":celular_con", $datos["celular_con"], PDO::PARAM_INT);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":num_puerta", $datos["num_puerta"], PDO::PARAM_INT);
  		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	

	/*=============================================
	MOSTRAR DETALLE DE INSCRIPCION
	=============================================*/

	static public function mdlMostrarDetalleIns($tabla, $item, $valor){

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
	
}    
	