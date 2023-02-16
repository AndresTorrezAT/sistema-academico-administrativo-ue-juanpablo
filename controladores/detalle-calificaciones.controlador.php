<?php

class ControladorDetalleCal{

    /*=============================================
	MOSTRAR CALIFICACIONES DE FORMA DETALLADA FILAS QUE COMPONEN EL (SER-SABER-HACER-DECIDIR)
	=============================================*/

	static public function ctrMostrarDetallesDeCalificacion($idDimencion, $idCalificacion){

		$tabla = "detalle_cal";

		$respuesta = ModeloDetalleCal::MdlMostrarDetallesDeCalificacion($tabla, $idDimencion, $idCalificacion);

        return $respuesta;
        
	}

	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearCalificacionDetalleDefault($idDimencion, $idCalificacion, $tipo){

		$tabla = "detalle_cal";

		$datos = array("cod_dim"=>$idDimencion,
						"cod_cal"=>$idCalificacion,
						"tipo"=>$tipo,
						"ponderacion"=> 0);

		$respuesta = ModeloDetalleCal::MdlCrearCalificacionDetalleDefault($tabla, $datos);

		return $respuesta;

	}


	/*=============================================
	REGISTRAR PONDERACION - DIMENCION
	=============================================*/

	static public function ctrRegistrarNotaDetalle($cod_cal, $cod_dim, $valor){

		$tabla = "detalle_cal";

		$datos = array("cod_cal"=>$cod_cal,
						"cod_dim"=>$cod_dim,
						"ponderacion"=>$valor);

		$respuesta = ModeloDetalleCal::MdlRegistrarNotaDetalle($tabla, $datos);

		return $respuesta;

	}


}