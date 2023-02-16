<div class="content-wrapper">

    <section class="content-header">
    
    <h1>
        
        

        <?php 

      	$item = "cod_gestion";
				$valor = $_SESSION["gestion"];

				$gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

        echo ' kardex Estudiantil - Gestion : '.$gestion["gestion"];
      ?>

        
    
    </h1>

    <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Asistencia - Materia</li>
    
    </ol>

    </section>

    

    <section class="content">

        <div class="box">

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title">DATOS DE ESTUDIANTES</h3>
                </div>

                <div class="box-body">

                    <?php

                        if ($_SESSION["tipo"] == 3) {

                            $valor = $_SESSION["idEstudiante"]; 
                        
                            $gestion = $_SESSION["gestion"];// COD_ESTUDIANTE
                            
                        }else{

                            $valor = $_GET["idEstudiante"]; 
                        
                            $gestion = $_SESSION["gestion"];// COD_ESTUDIANTE


                        }

                        $item = "cod_est";

                        

                        // INFORMACION GENERAL DEL ESTUDIANTE

                        $inscrito = ControladorInscritos::ctrMostrarInscritos($item, $valor , $gestion);

                        $item = "cod_est";

                        $valor = $inscrito["cod_est"]; 

                        $estudiante = ControladorEstudiantes::ctrMostrarEstudiantes($item, $valor);

                        $item = "cod_usu";

                        $valor = $estudiante["cod_usu"]; 

                        $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                        // INFORMACION DE LOS RESPONSABLES DEL ESTUDIANTES

                        $valor = $inscrito["cod_est"]; 

                        $infoResponsables = ControladorInscritos::ctrMostrarResponsablesInfo($valor);
                      

                        foreach ($infoResponsables as $key => $value) {

                            

                            if($value["tipo"] == 1) { 

                                $padre = $value["pat_res"]." ".$value["mat_res"]." ".$value["nom_res"];

                                $ocupacionP = $value["ocupacion"];
                                
                            }

                            if($value["tipo"] == 2) {

                                $madre = $value["pat_res"]." ".$value["mat_res"]." ".$value["nom_res"];

                                $ocupacionM = $value["ocupacion"];
                                
                            }

                            if($value["tipo"] == 3) {

                                $tutor = $value["pat_res"]." ".$value["mat_res"]." ".$value["nom_res"];
                                
                                $ocupacionT = $value["ocupacion"];
                                
                            }


                        }
                        echo '
                            <div class="row form-group">

                                <div class="col-xs-4">

                                    <label for="inputEmail3" class="col-sm-4 control-label">Nombre Estudiante</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="'.$usuario["ape_paterno"].' '.$usuario["ape_materno"].' '.$usuario["nombre_usu"].'" readonly>
                                    </div>

                                </div>';

                                if (!empty($padre)) {

                                    echo'
                                    <div class="col-xs-4">

                                        <label for="inputEmail3" class="col-sm-4 control-label">Nombre Padre</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="'.$padre.'" readonly>
                                        </div>

                                    </div>';
                                    
                                }

                                if (!empty($madre)) {

                                    echo'
                                    <div class="col-xs-4">

                                        <label for="inputEmail3" class="col-sm-4 control-label">Nombre Madre</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="'.$madre.'" readonly>
                                        </div>

                                    </div>';
                                    
                                }

                                if (!empty($tutor)) {

                                    echo'
                                    <div class="col-xs-4">

                                        <label for="inputEmail3" class="col-sm-4 control-label">Nombre Tutor</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="'.$tutor.'" readonly>
                                        </div>

                                    </div>';
                                    
                                }

                                

                                

                                

                        echo '
                            </div>

                            <div class="row form-group">

                                    <div class="col-xs-4">

                                        <label for="inputEmail3" class="col-sm-4 control-label">Telefono</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"  placeholder="'.$inscrito["tel_fijo"].'" readonly>
                                        </div>

                                    </div>';

                                if (!empty($ocupacionP)) {

                                    echo'
                                    <div class="col-xs-4">

                                        <label for="inputEmail3" class="col-sm-4 control-label">Ocupacion Padre</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"  placeholder="'.$ocupacionP.'" readonly>
                                        </div>

                                    </div>
                                    ';
                                    
                                }

                                if (!empty($ocupacionM)) {

                                    echo'
                                    <div class="col-xs-4">

                                        <label for="inputEmail3" class="col-sm-4 control-label">Ocupacion Madre</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"  placeholder="'.$ocupacionM.'" readonly>
                                        </div>

                                    </div>
                                    
                                    ';
                                    
                                }

                                if (!empty($ocupacionT)) {

                                    echo'
                                    <div class="col-xs-4">

                                        <label for="inputEmail3" class="col-sm-4 control-label">Ocupacion Madre</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"  placeholder="'.$ocupacionT.'" readonly>
                                        </div>

                                    </div>
                                   
                                    ';
                                    
                                }

                             
                        echo '
                                

                                

                            </div>

                            <div class="row form-group">

                                <div class="col-xs-4">

                                    <label for="inputEmail3" class="col-sm-4 control-label">Celular</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"  placeholder="'.$inscrito["celular_con"].'" readonly>
                                        </div>

                                    </div>

                                    <div class="col-xs-4">

                                        <label for="inputEmail3" class="col-sm-4 control-label">Domicilio</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"  placeholder="'.$inscrito["direccion"].' - # '.$inscrito["num_puerta"].'" readonly>
                                        </div>

                                    </div>

                                </div>';
                    ?>

                </div>
                
              
            </div>  
            
        </div>

        <div class="box box-danger">            

            <div class="box-body">
               
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                
                    <thead>
                    
                        <tr>
                        
                        <th style="width:10px">#</th>
                        <th>Fecha</th>
                        <th>Area</th>
                        <th>Maestra(o)</th>
                        <th>Observacion</th>
                        <th>Detalle</th>
                        
                        
                        </tr> 

                    </thead>

                    <tbody>
        
                        <?php

                        $valor = $inscrito["cod_ins"]; 

                        $bimestre = $_GET["idBimestre"]; 

                        $comportamiento = ControladorComportamiento::ctrMostrarRegistroComportamiento($bimestre, $valor);

                        foreach ($comportamiento as $key => $value) 
                        {
                            $item = "cod_asig";

                            $valor = $value["cod_asig"];
                            
                            $asignacion = ControladorAsignacion::ctrMostrarAsignacionGeneral($item, $valor);

                            $item = "cod_doc";

                            $valor = $asignacion["cod_doc"];

                            //var_dump($valor);
                            
                            $docente = ControladorDocentes::ctrMostrarDocentesInfoUsuario($item, $valor);

                            // TE QUEDASTE AQUI , SE NESECITA CAPTURAR DATOS DEL NOMBRE DE LA MATERIA
                            $item = "cod_mat";
                            $valor = $asignacion["cod_mat"];

                            $materia = ControladorMaterias::ctrMostrarMaterias($item, $valor);

                            // var_dump($materia);

                            echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["fecha_reg"].'</td>
                                    <td>'.$materia["nombre_mat"].'</td>
                                    <td>'.$docente["nombre_usu"].' '.$docente["ape_paterno"].' '.$docente["ape_materno"].'</td>
                                    <td style="background-color : #ffcccc">'.$value["observacion"].'</td>
                                    <td>'.$value["detalle"].'</td>';
                            echo '</tr>'; 


                        }

                        ?>
        
                    </tbody> 

                </table>

            </div>

        </div>

    </section>

</div>

