<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    
    <?php 

      $item = "cod_gestion";
      $valor = $_SESSION["gestion"];

      $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

      echo 'REGISTROS ACADEMICOS  - GESTION : '.$gestion["gestion"];

    ?>
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Registros</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-body">

        <div class="row">

          <!-- /////////////////////////////////
           PRIMARIA 
          ///////////////////////////////////-->

            <div class="col-md-6">
            
              <div class="box box-widget widget-user-2">
                  
                  <div class="widget-user-header bg-maroon ">

                    <div class="widget-user-image">

                        <img class="img-circle" src="vistas/img/plantilla/primaria.jpg" alt="User Avatar">

                    </div>
                    
                    <h2 class="widget-user-username"><b>PRIMARIA</b></h2>

                    <?php  

                      $gestion = $_SESSION["gestion"];

                      $estadoIns = 1;

                      $nivel = 1;
                    
                      $respuesta = ControladorInscritos::ctrMostrarSumaInscritosNivel($gestion, $estadoIns, $nivel); 

                      echo '<h4 class="widget-user-desc">'.$respuesta["total"].' Estudiantes</h4>';
                    
                    ?>
                    

                  </div>

                  <div class="box-footer no-padding">

                    <ul class="nav nav-stacked" id="tam">
                    
                      <?php
                        
                        $valor = 1; // PRIMARIA

                        $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

                        foreach ($cursos as $key => $value) {

                          echo'<li>

                                <a href="#"><b>'.$value["grado"].' ° - Paralelo ('.$value["paralelo"].')</b>

                                  <div class="pull-right">
                                    <button class="btn bg-purple btnCalifiaciones"  idCurso="'.$value["cod_cur"].'" idGestion="'.$gestion.'">Calificaciones</button>
                                    <button class="btn bg-teal btnAsistencia"  idCurso="'.$value["cod_cur"].'" idGestion="'.$gestion.'">Asistencia</button>
                                    <button class="btn bg-navy-active btnModalComportamiento" data-toggle="modal" data-target="#modalBimestreComportamiento"  idCurso="'.$value["cod_cur"].'">Kardex</button>
                                  </div>

                                </a>

                              </li>'; 

                        }

                       
                      ?>     

                    </ul>

                  </div>
              </div>
         
            </div>
            
          <!-- /////////////////////////////////
           SECUNDARIA
          ///////////////////////////////////-->

            <div class="col-md-6">
              
              <div class="box box-widget widget-user-2">
                 
                  <div class="widget-user-header bg-primary">
                  <div class="widget-user-image">
                      <img class="img-circle" src="vistas/img/plantilla/secundaria.jpg" alt="User Avatar">
                  </div>
                 
                  <h2 class="widget-user-username"><b>SECUNDARIA</b></h2>

                    <?php  

                      $estadoIns = 1;

                      $nivel = 2;
                    
                      $respuesta = ControladorInscritos::ctrMostrarSumaInscritosNivel($gestion, $estadoIns, $nivel); 

                      echo '<h4 class="widget-user-desc">'.$respuesta["total"].' Estudiantes</h4>';
                    
                    ?>

                  </div>
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked" id="tam">
                      <?php

                        $valor = 2;

                        $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

                        foreach ($cursos as $key => $value) {

                        echo'<li>

                              <a href="#"><b>'.$value["grado"].' ° - Paralelo ('.$value["paralelo"].')</b>

                                <div class="pull-right">
                                  <button class="btn bg-purple btnCalifiaciones" idCurso="'.$value["cod_cur"].'" idGestion="'.$gestion.'">Calificaciones</button>
                                  <button class="btn bg-teal btnAsistencia" idCurso="'.$value["cod_cur"].'" idGestion="'.$gestion.'">Asistencia</button>
                                  <button class="btn bg-navy-active btnModalComportamiento" data-toggle="modal" data-target="#modalBimestreComportamiento"  idCurso="'.$value["cod_cur"].'">Kardex</button>
                                </div>

                              </a>

                            </li>'; 

                        }


                      ?> 
                    </ul>
                  </div>
              </div>
            
            </div>

        </div>

    </div>
    
  </div>

</section>

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
                    $valor2 = $gestion;

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

                <input type="hidden" id="GestionComportamiento" value="<?php  echo $gestion; ?>"> 

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