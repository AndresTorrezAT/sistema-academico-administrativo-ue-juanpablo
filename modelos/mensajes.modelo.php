<?php

require_once "conexion.php";

class ModeloMensajes{


    /*=============================================
	REGISTRO EN TABLA MENSAJES
	=============================================*/

	static public function mdlCrearMensaje($tabla, $datos){

		$pdo = Conexion::conectar();

		$stmt = $pdo->prepare("INSERT INTO $tabla(fecha_envio, contenido, imagen_adj, tipo_men, origen, cod_cur, cod_gestion) VALUES (:fecha_envio, :contenido, :imagen_adj, :tipo_men, :origen, :cod_cur, :cod_gestion)");

		//$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_envio, contenido, imagen_adj, tipo_men, origen, cod_cur, cod_gestion) VALUES (:fecha_envio, :contenido, :imagen_adj, :tipo_men, :origen, :cod_cur, :cod_gestion)");

		$stmt->bindParam(":fecha_envio", $datos["fecha_envio"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen_adj", $datos["imagen_adj"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_men", $datos["tipo_men"], PDO::PARAM_INT);
		$stmt->bindParam(":origen", $datos["origen"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_cur", $datos["cod_cur"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_gestion", $datos["idGestion"], PDO::PARAM_INT);
		

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
	REGISTRO EN TABLA BUZON
	=============================================*/

	static public function mdlCrearMsjBuzon($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_usu, cod_men) VALUES (:cod_usu, :cod_men)");

		$stmt->bindParam(":cod_usu", $datos["nuevoDestinatario"], PDO::PARAM_INT);
        $stmt->bindParam(":cod_men", $datos["nuevoCodMen"], PDO::PARAM_INT);
        

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

    }
    
    
    /*=============================================
	MOSTRAR TABLA MENSAJES
	=============================================*/

	static public function mdlMostrarMensajes($tabla, $item, $valor){

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

	/*=============================================
	MOSTRAR TABLA BUZON
	=============================================*/

	static public function mdlMostrarBuzon($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

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
	

	/*=============================================
	MOSTRAR LOS MENSAJES DEL BUZON DE UN USUARIO Y MUESTRA LA INFORMACION DEL USUARIO QUE LE ENVIO ESOS MENSAJES
	=============================================*/

	static public function MdlMostrarMensajesBuzon($valor){

		$stmt = Conexion::conectar()->prepare("SELECT m.*, b.*, u.* FROM mensaje m, buzon b, usuarios u WHERE b.cod_men = m.cod_men AND m.origen = u.cod_usu AND b.cod_usu = :cod_usu");

		$stmt -> bindParam(":cod_usu", $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();
	
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR MENSAJES ENVIADOS - VARIAS CADENAS
	=============================================*/

	static public function MdlMostrarMensajesEnviados($tabla, $tipo, $idOrigen, $idDestino){

		if($tipo == 1) {

			
	
		}

		if($tipo == 2) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE origen = :origen AND cod_cur = :destino");

			$stmt -> bindParam(":origen", $idOrigen, PDO::PARAM_INT);
			$stmt -> bindParam(":destino", $idDestino, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();
	
		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR MENSAJES ENVIADOS Y RECIBIDOS DE UN USUARIO A OTRO
	=============================================*/

	static public function mdlMostrarMensajesEnviadosRecibidosDosUsuarios($tablaM, $tablaB, $tablaU, $valor1, $valor2, $gestion){

		$stmt = Conexion::conectar()->prepare("SELECT m.*, b.*, u.* FROM $tablaM m, $tablaB b, $tablaU u WHERE (m.origen = :valorUsuario OR m.origen = :valorContacto ) AND (b.cod_usu = :valorContacto OR b.cod_usu = :valorUsuario ) AND m.cod_men = b.cod_men AND m.cod_gestion = $gestion AND m.origen = u.cod_usu ORDER BY m.fecha_envio ASC");

		$stmt -> bindParam(":valorUsuario", $valor1, PDO::PARAM_INT);
		$stmt -> bindParam(":valorContacto", $valor2, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();
	
		$stmt -> close();

		$stmt = null;

	}
	
	
}


