<?php

require_once "../controladores/mensajes.controlador.php";
require_once "../modelos/mensajes.modelo.php";

require_once "../controladores/usuarios.controlador.php";

session_start();

class TablaMensajeBuzon{

    /*=======================================
    MOSTRAR LA TABLA DE MENSAJES DEL BUZON
    =======================================*/

    public function mostrarTablaBuzon(){
        
        $valor = $_SESSION['idUsuario'];

        $mensajes = ModeloMensajes::MdlMostrarMensajesBuzon($valor);

        if (!empty($mensajes)){

            
            // $boton = "<button class='btn btn-success'>Abrir</button>";


            $datosJson = '{
                "data": [';

                for($i = 0; $i < count($mensajes); $i++){

                    if($mensajes[$i]["tipo_usu"] == 0){

                        $tipo = "<td class='mailbox-subject'><b>Direccion</b></td>";

                        $boton = "<button class='btn btn-success' id='btnAbrirRecibido' idMensaje='".$mensajes[$i]["cod_men"]."' nombre='".$mensajes[$i]["nombre_usu"]."' ape_paterno='".$mensajes[$i]["ape_paterno"]."' ape_materno='".$mensajes[$i]["ape_materno"]."' tipo='Direccion'>Abrir</button>";

                    }
                    else if($mensajes[$i]["tipo_usu"] == 1){

                        $tipo = "<td class='mailbox-subject'><b>Administrativo</b></td>";

                        $boton = "<button class='btn btn-success' id='btnAbrirRecibido' idMensaje='".$mensajes[$i]["cod_men"]."' nombre='".$mensajes[$i]["nombre_usu"]."' ape_paterno='".$mensajes[$i]["ape_paterno"]."' ape_materno='".$mensajes[$i]["ape_materno"]."' tipo='Administrativo'>Abrir</button>";

                    }
                    else if($mensajes[$i]["tipo_usu"] == 2){

                        $tipo = "<td class='mailbox-subject'><b>Docente</b></td>";

                        $boton = "<button class='btn btn-success' id='btnAbrirRecibido' idMensaje='".$mensajes[$i]["cod_men"]."' nombre='".$mensajes[$i]["nombre_usu"]."' ape_paterno='".$mensajes[$i]["ape_paterno"]."' ape_materno='".$mensajes[$i]["ape_materno"]."' tipo='Docente'>Abrir</button>";

                    }
                    else if($mensajes[$i]["tipo_usu"] == 3){

                        $tipo = "<td class='mailbox-subject'><b>Estudiantil</b></td>";

                        $boton = "<button class='btn btn-success' id='btnAbrirRecibido' idMensaje='".$mensajes[$i]["cod_men"]."' nombre='".$mensajes[$i]["nombre_usu"]."' ape_paterno='".$mensajes[$i]["ape_paterno"]."' ape_materno='".$mensajes[$i]["ape_materno"]."' tipo='Estudiante'>Abrir</button>";

                    }

                    $nombre = "<td><a href='read-mail.html'>".$mensajes[$i]["nombre_usu"]." ".$mensajes[$i]["ape_paterno"]."</a></td>";
                
                    $asunto = "<td class='mailbox-subject'><b>".$mensajes[$i]["asunto"]."</b></td>";
                    $fecha = "<td>".$mensajes[$i]["fecha_envio"]."</td>";       

                    /*=======================================
                    TRAEMOS LAS ACCIONES
                    =======================================*/

                    $datosJson .='[
                        "'.$boton.'",
                        "'.$nombre.'",
                        "'.$tipo.'",
                        "'.$asunto.'",
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
$activarBuzon = new TablaMensajeBuzon();
$activarBuzon -> mostrarTablaBuzon();