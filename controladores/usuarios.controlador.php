<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "carnet";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta != ""){ // SI EL USUARIO EXISTE

					if( $_POST["ingUsuario"] == $respuesta["carnet"] && $respuesta["passwor"] == $encriptar){ // COMPRUENA QUE LAS CONTRASEÑAS SON LAS MISMAS

						//VARIABLES DE USUARIO

						$item = "cod_usu";
						$valor = $respuesta["cod_usu"];

						//=====================================
						// VARIABLES DE SESION
						//=====================================

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["idUsuario"] = $respuesta["cod_usu"];
						$_SESSION["nombre"] = $respuesta["nombre_usu"];
						$_SESSION["foto"] = $respuesta["foto_perfil"];
						$_SESSION["tipo"] = $respuesta["tipo_usu"];

						$gestionActual = ControladorGestion::ctrMostrarGestionActualUltima();

						$_SESSION["gestion"] = $gestionActual["cod_gestion"];

						//=====================================
						// VARIABLES DE JAVASCRIPT
						//=====================================


						switch ($respuesta["tipo_usu"]) {

							case 1: // ADMINISTRATIVO

								$tabla = "administrativo";

								$administrativo = ModeloAdministrativos::mdlMostrarAdministrativos($tabla, $item, $valor);

								$_SESSION["idAdministrativo"] = $administrativo["cod_adm"];

								break;
							
							case 2: // DOCENTE

								$tabla = "docente";
						
								$docente = ModeloDocentes::mdlMostrarDocentes($tabla, $item, $valor);

								$_SESSION["idDocente"] = $docente["cod_doc"];
								$_SESSION["nivelDocente"] = $docente["nivel"];
								$_SESSION["materiaDocente"] = $docente["materia"];

								break;

							case 3: // ESTUDIANTE 

								$tabla = "estudiante";
							
								$estudiante = ModeloEstudiantes::mdlMostrarEstudiantes($tabla, $item, $valor);

								$tabla = "inscripcion";

								$item = "cod_est";
								$valor = $estudiante["cod_est"];
								$gestion = $gestionActual["cod_gestion"];

								$inscrito = ModeloInscritos::mdlMostrarInscritos($tabla, $item, $valor , $gestion);

								$_SESSION["idCurso"] = $inscrito["cod_cur"];

								$_SESSION["idInscrito"] = $inscrito["cod_ins"];

								$_SESSION["idEstudiante"] = $estudiante["cod_est"];

								break;
						}

						echo '<script>

							window.location = "inicio";

						</script>';

						

					}else{

						echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

					}

			   	}else{ // NO EXISTE EL USUARIO

					echo '<br><div class="alert alert-danger">El usuario no existe</div>';

				}

			}	

		}

	}

	/*=============================================
	MOSTRAR USUARIO (TODOS O SOLO UNO)
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR USUARIO (VARIOS ESPECIFICOS)
	=============================================*/

	static public function ctrMostrarUsuariosE($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuariosE($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR USUARIO (VARIOS ESPECIFICOS)
	=============================================*/

	static public function ctrMostrarUsuariosTipo($item, $valor){

		$respuesta = ModeloUsuarios::MdlMostrarUsuariosTipo($item, $valor);

		return $respuesta;
	}


}
	

