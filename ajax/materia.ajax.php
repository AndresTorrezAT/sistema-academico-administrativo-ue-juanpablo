<?php

require_once "../controladores/materias.controlador.php";
require_once "../modelos/materias.modelo.php";

require_once "../controladores/gestion.controlador.php";
require_once "../modelos/gestion.modelo.php";

session_start();

class AjaxMaterias{

    /*============================
    EDITAR MATERIAS
    ============================*/

    public $idMateria;

    public function ajaxEditarMateria(){

        $item = "cod_mat";
        $valor = $this->idMateria;

        $respuesta = ControladorMaterias::ctrMostrarMaterias($item, $valor);

        echo json_encode($respuesta);

    }

    /*=====================================
    AGREGAR OPTIONS AL SELECT
    =====================================*/

    public $traerMaterias;
    public $nivelMaterias;

    public function ajaxAgregarSelect(){

        if($this->traerMaterias == "ok"){

            // OBTENER CODIGO DE LA PRESENTE GESTION
            
            // $item = "gestion";
            // $valor = $_SESSION["gestion"];

            // $Idgestion = ControladorGestion::ctrMostrarGestion($item, $valor);

            $valor = $this->nivelMaterias;

            $gestion = $_SESSION["gestion"];

            $respuesta = ControladorMaterias::ctrMostrarMateriasNivel($valor, $gestion);
    
            echo json_encode($respuesta);


        }
        
    }
}

/*==============================
EDITAR MATERIAS
==============================*/

if(isset($_POST["idMateria"])){

    $editar = new AjaxMaterias();
    $editar -> idMateria = $_POST["idMateria"];
    $editar -> ajaxEditarMateria();
}

/*=====================================
TRAER CURSOS
=====================================*/
if(isset($_POST["traerMaterias"])){

    $traerMaterias = new AjaxMaterias();
    $traerMaterias -> traerMaterias = $_POST["traerMaterias"];
    $traerMaterias -> nivelMaterias = $_POST["nivelCur"];
    $traerMaterias -> ajaxAgregarSelect();

}