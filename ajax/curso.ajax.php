<?php

require_once "../controladores/cursos.controlador.php";
require_once "../modelos/cursos.modelo.php";


class AjaxCursos{

    /*================================
    EDITAR CURSOS
    ================================*/

    public $idCurso;

    public function ajaxEditarCurso(){

        $item = "cod_cur";
        $valor = $this->idCurso;
        $gestion = null;

        $respuesta = ControladorCursos::ctrMostrarCursos($item, $valor, $gestion);

        echo json_encode($respuesta);
    }


    /*================================
    MOSTRAR CURSOS SEGUN NIVEL
    ================================*/

    public $nivel;
    public $idGestion;

    public function ajaxMostrarCursosNivel(){

        $valor = $this->nivel;
        $gestion = $this->idGestion;

        $respuesta = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

        echo json_encode($respuesta);
    }

}


/*================================
EDITAR CURSOS
================================*/

if(isset($_POST["idCurso"])){

    $editar = new AjaxCursos();
    $editar -> idCurso = $_POST["idCurso"];
    $editar -> ajaxEditarCurso();

}


/*================================
MOSTRAR CURSOS SEGUN NIVEL
================================*/

if(isset($_POST["traerCursosNivel"])){

    $mostrarCurso = new AjaxCursos();
    $mostrarCurso -> nivel = $_POST["nivel"];
    $mostrarCurso -> idGestion = $_POST["idGestion"];
    $mostrarCurso -> ajaxMostrarCursosNivel();

}

