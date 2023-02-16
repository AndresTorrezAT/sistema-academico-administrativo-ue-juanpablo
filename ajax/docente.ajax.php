<?php

require_once "../controladores/docentes.controlador.php";
require_once "../modelos/docentes.modelo.php";



class AjaxDocentes{


    /*=============================
    ACTIVAR DOCENTE
    =============================*/

    public $activarDocente;
    public $activarId;

    public function ajaxActivarDocente(){

        $tabla = "docente";

        $item1 = "estado";
        $valor1 = $this->activarDocente;

        $item2 = "cod_doc";
        $valor2 = $this->activarId;

        $respuesta = ModeloDocentes::mdlActualizarDocente($tabla, $item1, $valor1, $item2, $valor2);

    }


    /*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarDocente(){

		$item = "cod_usu";
		$valor = $this->idUsuario;

		$respuesta = ControladorDocentes::ctrMostrarDocentes($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	MOSTRAR DOCENTE E INFORMACION DE USUARIO
	=============================================*/	

	public $idDocente;

	public function ajaxMostrarDocente(){

		$item = "cod_doc";
		$valor = $this->idDocente;

		$respuesta = ControladorDocentes::ctrMostrarDocentesInfoUsuario($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	MOSTRAR DOCENTE SEGUN EL TIPO DE MATERIA QUE DICTAN
	=============================================*/	

	public $idMateria;

	public function ajaxMostrarDocentePorMateria(){

		$item = "materia";
		$valor = $this->idMateria;

		$respuesta = ControladorDocentes::ctrMostrarDocentesPorMateria($item, $valor);

		echo json_encode($respuesta);

	}

}


/*=============================
ACTIVAR DOCENTE 
=============================*/
if(isset($_POST["activarDocente"])){

	$activarDocente = new AjaxDocentes();
	$activarDocente -> activarDocente = $_POST["activarDocente"];
	$activarDocente -> activarId = $_POST["activarId"];
	$activarDocente -> ajaxActivarDocente();        

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxDocentes();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarDocente();

}

/*=============================================
MOSTRAR DOCENTE E INFORMACION DE USUARIO
=============================================*/
if(isset($_POST["idDocente"])){

	$mostrarDatos = new AjaxDocentes();
	$mostrarDatos -> idDocente = $_POST["idDocente"];
	$mostrarDatos -> ajaxMostrarDocente();

}


/*=============================================
MOSTRAR DOCENTE SEGUN EL TIPO DE MATERIA QUE DICTAN
=============================================*/
if(isset($_POST["idMateria"])){

	$mostrarDocenteMateria = new AjaxDocentes();
	$mostrarDocenteMateria -> idMateria = $_POST["idMateria"];
	$mostrarDocenteMateria -> ajaxMostrarDocentePorMateria();

}