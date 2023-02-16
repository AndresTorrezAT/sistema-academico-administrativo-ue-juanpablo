<?php

require_once "../controladores/inscritos.controlador.php";
require_once "../modelos/inscripciones.modelo.php";

require_once "../modelos/usuarios.modelo.php";

require_once "../modelos/estudiante.modelo.php";

class AjaxEstudiantes{

    /*=============================
    ACTIVAR ESTUDIANTE
    =============================*/

    public $activarInscrito;
    public $activarId;

    public function ajaxActivarIncrito(){

        $tabla = "inscripcion";

        $item1 = "estadoIns";
        $valor1 = $this->activarInscrito;

        $item2 = "cod_ins";
        $valor2 = $this->activarId;

        $respuesta = ModeloInscritos::mdlActualizarInscrito($tabla, $item1, $valor1, $item2, $valor2);

    }


    /*=============================
    TRAER LSITA DE ESTUDIANTES segun el CURSO
    =============================*/

    public $idCurso;

    public function ajaxListaDeEstudiantes(){

        $valor = $this->idCurso;

        $respuesta = ControladorInscritos::ctrMostrarListaE($valor);

        echo json_encode($respuesta);

    }

    /*=============================
    TRAER INFO ESTUDIANTE
    =============================*/

    public $idEstudiante;

    public function ajaxInfoEstudiante(){

        $valor = $this->idEstudiante;

        $respuesta = ControladorInscritos::ctrMostrarEstudianteInfo($valor);

        echo json_encode($respuesta);

    }



    /*=============================
    OBTENER INFORMACION DE RESPONSABLES DE ESTUDIANTE
    =============================*/

    public function ajaxInformacionResponsablesEstudiante(){

        $valor = $this->idEstudiante;

        $respuesta = ControladorInscritos::ctrMostrarResponsablesInfo($valor);

        echo json_encode($respuesta);

    }

    

}

/*=============================
ACTIVAR DOCENTE 
=============================*/
if(isset($_POST["activarInscrito"])){

	$activarInscrito = new AjaxEstudiantes();
	$activarInscrito -> activarInscrito = $_POST["activarInscrito"];
	$activarInscrito -> activarId = $_POST["activarId"];
	$activarInscrito -> ajaxActivarIncrito();        

}


/*=============================
TRAER LSITA DE ESTUDIANTES segun el CURSO
=============================*/
if(isset($_POST["idCurso"])){

	$listaEstudiantes = new AjaxEstudiantes();
	$listaEstudiantes -> idCurso = $_POST["idCurso"];
	$listaEstudiantes -> ajaxListaDeEstudiantes();        

}

/*=============================
INFO DEL ESTUDIANTE
=============================*/
if(isset($_POST["infoEstudiante"])){

	$infoEstudiantes = new AjaxEstudiantes();
	$infoEstudiantes -> idEstudiante = $_POST["idEstudiante"];
	$infoEstudiantes -> ajaxInfoEstudiante();        

}


/*=============================
MOSTRAR RESPONSABLES
=============================*/
if(isset($_POST["mostrarResponsables"])){

	$infoEstudiantes = new AjaxEstudiantes();
	$infoEstudiantes -> idEstudiante = $_POST["idEstudiante"];
	$infoEstudiantes -> ajaxInformacionResponsablesEstudiante();        

}