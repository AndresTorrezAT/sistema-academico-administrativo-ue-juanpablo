<?php

require_once "../controladores/dimenciones.controlador.php";
require_once "../modelos/dimenciones.modelo.php";

require_once "../controladores/detalle-calificaciones.controlador.php";
require_once "../modelos/detalle-calificaciones.modelo.php";

require_once "../controladores/calificaciones.controlador.php";
require_once "../modelos/calificaciones.modelo.php";

class AjaxDimencion{

    /*=============================================
	VARIABLES GENERALES
	=============================================*/	


    public $cod_asig;
    public $num_bi;
    public $cod_bi;
    public $tipo;
    public $numero;
    public $nombre;
    public $cod_cal;

    

	/*=============================================
	MOSTRAR DIMENCIONES
	=============================================*/	

    

	// public function ajaxMostrarDimencion(){

    //     $idAsignacion = $this->cod_asig;
    //     $bimestre = $this->num_bi;
    //     $num = $this->numero;

    //     $respuesta = ControladorDimenciones::ctrMostrarDimenciones($idAsignacion, $num, $bimestre);
        
    //     echo json_encode($respuesta);


	// }

    /*=============================================
	CREAR DIMENCION DEFAULT
	=============================================*/	

   

	public function ajaxCrearDefaultDimencion(){

        $tabla = "dimenciones";

		$datos = array("cod_asig"=> $this->cod_asig,
						"tipo_dim"=> $this->tipo,
						"num"=> $this->numero,
						"nom_dim"=> $this->nombre,
						"cod_bimestre"=> $this->cod_bi);

        $respuesta =  ModeloDimenciones::MdlCrearDimencion($tabla, $datos);
        
        echo json_encode($respuesta);


	}

    /*=============================================
	COMPROBAR QUE LAS DIMENCIONES ESTAN CREADAS
	=============================================*/	

	public function ajaxMostrarDimencionBimestre(){

        $idAsignacion = $this->cod_asig;
        $bimestre = $this->num_bi;
        $num = null;

        $respuesta = ControladorDimenciones::ctrMostrarDimenciones($idAsignacion, $num, $bimestre);

        if(empty($respuesta)) {

            for ($i = 1; $i <= 4; $i++) {

                if ($i == 1 || $i == 4) {

                    $max = 3;
                    
                }

                if ($i == 2 || $i == 3) {

                    $max = 4;
                    
                }

                for ($num = 1; $num <= $max ; $num++) {

                    $tabla = "dimenciones";

                    $datos = array("cod_asig"=> $idAsignacion,
                                    "tipo_dim"=> $i,
                                    "num"=> $num,
                                    "nom_dim"=> "Dimen",
                                    "cod_bimestre"=> $bimestre);

                    $respuesta =  ModeloDimenciones::MdlCrearDimencion($tabla, $datos);


                }

            

            }

            
        }
        
        echo json_encode($respuesta);


	}

    /*=============================================
	MOSTRAR DIMENCIONES ESPECIFICAS
	=============================================*/	

	public function ajaxMostrarDimencionesEspecificas(){

        $idAsignacion = $this->cod_asig;
        $tipoDimen = $this->tipo;
        $bimestre = $this->cod_bi;

        $respuesta = ControladorDimenciones::ctrMostrarDimencionesEspecificas($idAsignacion, $tipoDimen, $bimestre);

        $idCalificacion = $this->cod_cal;

        $total = 0;

        $divisor = 0;

        foreach ($respuesta as $key => $value) {

            $idDimencion = $value["cod_dim"];

            $ponderacion = ControladorDetalleCal::ctrMostrarDetallesDeCalificacion($idDimencion, $idCalificacion);

            $total = $total + $ponderacion["ponderacion"];

            $divisor ++;

        }

        $ponderacion = round($total / $divisor);

        switch ($tipoDimen) {

            case 1:
                $item1 = "ser";
                break;
            case 2:
                $item1 = "saber";
                break;
            case 3:
                $item1 = "hacer";
                break;
            case 4:
                $item1 = "decidir";
                break;
        }

        $valor1 = $ponderacion;

        $item2 = "cod_cal";

        $valor2 = $idCalificacion;

        $respuesta = ControladorCalificaciones::ctrActualizarCalificacion($item1, $valor1, $item2, $valor2);
        
        
        echo json_encode($ponderacion);


	}

}

/*=============================================
MOSTRAR DIMENCIONES ESPECIFICAS
=============================================*/	

if(isset($_POST["tipoImput"])){

	$mostrarDim = new AjaxDimencion();
    $mostrarDim -> cod_asig = $_POST["idAsignacion"];
    $mostrarDim -> cod_bi = $_POST["idBimestre"];
    $mostrarDim -> tipo = $_POST["tipoImput"];
    $mostrarDim -> cod_cal = $_POST["idCalificacion"];
	$mostrarDim -> ajaxMostrarDimencionesEspecificas();

}

/*=============================================
MOSTRAR DIMENCIONES POR NUMERO
=============================================*/	

// if(isset($_POST["num"])){

// 	$mostrarDim = new AjaxDimencion();
//     $mostrarDim -> cod_asig = $_POST["idAsignacion"];
//     $mostrarDim -> num_bi = $_POST["bimestre"];
//     $mostrarDim -> numero = $_POST["num"];
// 	$mostrarDim -> ajaxMostrarDimencion();

// }

/*=============================================
CREAR DIMENCION 
=============================================*/	

if(isset($_POST["crearDimencion"])){

	$CrearDim = new AjaxDimencion();
    $CrearDim -> cod_asig = $_POST["idAsignacion"];
    $CrearDim -> cod_bi = $_POST["bimestre"];
    $CrearDim -> tipo = $_POST["tipo_dim"];
    $CrearDim -> numero = $_POST["num"];
    $CrearDim -> nombre = $_POST["nom_dim"];
	$CrearDim -> ajaxCrearDefaultDimencion();

}

/*=============================================
COMPROBAR QUE LAS DIMENCIONES ESTAN CREADAS
=============================================*/	

if(isset($_POST["revisar"])){

	$revisar = new AjaxDimencion();
    $revisar -> cod_asig = $_POST["idAsignacion"];
    $revisar -> num_bi = $_POST["bimestre"];
	$revisar -> ajaxMostrarDimencionBimestre();

}
