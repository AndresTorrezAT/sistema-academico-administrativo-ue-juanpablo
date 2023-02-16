<?php

require_once "../controladores/materias.controlador.php";
require_once "../modelos/materias.modelo.php";

require_once "../controladores/gestion.controlador.php";
require_once "../modelos/gestion.modelo.php";

require_once "../controladores/asignaciones.controlador.php";
require_once "../modelos/asignaciones.modelo.php";

session_start();

class AjaxHorario{

    /*============================
    TRAER ASIGNACION
    ============================*/

    public $idCurso;

    public function ajaxAgregarSelect(){

        $item = "cod_cur";

        $valor = $this->idCurso;

        $respuesta = ControladorAsignacion::ctrMostrarAsignacionesEspecificas($item, $valor); /// cambiar <-

        echo json_encode($respuesta);

    }
}


/*=====================================
TRAER CURSOS
=====================================*/
if(isset($_POST["traerMateriasHorario"])){

    $traerMaterias = new AjaxHorario();
    $traerMaterias -> idCurso = $_POST["idCurso"];
    $traerMaterias -> ajaxAgregarSelect();

}