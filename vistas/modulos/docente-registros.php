<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    REGISTROS DE DOCENTE
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Calificaiones</li>
  
  </ol>

</section>

<section class="content">

  <div class="box  box-solid box-success">

    <div class="box-header with-border">

      CURSOS ASIGNADOS

    </div>

    <div class="box-body">
      
     <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
       
      <thead>
       
       <tr>
         
         <th>Curso</th>
         <th>Paralelo</th>
         <th>Cantidad de Estudiantes</th>
         <th>Gestion</th>
         <th>Acciones</th>

       </tr> 

      </thead>

      <tbody>

        <?php

        $item = "cod_doc"; 
      
        $valor = $_SESSION["idDocente"]; //COD DOCENTE

        $idGestion = $_SESSION["gestion"];

        $asignacion = ControladorAsignacion::ctrMostrarAsignacionDocenteGestion($item, $valor, $idGestion);

        
            foreach ($asignacion as $key => $value) {


                // -------------------------------------------------
                // OBTENER DATOS DE LA MATERIA
                // -------------------------------------------------

                $item = "cod_mat";
                $valor = $value["cod_mat"];

                $materias = ControladorMaterias::ctrMostrarMaterias($item, $valor, $idGestion);

                // -------------------------------------------------
                // OBTENER DATOS DEL CURSO
                // -------------------------------------------------

                $item = "cod_cur";
                $valor = $value["cod_cur"];

                $cursos = ControladorCursos::ctrMostrarCursos($item, $valor, $idGestion);

                // -------------------------------------------------
                // OBTENER GESTION
                // -------------------------------------------------

                $item = "cod_gestion";
                $valor = $idGestion;

                $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

                switch ($cursos["nivel"]) {
                  case 1:
                    $nivel = "Primaria";
                    break;

                  case 2:
                    $nivel = "Secundaria";
                    break;
                }

                $item ="cod_cur";
                $valor = $value["cod_cur"];

                $totalIns = ControladorInscritos::ctrMostrarCantidadInscritosCurso($item, $valor);

                
                echo'<tr>
                        <td><dt class="text-aqua">'.$cursos["grado"].' ° de '.$nivel.'</dt> </td>
                        <td><dt>'.$cursos["paralelo"].'</dt></td>';

                        
                        echo '<td><button class="btn btn-success">'.$totalIns["cantidad"].'</button></td>
                        <td>'.$gestion["gestion"].'</td>

                        <td>

                            <div class="">
                            
                            

                            <button class="btn bg-purple  btnCalifiacionesMateria" idAsignacion="'.$value["cod_asig"].'"  nombreMat="'.$materias["nombre_mat"].'" idCurso="'.$value["cod_cur"].'" idGestion="'.$idGestion.'">Calificaciones</button>

                            <button class="btn bg-teal btnModalAsistencia" data-toggle="modal" data-target="#modalBimestreAsistencia" idAsignacion="'.$value["cod_asig"].'"  nombreMat="'.$materias["nombre_mat"].'"  idCurso="'.$value["cod_cur"].'" >Asistencia</button>

                            <button class="btn bg-navy btnModalComportamiento" data-toggle="modal" data-target="#modalBimestreComportamiento" idAsignacion="'.$value["cod_asig"].'" idCurso="'.$value["cod_cur"].'">Comportamiento</button>

                        

                            </div>  

                        </td>

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
                  $valor2 = $idGestion;

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


<!--=====================================
MODAL BiMESTRE COMPORTAMIENTO
======================================-->

<div id="modalBimestreComportamiento" class="modal fade" role="dialog">

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

                
                <select class="form-control input-lg" id="BimestreComportamiento">  <!-- ENTRADA PARA EL BIMESTRE -->

                  <?php

                    $item1 = null;
                    $valor1 = null;
                    $item2 = "cod_gestion";
                    $valor2 = $idGestion;

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

                <input type="hidden" id="CursoComportamiento" value=""> 

                <input type="hidden" id="GestionComportamiento" value="<?php  echo $idGestion; ?>"> 

                <input type="hidden" id="AsignacionComportamiento" value=""> 

              </div>

            </div>
            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary btnComportamientoRegistro">Ingresar</button>

        </div>

      </form>

    </div>

  </div>

</div>




