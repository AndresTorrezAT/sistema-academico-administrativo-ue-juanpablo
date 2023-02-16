
<div class="row">
  <!-- ============================================
  PRIMERA DIVISION
  ============================================== -->
  <div class="col-lg-3 col-xs-6">
    
    <div class="small-box bg-aqua">

      <div class="inner">
        <h3>CALIFICACIONES</h3>
        <p>Notas</p>
      </div>

      <div class="icon">
        <i class="ion ion-easel"></i>
      </div>
      <a href="#" class="small-box-footer btnCalificacionEst">Ver Registro  <i class="fa fa-arrow-circle-right"></i></a>
    </div>

  </div>

  <!-- ============================================
  SEGUNDA DIVISION
  ============================================== -->
  
  <div class="col-lg-3 col-xs-6">
    
    <div class="small-box bg-green">
      <div class="inner">
        <h3>ASISTENCIA</h3>

        <p>Lista</p>
      </div>
      <div class="icon">
        <i class="ion ion-calendar"></i>
      </div>
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalAsistenciaEstudiante">Ver Registro <i class="fa fa-arrow-circle-right"></i></a>
    </div>

  </div>
  
  <!-- ============================================
  TERCERA DIVISION
  ============================================== -->
  <div class="col-lg-3 col-xs-6">
  
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>KARDEX</h3>
        <p>Comportamiento</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-bookmarks"></i>
      </div>
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalComportamientoEstudiante">Ver Registro <i class="fa fa-arrow-circle-right"></i></a>
    </div>

  </div>
  
  <!-- ============================================
  CUARTA DIVISION
  ============================================== -->
  <div class="col-lg-3 col-xs-6">
    
    <div class="small-box bg-red">
      <div class="inner">
        <h3>MENSAJES</h3>
        <p>Bandeja de Entrada</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-mail"></i>
      </div>
      <a href="mensajes" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
    </div>

  </div>

</div>
        

<div class="box box-warning">

  <div class="box-header with-border"><h3>PRIMARIA</h3></div> 

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

            <tbody>    
            
                <?php
                    // OBTENER EL CODIGO DEL CURSO ($valor)

                    $item = "cod_est";

                    $valor = $_SESSION["idEstudiante"];  

                    $idGestion = $_SESSION["gestion"];

                    $inscrito = ControladorInscritos::ctrMostrarInscritos($item, $valor , $idGestion);

                    // OBTENER EL HORARIO 
                    
                    $item = "cod_cur";
                    $valor = $inscrito["cod_cur"];

                    $horario = ControladorHorarios::ctrMostrarHorarios($item, $valor);

                    //var_dump($horario); 
                    
                    $colorR ='style="background-color : #ccccff";';
                                  
                      if(!empty($horario)){                  
                        
                        $num = 1;

                        for ($i=1 ; $i <= 8 ; $i++) { 

                          if ($i == 5) {

                            echo'<tr>
                                  <td >'.$num.'</td>
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

                
            
            </tbody> 

        </table>

    </div>

  </div>



<!-- =====================================
MODAL BiMESTRE ASISTENCIA
======================================-->

<div id="modalAsistenciaEstudiante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: #00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Seleccionar Bimestre</h4>

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

                
                <select class="form-control input-lg" id="BimestreAsistenciaEstudiante">  <!-- ENTRADA PARA EL BIMESTRE -->

                  <?php

                    $item1 = null;
                    $valor1 = null;
                    $item2 = "cod_gestion";
                    $valor2 = $_SESSION["gestion"];

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
                
              </div>

            </div>
            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary btnAsistenciaEst" >Ingresar</button>

        </div>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL BiMESTRE KARDEX
======================================-->

<div id="modalComportamientoEstudiante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Seleccionar Bimestre</h4>

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

                
                <select class="form-control input-lg" id="BimestreComportamientoEstudiante">  <!-- ENTRADA PARA EL BIMESTRE -->

                  <?php

                    $item1 = null;
                    $valor1 = null;
                    $item2 = "cod_gestion";
                    $valor2 = $_SESSION["gestion"];

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
                
              </div>

            </div>
            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary btnComportamientoEst" >Ingresar</button>

        </div>

      </form>

    </div>

  </div>

</div>