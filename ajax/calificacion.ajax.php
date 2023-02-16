<?php

require_once "../controladores/calificaciones.controlador.php";
require_once "../modelos/calificaciones.modelo.php";


require_once "../controladores/detalle-calificaciones.controlador.php";
require_once "../modelos/detalle-calificaciones.modelo.php";

class AjaxCalificacion{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

    public $cod_ins;
    public $cod_asig;
    public $cod_bi;

	public function ajaxMostrarCalificacion(){

        /* ---------------MOSTRAR CALIFICACIONES DE CADA ALUMNDO BIMESTRAL----------------*/

        $tabla = "calificaciones";

        $idAsignacion = $this->cod_asig;
        $idInscrito = $this->cod_ins;
        $idBimestre = $this->cod_bi;

        $respuesta = ModeloCalificaciones::MdlMostrarCalificacionesGeneralesBimestrales($tabla, $idAsignacion, $idInscrito, $idBimestre);

        /* --------SI LA VARIABLE ESTA VACIA (SIGNIFICA QUE EL ESTUDIANTE NO ESTA REGISTRADO EN LA TABLA DE CALIFICAIONES), ENTONCES SE LE CREA UNO DEFAULT----------*/
        
        if(empty($respuesta)) { //SI ESTA VACIA

            $datos = array("cod_bi"=>$idBimestre,
                           "ser"=> 0,
                           "saber"=> 0,
                           "hacer"=> 0,
                           "decidir"=> 0,
                           "nota_bi"=> 0,
                           "cod_ins"=>$idInscrito,
                           "cod_asig"=>$idAsignacion);

            $respuesta = ModeloCalificaciones::mdlIngresarCalificacionesBimestrales($tabla, $datos);        

            echo json_encode($respuesta); // ENVIA OK significa que se creo

        }else{ // NO ESTA VACIA

            echo json_encode($respuesta); // ENVIA LOS DATOS DE LA TABLA

        }

		


    }
    

    /*=============================================
	GUARDAR PONDERACION - DIMENCION
	=============================================*/	

    public $idCalificacion;
    public $idDimencion;
    public $value;

	public function ajaxRegistrarNotaDetalle(){

		$cod_cal = $this->idCalificacion;
        $cod_dim = $this->idDimencion;
        $valor = $this->value;

		$respuesta = ControladorDetalleCal::ctrRegistrarNotaDetalle($cod_cal, $cod_dim, $valor); // avanzer control y model

		echo json_encode($respuesta);


	}



    /*=============================================
	ACTUALIZAR CALIFICACION GENERAL
	=============================================*/	

    
    public $itemPromedio;
    public $valorPromedio;

	public function ajaxActualizarCalificacionGeneral(){

		$tipo = $this->itemPromedio;

        switch ($tipo) {

            case 5:

                $item1 = "auto_ser";
               
                break;
            case 6:

                $item1 = "auto_decidir";
            
                break;
           
        }

        $valor1 = $this->valorPromedio;
        $item2 = "cod_cal";
        $valor2 = $this->idCalificacion;

		$respuesta = ControladorCalificaciones::ctrActualizarCalificacion($item1, $valor1, $item2, $valor2); // avanzer control y model

		echo json_encode($respuesta);


	}

    /*=============================================
	AACTUALIZAR PROMEDIO BIMESTRAL
	=============================================*/	

	public function ajaxPromedioBimestral(){

		$item = "cod_cal";
        $valor = $this->idCalificacion;

		$respuesta = ControladorCalificaciones::ctrMostrarCalificacion($item, $valor); 

        $promedioBi = $respuesta["ser"] + $respuesta["saber"] + $respuesta["hacer"]  + $respuesta["decidir"] + $respuesta["auto_ser"] + $respuesta["auto_decidir"];

        $item1 = "nota_bi";

        $valor1 = $promedioBi;

        $item2 = "cod_cal";

        $valor2 = $valor;

        $respuesta = ControladorCalificaciones::ctrActualizarCalificacion($item1, $valor1, $item2, $valor2);

		echo json_encode($promedioBi);


	}


}

/*=============================================
MOSTRAR CALIFICACIONES
=============================================*/	

if(isset($_POST["idInscrito"])){

	$calificacion = new AjaxCalificacion();
    $calificacion -> cod_ins = $_POST["idInscrito"];
    $calificacion -> cod_asig = $_POST["idAsignacion"];
    $calificacion -> cod_bi = $_POST["bimestre"];
	$calificacion -> ajaxMostrarCalificacion();

}

/*=============================================
GUARDAR PONDERACION - DIMENCION
=============================================*/	

if(isset($_POST["value"])){

	$calificacion = new AjaxCalificacion();
    $calificacion -> value = $_POST["value"];
    $calificacion -> idDimencion = $_POST["idDimencion"];
    $calificacion -> idCalificacion = $_POST["idCalificacion"];
	$calificacion -> ajaxRegistrarNotaDetalle();

}

/*=============================================
ACTUALIZAR CALIFICACION GENERAL
=============================================*/	

if(isset($_POST["promedioAuto"])){

	$promedio = new AjaxCalificacion();
    $promedio -> idCalificacion = $_POST["idCalificacion"];
    $promedio -> itemPromedio = $_POST["tipoImput"];
    $promedio -> valorPromedio = $_POST["valor"];
	$promedio -> ajaxActualizarCalificacionGeneral();
}

/*=============================================
ACTUALIZAR PROMEDIO BIMESTRAL
=============================================*/	

if(isset($_POST["promedioBimestral"])){

	$promedio = new AjaxCalificacion();
    $promedio -> idCalificacion = $_POST["idCalificacion"];
	$promedio -> ajaxPromedioBimestral();
}