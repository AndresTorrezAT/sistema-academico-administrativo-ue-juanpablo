<div class="content-wrapper">

    <section class="content-header">
    
    <h1>
        
        Registros de Calificaciones
    
    </h1>

    <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Calificaciones segun la Materia</li>
    
    </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCurso"><i class="fa fa-print"></i> -
                    
                    Imprimir Boletines

                </button>              -->

            </div>  

            <div class="box-body">

                <!-- <h2 class="page-header">Calificaciones segun la Materia</h2> -->

                <div class="row mat">

                <!-- <div class="col-md-4"> -->

                    <?php

                        $item = "cod_cur";

                        $valor = $_GET["idCurso"];

                        $cursoAsignado = ControladorAsignacion::ctrMostrarAsignacionesEspecificas($item, $valor);
                        
                        foreach ($cursoAsignado as $key => $value) {

                            

                            $item = "cod_mat";

                            $valor = $value["cod_mat"];

                            $materia = ControladorMaterias::ctrMostrarMaterias($item, $valor);

                            $item = "cod_doc";
                            $valor = $value["cod_doc"];

                            if($value["cod_doc"] != null){

                            $docente = ControladorDocentes::ctrMostrarDocentes($item, $valor);

                            $item = "cod_usu";
                            $valor = $docente["cod_usu"];


                            $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                        
                            // var_dump($usuario);

                            

                                echo'<div class="col-md-4">
                                        <div class="callout callout-purple">

                                            <h4 style="color:#ffffff">'.$materia["nombre_mat"].' <button type="button" class="btn  btn-success  pull-right btnCalifiacionesMateria" idAsignacion="'.$value["cod_asig"].'"  nombreMat="'.$materia["nombre_mat"].'" idCurso="'.$_GET["idCurso"].'" idGestion="'.$_GET["idGestion"].'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abrir</font></font></button></h4>
                                            
                                            <p style="color:#ffffff"> PROFESOR: '.$usuario["nombre_usu"].' '.$usuario["ape_paterno"].' '.$usuario["ape_materno"].' </p> 
                                            

                                        </div>
                                    </div>'
                                ; 
                            }else {

                                echo'<div class="col-md-4">
                                        <div class="callout callout-purple">

                                            <h4 style="color:#ffffff">'.$materia["nombre_mat"].' <button type="button" class="btn  btn-success  pull-right btnCalifiacionesMateria" idAsignacion="'.$value["cod_asig"].'"  nombreMat="'.$materia["nombre_mat"].'" idCurso="'.$_GET["idCurso"].'" idGestion="'.$_GET["idGestion"].'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abrir</font></font></button></h4>
                                            
                                            <p style="color:#ffffff"> PROFESOR: SIN DOCENTES ASIGNADO </p> 
                                            

                                        </div>
                                    </div>'
                                ; 
                                
                            }

                            

                        }
                    ?>
                
                
                

                    
                <!-- </div> -->

            

               

                   

                </div>


            </div>
            
        </div>

    </section>

</div>