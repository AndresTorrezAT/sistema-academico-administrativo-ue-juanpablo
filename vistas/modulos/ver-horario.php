

<div class="content-wrapper">

    <section class="content-header">

      <h1>

        <?php 

          $item = "cod_gestion";
          $valor = $_SESSION["gestion"];

          $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

          echo 'Registro de Horarios - Gestion : '.$gestion["gestion"];
        ?>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Ver Horarios</li>

      </ol>

    </section>

    <!-- Main content -->
    <section class="content">
    
      <div class="row">

        <!-- ===============================
        EL FORMULARIO
        ================================ -->

        <div class="col-lg-6">

          <div class="box box-success">

            <div class="box-header with-border"><h3>PRIMARIA</h3></div>

            <div class="box-body">
              
              <?php    

              $paleta = array("#ccccff", "#ccffff", "#ccffcc", "#ffffcc" , "#ffcccc", "#ffccff", "#ffcc99", "#99ccff", "#ff9999" , "#99ff99", "#99ffe6", "#9999ff", "#ffff99", "#cc0066", "#999966", "#66ccff", "#ff6699", "#ffe6ee", "#339966" );

              $gestion = $_SESSION["gestion"];

              $valor = 1;

              $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

              //var_dump($cursos); // SIRVE PARA MOSTRAR LAS VARIABLES 

              foreach ($cursos as $key => $value) 
              {

              //if($value["nivel"] == 1){
                
              
                echo'<div class="box box-solid box-maroon">

                      <div class="box-header with-border">';

                      if($value["nivel"] == 1){

                        echo '<h3 class="box-title"> Curso: '.$value["grado"].'º de Primaria ('.$value["paralelo"].')</h3>';

                      }else{

                        echo '<h3 class="box-title"> Curso: '.$value["grado"].'º de Secundaria ('.$value["paralelo"].')</h3>';
                      }

                  echo'</div>

                      <div class="box-body with-border btn-group">

                        <button class="btn btn-danger btnEliminarHorario"  idCurso="'.$value["cod_cur"].'">
                          
                          Eliminar Horario

                        </button>

                      </div>

                      <div class="box-body">
                    
                        <table class="table table-bordered table-striped dt-responsive" style="width:100%">
                          
                          <thead>
                          
                            <tr>
                              <th style="width:10px">#</th>
                              <th>Lunes</th>
                              <th>Martes</th>
                              <th>Miercoles</th>
                              <th>Jueves</th>
                              <th>Viernes</th>
                            </tr> 

                          </thead>

                          <tbody>';    
                ?>
                <?php
                              // CODIGO DEL CURSO ($valor)

                              $item = "cod_cur";
                              $valor = $value["cod_cur"];

                              $horario = ControladorHorarios::ctrMostrarHorarios($item, $valor);

                                //var_dump($horario); 

                                $colorR ='style="background-color : #ccff66";';
                                
                                if(!empty($horario)){                  
                                  
                                  $num = 1;

                                  for ($i=1 ; $i <= 8 ; $i++) { 

                                    if ($i == 5) {

                                      echo'<tr>
                                            <td '.$colorR.'>'.$num.'</td>
                                            <td '.$colorR.'>RECREO</td>
                                            <td '.$colorR.'>RECREO</td>
                                            <td '.$colorR.'>RECREO</td>
                                            <td '.$colorR.'>RECREO</td>
                                            <td '.$colorR.'>RECREO</td>
                                          </tr>';

                                      $num++; 
                                    }

                                    
                                    echo'<tr>
                                          <td>'.$num.'</td>';

                                          for ($j=0; $j <= 4 ; $j++) { 

                                            $item = "cod_mat";

                                            $valor = $horario[$j]["periodo".$i];

                                            if($valor != 0){

                                              $respuesta = ControladorMaterias::ctrMostrarMaterias($item, $valor);
                                            
                                              echo'<td style="background-color : '.$respuesta["color"].'";>'.$respuesta["nombre_mat"].'</td>';

                                            }else{

                                              echo'<td> LIBRE </td>';

                                            }
                                            
                                          }
                                        
                                    echo'</tr>';

                                      $num++; 
                                  }

                                }

                            ?>
                            <?php
                                echo '</tbody> 

                                    </table>

                                  </div>

                                </div>';
                          //}

              }
              ?>
            
            </div>
          
          </div>
        
        </div>

        <!-- ===============================
        SECUNDARIA
        ================================ -->

        <div class="col-lg-6">

          <div class="box box-success">

          <div class="box-header with-border"><h3>SECUNDARIA</h3></div>

          <div class="box-body">
            
            <?php    

            // $item = "gestion";
            // $valor = $_SESSION["gestion"];

            // $Idgestion = ControladorGestion::ctrMostrarGestion($item, $valor);

            $gestion = $_SESSION["gestion"];

            $valor = 2;

            $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

            //var_dump($cursos); // SIRVE PARA MOSTRAR LAS VARIABLES 

            foreach ($cursos as $key => $value) 
            {

            echo'<div class="box box-solid box-primary">

                  <div class="box-header with-border">';

                  if($value["nivel"] == 1){

                    echo '<h3 class="box-title"> Curso: '.$value["grado"].'º de Primaria ('.$value["paralelo"].')</h3>';

                  }else{

                    echo '<h3 class="box-title"> Curso: '.$value["grado"].'º de Secundaria ('.$value["paralelo"].')</h3>';
                  }

              echo'</div>

                    <div class="box-body with-border btn-group">

                    <button class="btn btn-danger btnEliminarHorario"  idCurso="'.$value["cod_cur"].'">
                      
                      Eliminar Horario

                    </button>

                  </div>

                  <div class="box-body">
                
                    <table class="table table-bordered table-striped dt-responsive" style="width:100%">
                      
                      <thead>
                      
                        <tr>
                          <th style="width:10px">#</th>
                          <th>Lunes</th>
                          <th>Martes</th>
                          <th>Miercoles</th>
                          <th>Jueves</th>
                          <th>Viernes</th>
                        </tr> 

                      </thead>

                      <tbody>';    
            ?>
            <?php
                          
                          // CODIGO DEL CURSO ($valor)

              $item = "cod_cur";
              $valor = $value["cod_cur"];

              $horario = ControladorHorarios::ctrMostrarHorarios($item, $valor);

                //var_dump($horario); 

                $colorR ='style="background-color : #ccff66";';
                
                if(!empty($horario)){                  
                  
                  $num = 1;

                  for ($i=1 ; $i <= 8 ; $i++) { 

                    if ($i == 5) {

                      echo'<tr>
                            <td '.$colorR.'>'.$num.'</td>
                            <td '.$colorR.'>RECREO</td>
                            <td '.$colorR.'>RECREO</td>
                            <td '.$colorR.'>RECREO</td>
                            <td '.$colorR.'>RECREO</td>
                            <td '.$colorR.'>RECREO</td>
                          </tr>';

                      $num++; 
                    }

                    
                    echo'<tr>
                          <td>'.$num.'</td>';

                          for ($j=0; $j <= 4 ; $j++) { 

                            $item = "cod_mat";

                            $valor = $horario[$j]["periodo".$i];

                            if($valor != 0){

                              $respuesta = ControladorMaterias::ctrMostrarMaterias($item, $valor);
                            
                              echo'<td style="background-color : '.$respuesta["color"].'";>'.$respuesta["nombre_mat"].'</td>';

                            }else{

                              echo'<td> LIBRE </td>';

                            }
                            
                          }
                        
                    echo'</tr>';

                      $num++; 
                  }

                }

                      
            ?>
            <?php
                echo '</tbody> 

                    </table>

                  </div>

                </div>';

            }
            ?>

          </div>

          </div>
        
        </div>
      
      
      </div>

    </section>

  </div>

  <?php

    $borrarHorario = new ControladorHorarios();
    $borrarHorario -> ctrBorrarHorario();

  ?>