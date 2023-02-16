<?php

require_once "../controladores/mensajes.controlador.php";
require_once "../modelos/mensajes.modelo.php";

require_once "../controladores/inscritos.controlador.php";
require_once "../modelos/inscripciones.modelo.php";

require_once "../modelos/usuarios.modelo.php";

class AjaxMensajes{

    /*============================
    MOSTRAR MENSAJES DEL BUZON DE UN USUARIO
    ============================*/

    public $idUsuario;

    public function ajaxMostrarMensajesBuzon(){

        $valor = $this->idUsuario;

        $respuesta = ControladorMensajes::ctrMostrarMensajesBuzon($valor);

        echo json_encode($respuesta);

    }

    /*============================
    MOSTRAR TODOS LOS MENSAJES ENVIADOS Y RECIBIDOS DE UN CHAT DE UN USUARIO
    ============================*/

    public $idPerfil;
    public $idContacto;
    public $idGestion;

    public function ajaxMostrarMensajesEnviadosRecibidosDosUsuarios(){

        $valor1 = $this->idPerfil;

        $valor2 = $this->idContacto;

        $gestion = $this->idGestion;

        $respuesta = ControladorMensajes::ctrMostrarMensajesEnviadosRecibidosDosUsuarios($valor1 , $valor2, $gestion);

        echo json_encode($respuesta);

    }

    /*============================
    MOSTRAR TODOS LOS MENSAJES ENVIADOS DE USUARIO A UN CURSO (Docente)
    ============================*/
    
    public $idAsignacion;

    public function ajaxMostrarComunicadoUsuarioACurso(){

        $tipo = 2; 

        $item = "origen";

        $valor = $this->idAsignacion;

        $respuesta = ControladorMensajes::ctrMostrarMensajesEnviados($tipo, $item, $valor);

        echo json_encode($respuesta);

    }

    /*============================
  
    ============================*/
    
    public $idCurso;

    public function ajaxMostrarComunicadosCurso(){

        $tipo = 2; 
        $idOrigen = $this->idUsuario;
        $idDestino = $this->idCurso;

        $respuesta = ControladorMensajes::ctrMostrarMensajesEnviados($tipo, $idOrigen, $idDestino);

        echo json_encode($respuesta);

    }

    /*============================
    ENVIAR MENSAJE
    ============================*/
    
    public $contenido;
    public $imagen;
    public $gestion;
    public $tipo;
    public $origen;
    public $destino;

