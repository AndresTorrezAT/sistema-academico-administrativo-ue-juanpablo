<?php

require_once "../controladores/inscritos.controlador.php";
require_once "../modelos/inscripciones.modelo.php";


class AjaxInscritos{

    /*=============================
    TRAER INFO ESTUDIANTE
    =============================*/

    public $idEstudiante;
    public $gestion;

    public function ajaxMostrarInscritoGestion(){

        $item = "cod_est";
        $valor = $this->idEstudiante;
        $idGestion = $this->gestion;

        $respuesta = ControladorInscritos::ctrMostrarInscritos($item, $valor , $idGestion);

        echo json_encode($respuesta);

    }


    /*=============================
    OBTENER TODA LA INFORMACION DE UN INSCRITO
    =============================*/

    public $idInscrito;

    public function ajaxMostrarInformacionInscrito(){

        $item = "cod_ins";
        $valor = $this->idInscrito;

        $respuesta = ControladorInscritos::ctrMostrarInformacionCompletaInscrito($valor, $item);

        echo json_encode($respuesta);

    }

    

}

/*=============================
MOSTRAR INSCRITO
=============================*/
if(isset($_POST["InscritoGestion"])){

	$mostrarInscrito = new AjaxInscritos();
	$mostrarInscrito-> idEstudiante = $_POST["idEstudiante"];
    $mostrarInscrito-> gestion = $_POST["idGestion"];
	$mostrarInscrito -> ajaxMostrarInscritoGestion();        

}


/*=============================
MOSTRAR TODA LA INFORMACION DEL INSCRITO
=============================*/
if(isset($_POST["MostrarInformacionInscrito"])){

	$mostrarInscritoInformacion = new AjaxInscritos();
	$mostrarInscritoInformacion -> idInscrito = $_POST["idInscrito"];
	$mostrarInscritoInformacion -> ajaxMostrarInformacionInscrito();        

}