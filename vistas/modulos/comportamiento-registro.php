<div class="content-wrapper">

    <section class="content-header">
    
    <h1>
        
        Registro Kardex
    
    </h1>

    <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Asistencia - Materia</li>
    
    </ol>

    </section>

    

    <section class="content">

        <div class="box">

            <div class="box box-success">

                <div class="box-header with-border">
                    <h3 class="box-title">DATOS DE ESTUDIANTES</h3>
                </div>

                <div class="box-body">

                    <?php

                        $item = "cod_est";

                        $valor = $_GET["idEstudiante"];

                        $gestion = $_GET["idGestion"];// CODIGO GESTION

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

                        //var_dump($infoResponsables);

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

            <?php

                if($_SESSION["tipo"] == 2){

                    echo'<div class="box-header with-border">

                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarComportamiento">
                                
                                Agregar Comportamiento

                            </button>

                        </div>';    
                
                }           

            ?>

            
            

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

                    $bimestre = $_GET["bimestre"];;

                    $comportamiento = ControladorComportamiento::ctrMostrarRegistroComportamiento($bimestre, $valor);

                    //var_dump($comportamiento);

                    foreach ($comportamiento as $key => $value) 
                    {
                        $item ="cod_asig";

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

                            echo '
                            
                            </tr>'; 

                        

                    }

                    ?>
    
                </tbody> 

                </table>

            </div>
              
            
           
          </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR CURSO
======================================-->

<div id="modalAgregarComportamiento" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Comportamiento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <?php

                $item = "cod_doc";

                $valor = $_SESSION["idDocente"];

                $docente = ControladorDocentes::ctrMostrarDocentesInfoUsuario($item, $valor);

                // TE QUEDASTE AQUI , SE NESECITA CAPTURAR DATOS DEL NOMBRE DE LA MATERIA

                $item = "cod_mat";

                $valor = $docente["materia"];

                $materia = ControladorMaterias::ctrMostrarMaterias($item, $valor);

                date_default_timezone_set('America/La_Paz');
                $fecha = date('Y-m-d');

                echo'

                <div class="panel">Datos (Fecha / Area / Maestro)</div>
          
                <!-- ENTRADA PARA LA FECHA -->
                
                <div class="form-group">
                
                    <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                        <input type="date" class="form-control input-lg" name="nuevaFecha" value="'.$fecha.'" readonly>

                    </div>

                </div>

                <!-- ENTRADA PARA EL NOMBRE DE LA MATERIA-->

                <div class="form-group">
                
                    <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                        <input type="text" class="form-control input-lg" value="'.$materia["nombre_mat"].'" readonly>

                        <input type="hidden"  name="nuevoAsignacion" value="'.$_GET["idAsignacion"].'"> 

                        <input type="hidden"  name="nuevoInscrito" value="'.$inscrito["cod_ins"].'">

                        <input type="hidden"  name="nuevoBimestre" value="'.$bimestre.'">

                        <input type="hidden"  name="estudiante" value="'.$_GET["idEstudiante"].'">

                        <input type="hidden"  name="idGestion" value="'.$_GET["idGestion"].'">

                    </div>

                </div>

                <!-- ENTRADA PARA LA CANTIDAD DE CUPOS -->

                <div class="form-group">
                
                    <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                        <input type="text" class="form-control input-lg"  value="'.$docente["nombre_usu"].' '.$docente["ape_paterno"].' '.$docente["ape_materno"].'" readonly>

                    </div>

                </div>';

            ?>

            <!-- ENTRADA PARA EL NIVEL (primaria, seccundaria) -->

            <div class="form-group">

                <div class="panel">Observacion</div>
              
                <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                    <select class="form-control input-lg" name="nuevaObservacion">
                        
                        <option value="">Selecionar Observacion</option>

                        <option value="Abandono en el aula">Abandono en el aula</option>

                        <option value="No presentó tareas">No presentó tareas</option>

                        <option value="No dio evaluación">No dio evaluación</option>

                        <option value="Indisciplina">Indisciplina</option>

                        <option value="Falta de uniforme">Falta de uniforme</option>

                        <option value="Uso inadecuado de celulares">Uso inadecuado de celulares</option>

                        <option value="Distraido en aula">Distraido en aula</option>

                        <option value="Felicitaciones">Felicitaciones</option>

                        <option value="No trajo materiales">No trajo materiales</option>

                        <option value="Falta de higiene">Falta de higiene</option>

                        <option value="Otra">Otra(especificar)</option>


                    </select>

                </div>

            </div>

            <!-- ENTRADA PARA LA CANTIDAD DE CUPOS -->

            <div class="form-group">

                <div class="panel">Detalle</div>
              
                <textarea class="form-control" name="nuevoDetalle" style="height: 100px"></textarea>

            </div>

            
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Observacion</button>

        </div>

        <?php

          $crearCurso = new ControladorComportamiento();
          $crearCurso -> ctrCrearRegistroComportamiento();

        ?>

      </form>

    </div>

  </div>

</div>