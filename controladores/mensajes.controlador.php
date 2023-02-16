<?php

class ControladorMensajes{


    /*=========================================
    REGISTRO DE MENSAJES
    ==========================================*/

    static public function ctrCrearMensaje(){

        if(isset($_POST["nuevoContenido"])){

            /*=============================================================================
                                     REGISTRO DE DATOS DE USUARIO
            ==============================================================================*/

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoContenido"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoDestinatario"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoOrigen"]) &&
               preg_match('/^[a-zA-Z0-9ÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsunto"])){ 


                /*=========================================
                VALIDAR IMAGEN
                ==========================================*/


                $tabla ="mensaje";

                date_default_timezone_set('America/La_Paz');
                        
                $fecha = date('Y-m-d');
                $hora = date('H:i:s');

                $fechaEnvio = $fecha.' '.$hora;

                $ruta="null";

                $datos = array("nuevoDestinatario" => $_POST["nuevoDestinatario"],
                                "nuevoOrigen" => $_POST["nuevoOrigen"],
                                "nuevoAsunto" => $_POST["nuevoAsunto"],
                                "fechaEnvio" => $fechaEnvio,
                                "imagenMsj" => $ruta,
                                "nuevoContenido" => $_POST["nuevoContenido"]);

                

                $respuesta = ModeloMensajes::mdlCrearMensaje($tabla, $datos);

                /*=============================================================================
                                     OBTENER CODIGO DE USUARIO
                ==============================================================================*/

                if($respuesta == "ok"){

                    $tabla ="mensaje";

                    $item = "fecha_envio";

                    $valor = $fechaEnvio;

                    $respuesta = ModeloMensajes::mdlMostrarMensajes($tabla, $item, $valor);

                    var_dump($fechaEnvio);//MOSTRAR VARIABLE EN PANTALLA
                    var_dump($respuesta);

                    /*=============================================================================
                                   REGISTRO DE MENSAJE EN BUZON DE USUARIOS
                    ==============================================================================*/

                    $tabla ="buzon";
                    $cod_men = $respuesta["cod_men"];
                    var_dump($cod_men);
                    $datos = array("nuevoDestinatario" => $_POST["nuevoDestinatario"],
                                   "nuevoCodMen" => $cod_men);

                    $respuesta = ModeloMensajes::mdlCrearMsjBuzon($tabla, $datos);

                    if($respuesta == "ok"){

                        echo'<script>
    
                        swal({
    
                            type: "success",
                            title: "¡El Mensaje ha sido enviado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
    
                        }).then((result)=>{
    
                            if(result.value){
    
                                window.location = "mensajes";
    
                            }
    
                        })
                        
                        </script>';
    
                    }

 
                }

                

            }
            else{

                echo'<script>

                    swal({

                        type: "error",
                        title: "¡El mensaje no pudo ser enviado!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "mensajes";

                        }

                    })
                    
                    </script>';

            }
        }
    }


    /*=========================================
    MOSTRAR MENSAJES DE BUZON
    ==========================================*/

    static public function ctrMostrarMensajesBuzon($valor){

        $respuesta = ModeloMensajes::MdlMostrarMensajesBuzon($valor);

        return $respuesta;
    }

    /*=========================================

    ==========================================*/

    static public function ctrMostrarMensajesEnviados($tipo, $idOrigen, $idDestino){

        $tabla = "mensaje";

        $respuesta = ModeloMensajes::MdlMostrarMensajesEnviados($tabla, $tipo, $idOrigen, $idDestino);

        return $respuesta;
    }

    /*======================================
    MOSTRAR MENSAJES
    ======================================*/

    static public function ctrMostrarMensajes($item, $valor){

        $tabla = "mensaje";

        $respuesta = ModeloMensajes::mdlMostrarMensajes($tabla, $item, $valor);
        
        return $respuesta;
    }



    /*======================================
    MOSTRAR BUZON
    ======================================*/

    static public function ctrMostrarBuzon($item, $valor){

        $tabla = "buzon";

        $respuesta = ModeloMensajes::mdlMostrarBuzon($tabla, $item, $valor);
        
        return $respuesta;
    }


    /*======================================
    MOSTRAR TODOS LOS MENSAJES ENVIADOS Y RECIBIDOS DE UN CHAT DE UN USUARIO
    ======================================*/

    static public function ctrMostrarMensajesEnviadosRecibidosDosUsuarios($valor1, $valor2, $gestion){

        $tablaM = "mensaje";

        $tablaB = "buzon";

        $tablaU = "usuarios";

        $respuesta = ModeloMensajes::mdlMostrarMensajesEnviadosRecibidosDosUsuarios($tablaM , $tablaB , $tablaU, $valor1, $valor2, $gestion);
        
        return $respuesta;
    }
}