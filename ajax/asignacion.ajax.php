<?php

require_once "../controladores/asignaciones.controlador.php";
require_once "../modelos/asignaciones.modelo.php";

class AjaxAsignacion{

    /*============================
    TRAER ASIGNACION
    ============================*/

    public $idDocente;
    public $gestion;

    public function ajaxMostrarCursosAsignadosDocente(){

        $item = "cod_doc";

        $valor = $this->idDocente;

        $idGestion = $this->gestion;

        $respuesta = ControladorAsignacion::ctrMostrarCursosAsignadosADocenteGestion($item, $valor, $idGestion); /// cambiar <-

        echo json_encode($respuesta);

    }


    /*============================
    TRAER ASIGNACION
    ============================*/

    public $traerCurso;

    public function ajaxMostrarAsignacionesCurso(){

        $item = "cod_cur";

        $valor = $this->traerCurso;

        $respuesta = ControladorAsignacion::ctrMostrarAsignacionesEspecificas($item, $valor); /// cambiar <-

        echo json_encode($respuesta);

    }


    /*============================
    GUARDAR ASIGNACION
    ============================*/

    public $guardarMateria;
    public $guardarCurso;
    public $guardarDocente;

    public function ajaxGuardarAsignacion(){

        $tabla = "asignacion";


        $materia = $this->guardarMateria;
        $curso = $this->guardarCurso;
        $docente = $this->guardarDocente;

        $respuesta = ModeloAsignacion::mdlGuardarAsignacion($tabla, $materia, $curso, $docente);

        echo json_encode($respuesta);

    }

    
}

/*=====================================
MOSTRAR CURSOS ASIGNADOS A DOCENTE
=====================================*/
if(isset($_POST["traerCursosAsignadosDocente"])){///

    $traerCursosAsignados = new AjaxAsignacion();
    $traerCursosAsignados -> gestion = $_POST["idGestion"];
    $traerCursosAsignados -> idDocente = $_POST["idDocente"];
    $traerCursosAsignados -> ajaxMostrarCursosAsignadosDocente();

}


/*=====================================
TRAER ASIGNACION
=====================================*/
if(isset($_POST["traerMateriasAsignadasCurso"])){

    $traerAsignacion = new AjaxAsignacion();
    $traerAsignacion -> traerCurso = $_POST["idCurso"];
    $traerAsignacion -> ajaxMostrarAsignacionesCurso();

}

/*=====================================
GUARDAR ASIGNACION
=====================================*/
if(isset($_POST["guardarDocente"])){

    $guardarAsignacion = new AjaxAsignacion();
    $guardarAsignacion -> guardarMateria = $_POST["guardarMateria"];
    $guardarAsignacion -> guardarCurso = $_POST["guardarCurso"];
    $guardarAsignacion -> guardarDocente = $_POST["guardarDocente"];
    $guardarAsignacion -> ajaxGuardarAsignacion();

}