<?php

require_once "../controladores/mensajes.controlador.php";
require_once "../modelos/mensajes.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

session_start();

class TablaMensajeEnviado{

    /*=======================================
    MOSTRAR LA TABLA DE MENSAJES DEL BUZON
    =======================================*/

    public function mostrarTablaEnviado(){
        
        /*=======================================
        RECOGER MENSAJES ENVIADOS
        =======================================*/
            
        $valor = $_SESSION['idUsuario'];

        $mensajes = ModeloMensajes::MdlMostrarMensajesEnviados($valor);

        // $para = "<td><a href='read-mail.html'>Para:</a></td>"; 

        

        /*=======================================
        VERIFICAR SI HAY MENSAJES 
        =======================================*/

        if (!empty($mensajes)){

    

            $datosJson = '{

                "data": [';

                for($i = 0; $i < count($mensajes); $i++){

                     /*=======================================
                    CREAR VARIABLES COMUNES
                    =======================================*/

                    
                    $asunto = "<td class='mailbox-subject'><b>".$mensajes[$i]["asunto"]."</b></td>";
                    $fecha = "<td>".$mensajes[$i]["fecha_envio"]."</td>";

                    /*=======================================
                    TRAEMOS CODIGOS DE LOS USUARIOS QUE RECIBIERON EL MENSAJE EN EL BUZON
                    =======================================*/

                    $item = "cod_men";
                    $valor = $mensajes[$i]["cod_men"];

                    $codigoUsuario = ControladorMensajes::ctrMostrarBuzon($item, $valor);

                    

                    $item = "cod_usu";
                    $valor = $codigoUsuario["cod_usu"];

                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                    $para = "<td> Para: <a href='read-mail.html'>".$usuarios["nombre_usu"]."</a></td>";

                    

                    // $para = "<td><a href='read-mail.html'>Para:".$codigoUsuario["cod_usu"]."</a></td>";

                    

                    if($usuarios["tipo_usu"] == 0){

                        $tipo = "<td class='mailbox-subject'><b>Direccion</b></td>";

                        $boton = "<button class='btn btn-success' id='btnAbrirEnviado' idMensaje='".$mensajes[$i]["cod_men"]."' nombre='".$usuarios["nombre_usu"]."' ape_paterno='".$usuarios["ape_paterno"]."' ape_materno='".$usuarios["ape_materno"]."' tipo='Direccion'>Abrir</button>";

                    }
                    else if($usuarios["tipo_usu"] == 1){

                        $tipo = "<td class='mailbox-subject'><b>Administrativo</b></td>";

                        $boton = "<button class='btn btn-success' id='btnAbrirEnviado' idMensaje='".$mensajes[$i]["cod_men"]."' nombre='".$usuarios["nombre_usu"]."' ape_paterno='".$usuarios["ape_paterno"]."' ape_materno='".$usuarios["ape_materno"]."' tipo='Administrativo'>Abrir</button>";

                    }
                    else if($usuarios["tipo_usu"] == 2){

                        $tipo = "<td class='mailbox-subject'><b>Docente</b></td>";

                        $boton = "<button class='btn btn-success' id='btnAbrirEnviado' idMensaje='".$mensajes[$i]["cod_men"]."' nombre='".$usuarios["nombre_usu"]."' ape_paterno='".$usuarios["ape_paterno"]."' ape_materno='".$usuarios["ape_materno"]."' tipo='Docente'>Abrir</button>";

                    }
                    else if($usuarios["tipo_usu"] == 3){

                        $tipo = "<td class='mailbox-subject'><b>Estudiantil</b></td>";

                        $boton = "<button class='btn btn-success' id='btnAbrirEnviado' idMensaje='".$mensajes[$i]["cod_men"]."' nombre='".$usuarios["nombre_usu"]."' ape_paterno='".$usuarios["ape_paterno"]."' ape_materno='".$usuarios["ape_materno"]."' tipo='Estudiante'>Abrir</button>";

                    }

                    
                
                      

                    /*=======================================
                    TRAEMOS LAS ACCIONES
                    =======================================*/

                    $datosJson .='[
                        "'.$boton.'",
                        "'.$para.'",
                        "'.$asunto.'",
                        "'.$tipo.'",
                        "'.$fecha.'"
                    ],';

                }
                

                $datosJson = substr($datosJson, 0, -1);

                $datosJson .= ']

                }';  

                echo $datosJson;           
        }else{

         echo   '{

                "data": [
                  [
                    " ",
                    " ",
                    " ",
                    " ",
                    " ",
                    " "
                  ]
                ]
            }';


        }
    }

}

/*===========================================
ACTIVAR TABLA DE BUZON
===========================================*/
$activarBuzon = new TablaMensajeEnviado();
$activarBuzon -> mostrarTablaEnviado();