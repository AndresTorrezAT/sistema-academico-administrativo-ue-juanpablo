<?php


class ControladorInscritos{

    /*=========================================
    REGISTRO DE ESTUDIANTE
    ==========================================*/

    static public function ctrCrearInscrito(){

        if(isset($_POST["nuevoNombre"])){

            /*=============================================================================
                                     REGISTRO DE DATOS DE USUARIO
            ==============================================================================*/

            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidoP"]) &&
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidoM"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoCi"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevaGestion"])){ 


                /*=========================================
                VALIDAR IMAGEN
                ==========================================*/

                $ruta = "";
             

                if(isset($_FILES["nuevaFoto"]["tmp_name"])){

        

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    
                    /*=========================================
                    CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                    ==========================================*/

                    $directorio ="vistas/img/usuarios/".$_POST["nuevoCi"];

                    mkdir($directorio, 0755); // propiedad de JS para crear carpetas

                    /*=========================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    ==========================================*/

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                        /*=========================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ==========================================*/

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["nuevoCi"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]); // crea la imagen

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);

                    }

                    if($_FILES["nuevaFoto"]["type"] == "image/png"){

                        /*=========================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ==========================================*/
    
                        $aleatorio = mt_rand(100,999);
    
                        $ruta = "vistas/img/usuarios/".$_POST["nuevoCi"]."/".$aleatorio.".png";
    
                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
    
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                        imagejpeg($destino, $ruta);
    
                        }

                }

                /*=============================================================================
                        REGISTRAR USUARIO
                ==============================================================================*/

                $tabla ="usuarios";
                $tipo = 3;


                date_default_timezone_set('America/La_Paz');
                $fecha = date('Y-m-d');


                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


                $datos = array("ape_paterno" => $_POST["nuevoApellidoP"],
                                "ape_materno" => $_POST["nuevoApellidoM"],
                                "nombre_usu" => $_POST["nuevoNombre"],
                                "tipo_usu" => $tipo,
                                "fecha_nac" => $_POST["nuevaFechaN"],
                                "carnet" => $_POST["nuevoCi"],
                                "passwor" => $encriptar,
                                "foto_perfil" => $ruta);

                //var_dump($datos); MOSTRAR VARIABLE EN PANTALLA

                $respuesta = ModeloUsuarios::mdlCrearUsuario($tabla, $datos);

                /*=============================================================================
                                     OBTENER CODIGO DE USUARIO
                ==============================================================================*/

                if($respuesta == "ok"){

                    $tabla ="usuarios";

                    $item ="carnet";

                    $valor = $_POST["nuevoCi"];

                    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                    $cod_usu = $respuesta["cod_usu"];

                    /*=============================================================================
                                   REGISTRO DE DATOS DE ESTUDIANTE
                    ==============================================================================*/

                    $tabla ="estudiante";

                    $estado = 1;

                    $datos = array("cod_usu" => $cod_usu,
                                   "genero" => $_POST["nuevoGenero"],
                                   "estado" => $estado,
                                   "peso" => $_POST["nuevoPeso"],
                                   "talla" => $_POST["nuevaTalla"]);

                    $respuesta = ModeloEstudiantes::mdlCrearEstudiante($tabla, $datos);


                    /*=============================================================================
                                     OBTENER CODIGO DE ESTUDIANTE
                    ==============================================================================*/

                    if($respuesta == "ok"){

                        $tabla ="estudiante";

                        $item ="cod_usu";

                        $valor = $cod_usu;

                        $respuesta = ModeloEstudiantes::mdlMostrarEstudiantes($tabla, $item, $valor);

                        /*=============================================================================
                                   REGISTRO DE DATOS DE RESPONSABLES
                        ==============================================================================*/

                        $tabla ="responsables";

                        $cod_est = $respuesta["cod_est"];

    
                        if(!empty($_POST["nuevoApellidoPP"]) && !empty($_POST["nuevoApellidoMP"])){

                            $tipo = "1";

                            $datos = array("cod_est" => $cod_est,
                                            "ci" => $_POST["nuevoCiP"],
                                            "nom_res" => $_POST["nuevoNombreP"],
                                            "pat_res" => $_POST["nuevoApellidoPP"],
                                            "mat_res" => $_POST["nuevoApellidoMP"],
                                            "tipo" => $tipo);

                            $respuesta = ModeloResponsables::mdlCrearResponsables($tabla, $datos);                

                        }

                        if(!empty($_POST["nuevoApellidoPM"]) && !empty($_POST["nuevoApellidoMM"])){

                            $tipo = "2";

                            $datos = array("cod_est" => $cod_est,
                                            "ci" => $_POST["nuevoCiM"],
                                            "nom_res" => $_POST["nuevoNombreM"],
                                            "pat_res" => $_POST["nuevoApellidoPM"],
                                            "mat_res" => $_POST["nuevoApellidoMM"],
                                            "tipo" => $tipo);
                            
                            $respuesta = ModeloResponsables::mdlCrearResponsables($tabla, $datos);            
                        }

                        if(!empty($_POST["nuevoApellidoPT"]) && !empty($_POST["nuevoApellidoMT"])){

                            $tipo = "3";

                            $datos = array("cod_est" => $cod_est,
                                            "ci" => $_POST["nuevoCiT"],
                                            "nom_res" => $_POST["nuevoNombreT"],
                                            "pat_res" => $_POST["nuevoApellidoPT"],
                                            "mat_res" => $_POST["nuevoApellidoMT"],
                                            "tipo" => $tipo);

                            $respuesta = ModeloResponsables::mdlCrearResponsables($tabla, $datos);        
                            
                        }

                        /*=============================================================================
                                   REGISTRO DE DATOS DE DETALLE
                        ==============================================================================*/

                        if($respuesta == "ok"){

                            $tabla ="detalle_ins";

                            $datos = array("libreta_ori" => $_POST["nuevaLibreta"],
                                           "cert_vac" => $_POST["nuevaVacuna"], 
                                           "cert_nac" => $_POST["nuevoCertificado"],
                                           "factura" => $_POST["nuevaFactura"],
                                           "rude" => $_POST["nuevoRude"],
                                           "tel_fijo" => $_POST["nuevoFijo"],
                                           "celular_con" => $_POST["nuevoCelular"],
                                           "direccion" => $_POST["nuevaDireccion"],
                                           "num_puerta" => $_POST["nuevaPuerta"]);

                             $respuesta = ModeloDetalleIns::mdlCrearDetalleIns($tabla, $datos);

                            /*=============================================================================
                                        OBTENER CODIGO DEL DETALLE
                            ==============================================================================*/

                            if($respuesta == "ok"){

                                $tabla ="detalle_ins";

                                $item ="rude";

                                $valor = $_POST["nuevoRude"];

                                $respuesta = ModeloDetalleIns::mdlMostrarDetalleIns($tabla, $item, $valor);


                                /*=============================================================================
                                   REGISTRO DE DATOS INSCRIPCION
                                ==============================================================================*/

                                $tabla ="inscripcion";

                                date_default_timezone_set('America/La_Paz');

                                $fecha = date('Y-m-d');
            
                                $datos = array("fecha_ins" => $fecha,
                                                "gestio_ins" => $_POST["nuevaGestion"], 
                                                "cod_est" => $cod_est,
                                                "cod_deins" => $respuesta["cod_deins"],
                                                "cod_cur" => $_POST["nuevoCodCurso"]);
            
                                $respuesta = ModeloInscritos::mdlCrearInscripcion($tabla, $datos);

                                if($respuesta == "ok"){

                                    echo'<script>
                
                                    swal({
                
                                        type: "success",
                                        title: "¡El usuario ha sido guardado correctamente!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
                
                                    }).then((result)=>{
                
                                        if(result.value){
                
                                            window.location = "inscripciones";
                
                                        }
                
                                    })
                                    
                                    </script>';
                                }

                            }    

                        }
    
                    }

 
                }

                

            }
            else{

                echo'<script>

                    swal({

                        type: "error",
                        title: "¡El usuario no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "inscripciones";

                        }

                    })
                    
                    </script>';

            }
        }
    }



    /*=========================================
    MOSTRAR LISTA DE ESTUDIANTES
    ==========================================*/

    static public function ctrMostrarListaE($valor){

        $respuesta = ModeloUsuarios::mdlMostrarListaE($valor);

        return $respuesta;
    }

    /*=========================================
    MOSTRAR TODOS LOS DATOS DEL ESTUDIANTE
    ==========================================*/

    static public function ctrMostrarInformacionCompletaInscrito($valor, $item){

        $respuesta = ModeloInscritos::mdlMostrarInformacionCompletaInscrito($valor, $item);

        return $respuesta;
    }

    
    /*=========================================
    MOSTRAR TABLA INSCRITOS
    ==========================================*/

    static public function ctrMostrarInscritos($item, $valor , $gestion){

        $tabla = "inscripcion";

        $respuesta = ModeloInscritos::mdlMostrarInscritos($tabla, $item, $valor , $gestion);
        
        return $respuesta;
    }



    /*=========================================
    MOSTRAR TODOS LOS DATOS DE LOS RESPONSABLES
    ==========================================*/

    static public function ctrMostrarResponsablesInfo($valor){

        $respuesta = ModeloEstudiantes::mdlMostrarResponsablesInfo($valor);

        return $respuesta;
    }


    /*=========================================
    MOSTRAR SUMA DE INSCRITOS
    ==========================================*/

    static public function ctrMostrarSumaInscritos($gestion){

        $tabla = "inscripcion";

        $respuesta = ModeloInscritos::mdlMostrarSumaInscritos($tabla, $gestion);

        return $respuesta;
    }

    /*=========================================
    MOSTRAR SUMA DE INSCRITOS
    ==========================================*/

    static public function ctrMostrarSumaInscritosGeneroNivel($estadoIns, $genero, $nivel, $gestion){

        $tabla = "inscripcion";

        $respuesta = ModeloInscritos::mdlMostrarSumaInscritosGeneroNivel($tabla, $gestion, $estadoIns, $genero, $nivel);

        return $respuesta;
    }


    /*=========================================
    MOSTRAR SUMA DE INSCRITOS
    ==========================================*/

    static public function ctrMostrarSumaInscritosNivel($gestion, $estadoIns, $nivel){

        $tabla = "inscripcion";

        $respuesta = ModeloInscritos::mdlMostrarSumaInscritosNivel($tabla, $gestion, $estadoIns, $nivel);

        return $respuesta;
    }

    /*=========================================
    MOSTRAR CANTIDAD DE INSCRITOS EN UN MISMO CURSO
    ==========================================*/

    static public function ctrMostrarCantidadInscritosCurso($item, $valor){

        $tabla = "inscripcion";

        $respuesta = ModeloInscritos::mdlMostrarCantidadInscritosCurso($item, $valor, $tabla);

        return $respuesta;
    }
    
}