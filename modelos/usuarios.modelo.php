<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

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
	MOSTRAR USUARIOS PARA TABLAS ESPECIFICAS
	=============================================*/

	static public function mdlMostrarUsuariosE($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlCrearUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ape_paterno, ape_materno, nombre_usu, tipo_usu, fecha_nac, carnet, passwor, foto_perfil) VALUES (:ape_paterno, :ape_materno, :nombre_usu, :tipo_usu, :fecha_nac, :carnet, :passwor, :foto_perfil)");

		$stmt->bindParam(":ape_paterno", $datos["ape_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":ape_materno", $datos["ape_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_usu", $datos["nombre_usu"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_usu", $datos["tipo_usu"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nac", $datos["fecha_nac"], PDO::PARAM_STR);
		$stmt->bindParam(":carnet", $datos["carnet"], PDO::PARAM_STR);
		$stmt->bindParam(":passwor", $datos["passwor"], PDO::PARAM_STR);
		$stmt->bindParam(":foto_perfil", $datos["foto_perfil"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ape_paterno = :ape_paterno, ape_materno = :ape_materno, nombre_usu = :nombre_usu, fecha_nac = :fecha_nac, carnet = :carnet, passwor = :passwor, foto_perfil = :foto_perfil WHERE cod_usu = :cod_usu");

		$stmt->bindParam(":ape_paterno", $datos["ape_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":ape_materno", $datos["ape_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_usu", $datos["nombre_usu"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nac", $datos["fecha_nac"], PDO::PARAM_STR);
		$stmt->bindParam(":carnet", $datos["carnet"], PDO::PARAM_INT);
		$stmt->bindParam(":passwor", $datos["passwor"], PDO::PARAM_STR);
		$stmt->bindParam(":foto_perfil", $datos["foto_perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":cod_usu", $datos["cod_usu"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

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


	/*=============================================
	MOSTRAR LISTA DE ESTUDIANTES
	=============================================*/

	static public function mdlMostrarListaE($valor){

			$stmt = Conexion::conectar()->prepare("SELECT u.*, e.cod_est, i.* FROM usuarios u, estudiante e, inscripcion i WHERE u.cod_usu = e.cod_usu AND e.cod_est = i.cod_est AND i.cod_cur = :cod_cur");

			$stmt->bindParam(":cod_cur", $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();
		
			$stmt -> close();

			$stmt = null;

	}


	/*=============================================
	MOSTRAR INFORMACION DE ESTUDIANTE SEGUN EL TIPO
	=============================================*/

	static public function MdlMostrarUsuariosTipo($item, $valor){

		if($valor == 1){

			$stmt = Conexion::conectar()->prepare("SELECT u.*, a.* FROM usuarios u, administrativo a WHERE u.$item = :$item AND u.cod_usu = a.cod_usu AND a.estado = 1");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		if($valor == 2){

			$stmt = Conexion::conectar()->prepare("SELECT u.*, d.*, m.* FROM usuarios u, docente d, materia m WHERE u.$item = :$item AND u.cod_usu = d.cod_usu AND d.estado = 1 AND d.materia = m.cod_mat");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		if($valor == 3){
			
		}

		
	
		$stmt -> close();

		$stmt = null;

}

}