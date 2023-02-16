<?php

require_once "../controladores/administrativos.controlador.php";
require_once "../modelos/administrativos.modelo.php";

class AjaxAdministrativos{


    /*=============================
    ACTIVAR ADMINISTRATIVO
    =============================*/

    public $activarAdministrativo;
    public $activarId;

    public function ajaxActivarAdministrativo(){

        $tabla = "administrativo";

        $item1 = "estado";
        $valor1 = $this->activarAdministrativo;

        $item2 = "cod_adm";
        $valor2 = $this->activarId;

        $respuesta = ModeloAdministrativos::mdlActualizarAdministrativo($tabla, $item1, $valor1, $item2, $valor2);

    }


    /*=============================================
	EDITAR ADMINISTRATIVO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarAdministrativo(){

		$item = "cod_usu";
		$valor = $this->idUsuario;

		$respuesta = ControladorAdministrativos::ctrMostrarAdministrativos($item, $valor);

		echo json_encode($respuesta);

	}

}


/*=============================
ACTIVAR ADMINISTRATIVO 
=============================*/
if(isset($_POST["activarAdministrativo"])){

	$activarAdministrativo = new AjaxAdministrativos();
	$activarAdministrativo -> activarAdministrativo = $_POST["activarAdministrativo"];
	$activarAdministrativo -> activarId = $_POST["activarId"];
	$activarAdministrativo -> ajaxActivarAdministrativo();        

}

/*=============================================
EDITAR ADMINISTRATIVO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxAdministrativos();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarAdministrativo();

}