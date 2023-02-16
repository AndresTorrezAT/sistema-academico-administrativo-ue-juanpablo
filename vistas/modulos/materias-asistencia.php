<div class="content-wrapper">

    <section class="content-header">
    
    <h1>
        
        Registros de Asistencia
    
    </h1>

    <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Asistencia - Materia</li>
    
    </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">
               

                <div class="row mat">

           

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

                                // if ($materia["nivel"] == 1) {

                                //   $color="maroon";
                                  
                                // }else{


                                //   $color="maroon";


                                // }

                                if($value["cod_doc"] != null){

                                  $docente = ControladorDocentes::ctrMostrarDocentesInfoUsuario($item, $valor);

                                  echo'<div class="col-md-4">    
                                          <div class="callout callout-teal">

                                              <h4 style="color:#ffffff">'.$materia["nombre_mat"].' <button type="button" class="btn  btn-success  pull-right btnModalAsistencia" data-toggle="modal" data-target="#modalBimestreAsistencia" idAsignacion="'.$value["cod_asig"].'"  nombreMat="'.$materia["nombre_mat"].'" idCurso="'.$_GET["idCurso"].'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abrir</font></font></button></h4>
                                              <p style="color:#ffffff"> PROFESOR: '.$docente["nombre_usu"].' '.$docente["ape_paterno"].' '.$docente["ape_materno"].' </p>

                                          </div>
                                      </div>'; 

                                }else {
                                  
                                  echo'<div class="col-md-4">
                                        <div class="callout callout-teal">

                                          <h4 style="color:#ffffff">'.$materia["nombre_mat"].' <button type="button" class="btn  btn-success  pull-right btnModalAsistencia" data-toggle="modal" data-target="#modalBimestreAsistencia" idAsignacion="'.$value["cod_asig"].'"  nombreMat="'.$materia["nombre_mat"].'" idCurso="'.$_GET["idCurso"].'" value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abrir</font></font></button></h4>
                                          <p style="color:#ffffff"> PROFESOR: SIN DOCENTES ASIGNADO </p> 

                                        </div>
                                      </div>
                                          
                                  '; 
                                }

                                

                            }
                        ?>
                        
  

                </div>

            </div>
            
        </div>

    </section>

</div>


<!--=====================================
MODAL BiMESTRE ASISTENCIA
======================================-->

<div id="modalBimestreAsistencia" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Selecionar Bimestre</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Bimestre -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" id="BimestreAsistencia">

                <?php

                  // $item = "cod_gestion";
              
                  // $valor = $_GET["idGestion"];

                  // $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);
              
                  $item1 = null;
                  $valor1 = null;
                  $item2 = "cod_gestion";
                  $valor2 = $_GET["idGestion"];

                  $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                  foreach ($bimestre as $key => $value) {

                    switch ($value["numeroBi"]) {
                      case 1:
                        $numero ="Primer";
                        break;

                      case 2:
                        $numero ="Segundo";
                        break;
                        
                      case 3:
                        $numero ="Tercer";
                        break;

                      case 4:
                        $numero ="Cuarto";
                        break;
                     
                    }
                    echo'<option value="'.$value["cod_bimestre"].'">'.$numero.' Bimestre </option>';
                  }

                ?>

                </select>

                <input type="hidden" id="AsignacionAsistencia" value=""> <!-- ENTRADA PARA EL ID ASIGNACION -->

                <input type="hidden" id="MateriaAsistencia" value=""> <!-- ENTRADA PARA EL NOMBRE MATERIA -->

                <input type="hidden" id="CursoAsistencia" value=""> <!-- ENTRADA PARA EL ID CURSO -->

                
              </div>

            </div>
            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary btnAsistenciaRegistro" >Ingresar</button>

        </div>

      </form>

    </div>

  </div>

</div>