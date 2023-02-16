<?php

class ControladorAdministrativos{


    /*=========================================
    REGISTRO DE ADMINISTRATIVOS
    ==========================================*/

    static public function ctrCrearAdministrativo(){

        if(isset($_POST["nuevoNombre"])){

            /*=============================================================================
                                     REGISTRO DE DATOS DE USUARIO
            ==============================================================================*/

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
               preg_match('/^[a-zA-Z]+$/', $_POST["nuevoApellidoP"]) &&
               preg_match('/^[a-zA-Z]+$/', $_POST["nuevoApellidoM"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoCi"]) &&
               preg_match('/^[a-zA-Z]+$/', $_POST["nuevoCargo"]) ){ 


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

                $tabla ="usuarios";
                $tipo = 1;


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
                                "foto_perfil" => $ruta,
                                "cargo" => $_POST["nuevoCargo"]);

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

                    /*=============================================================================
                                   REGISTRO DE DATOS DE DOCENTE
                    ==============================================================================*/

                    $tabla ="administrativo";

                    $estado = 1;

                    $datos = array("cod_usu" => $respuesta["cod_usu"],
                                   "cargo" => $_POST["nuevoCargo"],
                                   "estado" => $estado);

                    $respuesta = ModeloAdministrativos::mdlCrearAdministrativo($tabla, $datos);


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
    
                                window.location = "administrativos";
    
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
                        title: "¡El usuario no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "administrativos";

                        }

                    })
                    
                    </script>';

            }
        }
    }



    /*=========================================
    MOSTRAR ADMINISTRATIVOS
    ==========================================*/

    static public function ctrMostrarAdministrativos($item, $valor){

        $tabla = "administrativo";

        $respuesta = ModeloAdministrativos::MdlMostrarAdministrativos($tabla, $item, $valor);

        return $respuesta;
    }



    /*=========================================
    EDITAR ADMINISTRATIVO
    ==========================================*/

    static public function ctrEditarAdministrativo(){

        if(isset($_POST["editarNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

                /*=============================
                VALIDAR IMAGEN
                ==============================*/

                $ruta = $_POST["fotoActual"];

                if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){// ENTRA SI EL USUARIO SUBIO UNA IMAGEN NUEVA

        

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);// SACA LAS MEDIDAS DE LA FOTO

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    
                    /*=========================================
                    CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO (SOLO ES LA VARIABLE)
                    ==========================================*/

                    $directorio ="vistas/img/usuarios/".$_POST["editarCi"];

                    /*=========================================
                    PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD (SI YA SUBIO UNA FOTO ANTES)
                    ==========================================*/
                    if(!empty($_POST["fotoActual"])){

                        unlink($_POST["fotoActual"]);// BORRA LA FOTO Y LA CARPETA DE LA MEMORIA

                    }else{

                        mkdir($directorio, 0755); // propiedad de JS para crear carpetas

                    }

                   

                    /*=========================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    ==========================================*/

                    if($_FILES["editarFoto"]["type"] == "image/jpeg"){

                        /*=========================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ==========================================*/

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["editarCi"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]); // crea la imagen

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);// CREA IMAGEN Y LA PONE EN LA CARPETA CREADA

                    }

                    if($_FILES["editarFoto"]["type"] == "image/png"){

                        /*=========================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ==========================================*/
    
                        $aleatorio = mt_rand(100,999);
    
                        $ruta = "vistas/img/usuarios/".$_POST["editarCi"]."/".$aleatorio.".png";
    
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
    
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                        imagejpeg($destino, $ruta);// CREA IMAGEN Y LA PONE EN LA CARPETA CREADA
    
                        }

                }

                $tabla = "usuarios";

                if($_POST["editarPassword"] != ""){// PREGUNTA SI EL USUARIO INGRESO UN NUEVO PASSWORD

                    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){// PREGUNTA SI EL PASSWORD CUMPLE CON EL STANDAR

                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');// LA ENCRIPTA

                    }else{

                        echo'<script>

                        swal({
    
                            type: "error",
                            title: "¡La contraceña no puede ir vacia o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
    
                        }).then((result)=>{
    
                            if(result.value){
    
                                window.location = "usuarios";
    
                            }
    
                        })
                        
                        </script>';


                    }

                }else{ // SI EL USUARIO NO ESCRIBIO NUEVO PASSWORD, COPIA EL ANTIGUO EN UNA VARIABLE    

                    $encriptar = $_POST["passwordActual"];

                }

                $datos = array("cod_usu" => $_POST["cod_usu"],
                                "ape_paterno" => $_POST["editarApellidoP"],
                                "ape_materno" => $_POST["editarApellidoM"],
                                "nombre_usu" => $_POST["editarNombre"],
                                "fecha_nac" => $_POST["editarFechaN"],
                                "carnet" => $_POST["editarCi"],
                                "passwor" => $encriptar,
                                "foto_perfil" => $ruta,
                                "cargo" => $_POST["editarCargo"]);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if($respuesta == "ok"){


                    $tabla = "administrativo";

                    $respuesta = ModeloAdministrativos::mdlEditarAdministrativo($tabla, $datos);

                    if($respuesta == "ok"){

                        echo'<script>

                        swal({

                            type: "success",
                            title: "¡El Docente ha sido editado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                        }).then((result)=>{

                            if(result.value){

                                window.location = "administrativos";

                            }

                        })
                        
                        </script>';
                    }

                }


            }else{

                echo'<script>

                    swal({

                        type: "error",
                        title: "¡El Nombre no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                            window.location = "administrativos";

                        }

                    })
                    
                    </script>';

            }

        }

    }


    /*=========================================
    BORRAR ADMINISTRATIVO
    ==========================================*/

    static public function ctrBorrarAdministrativo(){

        if(isset($_GET["idUsuario"])){

            //////////////BORRAR DATOS DE DOCENTE////////////

            $tabla = "administrativo";
            $datos = $_GET["idUsuario"];

            $respuesta = ModeloAdministrativos::mdlBorrarAdministrativo($tabla, $datos);

            if($respuesta == "ok"){

                if($_GET["fotoUsuario"] != ""){

                    unlink($_GET["fotoUsuario"]);// se elimina el archivo
                    rmdir('vistas/img/usuarios/'.$_GET["carnet"]);// se eliminar la carpeta
    
                }
                
                //////////////BORRAR DATOS DE USUARIO////////////

                $tabla = "usuarios";

                $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                        swal({

                            type: "success",
                            title: "El usuario ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result) =>{

                                    if(result.value){

                                        window.location = "administrativos";
                                    }

                            })
                        
                        </script>';

                }

            }

        }


    }
    
}