    public function ajaxEnviarMensaje(){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $this->contenido))
        { 

            if($this->tipo == 1){ // USUARIO A USUARIO

                date_default_timezone_set('America/La_Paz');
                $fecha = date('Y-m-d');
                $hora = date('H:i');

                $fechaEnvio = $fecha.' '.$hora;
    
                $datos = array("fecha_envio" => $fechaEnvio,
                                "contenido" => $this->contenido,
                                "imagen_adj" => $this->imagen,
                                "idGestion" => $this->gestion,
                                "tipo_men" => $this->tipo,
                                "origen" => $this->origen,
                                "cod_cur" => null);

                $tabla = "mensaje";
    
                $respuesta = ModeloMensajes::mdlCrearMensaje($tabla, $datos);

                if ($respuesta != "error") {

                    /*=============================================================================
                                   OBTENER INFO DEL MENSAJE QUE SE ENVIO
                    ==============================================================================*/

                    // $tabla ="mensaje";

                    // $item = "fecha_envio";

                    // $valor = $fechaEnvio;

                    // $respuesta = ModeloMensajes::mdlMostrarMensajes($tabla, $item, $valor);

                    //ACA ESTA EL ERROR - SE DEBE CAMBIAR LA FORMA DE BUSQUEDA Y NO POR FECHA, TIENE QUE SER POR CODIGO


                    /*=============================================================================
                                   REGISTRO DE MENSAJE EN BUZON DE USUARIOS
                    ==============================================================================*/

                    $tabla ="buzon";
                    // $cod_men = $respuesta["cod_men"];
                    $cod_men = $respuesta;
                    
                    $datos = array("nuevoDestinatario" => $this->destino,
                                   "nuevoCodMen" => $cod_men);

                    $respuesta = ModeloMensajes::mdlCrearMsjBuzon($tabla, $datos);
                    
                } 
                
            }

            if($this->tipo == 2){ // USUARIO A CURSO

                date_default_timezone_set('America/La_Paz');
                $fecha = date('Y-m-d');
                $hora = date('H:i:s');

                $fechaEnvio = $fecha.' '.$hora;
    
                $datos = array("fecha_envio" => $fechaEnvio,
                                "contenido" => $this->contenido,
                                "imagen_adj" => $this->imagen,
                                "idGestion" => $this->gestion,
                                "tipo_men" => $this->tipo,
                                "origen" => $this->origen,
                                "cod_cur" => $this->destino);

                $tabla = "mensaje";
    
                $respuesta = ModeloMensajes::mdlCrearMensaje($tabla, $datos);

                if ($respuesta != "error") {

                    /*=============================================================================
                                   OBTENER INFO DEL MENSAJE QUE SE ENVIO
                    ==============================================================================*/

                    // $tabla ="mensaje";

                    // $item = "fecha_envio";

                    // $valor = $fechaEnvio;

                    // $respuesta = ModeloMensajes::mdlMostrarMensajes($tabla, $item, $valor);


                    /*=============================================================================
                                   REGISTRO DE MENSAJE EN BUZON DE USUARIOS
                    ==============================================================================*/

                    $tabla ="buzon";
                    //$cod_men = $respuesta["cod_men"];
                    $cod_men = $respuesta;

                    $valor = $this->destino;

                    $estudiantes = ControladorInscritos::ctrMostrarListaE($valor);

                    foreach ($estudiantes as $key => $value) {

                        $datos = array("nuevoDestinatario" => $value["cod_usu"],
                                   "nuevoCodMen" => $cod_men);

                        $respuesta = ModeloMensajes::mdlCrearMsjBuzon($tabla, $datos);
                        
                    }
                                        
                } 
                
            }

            echo json_encode($respuesta);

        }


        

    }

}


/*==============================
MOSTRAR MENSAJE DEl BUZON DE UN USUARIO - ESTUDIANTE
==============================*/

// if(isset($_POST["idUsuario"])){

//     $mostrar = new AjaxMensajes();
//     $mostrar -> idUsuario = $_POST["idUsuario"];
//     $mostrar -> ajaxMostrarMensajesBuzon();
// }

/*==============================
MOSTRAR TODOS LOS MENSAJES ENVIADOS Y RECIBIDOS DE UN CHAT DE UN USUARIO
==============================*/

if(isset($_POST["idContacto"])){

    $chatUsuarioUsuario = new AjaxMensajes();
    $chatUsuarioUsuario -> idPerfil = $_POST["idPerfil"];
    $chatUsuarioUsuario -> idContacto = $_POST["idContacto"];
    $chatUsuarioUsuario -> idGestion = $_POST["idGestion"];
    $chatUsuarioUsuario -> ajaxMostrarMensajesEnviadosRecibidosDosUsuarios();
}

/*==============================
MOSTRAR TODOS LOS MENSAJES ENVIADOS DE USUARIO A UN CURSO (docente)
==============================*/

if(isset($_POST["idAsignacion"])){

    $comunicadoCurso = new AjaxMensajes();
    $comunicadoCurso -> idAsignacion = $_POST["idAsignacion"];
    $comunicadoCurso -> ajaxMostrarComunicadoUsuarioACurso();
}


/*==============================
MOSTRAR TODOS LOS MENSAJES ENVIADOS DE USUARIO A UN CURSO (administrador)
==============================*/

if(isset($_POST["mostrarComunicado"])){

    $comunicado = new AjaxMensajes();
    $comunicado -> idUsuario = $_POST["idUsuario"];
    $comunicado -> idCurso = $_POST["idCurso"];
    $comunicado -> ajaxMostrarComunicadosCurso();
}

/*==============================
ENVIAR MENSAJE
==============================*/

if(isset($_POST["enviar"])){

    $enviar = new AjaxMensajes();
    $enviar -> contenido = $_POST["contenido"];
    $enviar -> imagen = $_POST["imagen"];
    $enviar -> gestion = $_POST["gestion"];
    $enviar -> tipo = $_POST["tipo"];
    $enviar -> origen = $_POST["origen"];
    $enviar -> destino = $_POST["destino"];
    $enviar -> ajaxEnviarMensaje();
}