<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
     <?php echo'Regtistro de Asistencia - '.$_GET["nombreMat"]; ?>
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Curso</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

      <?php

        if ($_SESSION["tipo"] == 2) {

          echo'
          <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCurso">
            
          Resgistrar Asistencia de HOY

          </button>';
        }

        


      ?>
      

    </div>

    <div class="box-body">
      
     <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
       
      <thead>
       
       <tr>
         
        <th style="width:10px"  rowspan="2">N°</th>
        <th style="width:150px"  rowspan="2">Nomina</th>
        

          <?php

            $paleta = array("#ff6666", "#66b3ff", "#fbfb6a", "#9A2EFE", "#ccffe6", "#ccccff", "#ccffff", "#ccffcc", "#ffffcc" , "#ffcccc", "#ffccff");

            $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');

            $colores = array(2,6,7,8,9,10,2);

            $bimestre = $_GET["bimestre"];
            $cod_asig = $_GET["idAsignacion"];

            $respuestaFecha = ControladorAsistencia::ctrMostrarFechas($bimestre, $cod_asig);

            for($i = 0; $i < 18 ; $i++) {
                    
              if (isset($respuestaFecha[$i]["fecha_asis"])) {

                $dia = $dias[date('N', strtotime($respuestaFecha[$i]["fecha_asis"]))];

                $diaColor = $colores[date('N', strtotime($respuestaFecha[$i]["fecha_asis"]))];

                echo'<th style="background-color : '.$paleta[$diaColor].'";>'.$dia.'</th>';

              }else{

                echo'<th>     -- </th>';

              }
              
        
            }

          ?>

       </tr> 

       <tr>

          <?php

            $bimestre = $_GET["bimestre"];
            $cod_asig = $_GET["idAsignacion"];

            

            $respuestaFecha = ControladorAsistencia::ctrMostrarFechas($bimestre, $cod_asig);

            for($i = 0; $i < 18 ; $i++) {
                    
              if (isset($respuestaFecha[$i]["fecha_asis"])) {

                $fechaComoEntero = strtotime($respuestaFecha[$i]["fecha_asis"]);

                $fecha = date("m-d", $fechaComoEntero);

                echo'<th>'.$fecha.'</th>';

              }else{

                echo'<th>Fecha</th>';

              }
              
        
            }

          ?>

       </tr> 

      </thead>

      <tbody>

        <?php

          /*=================================================
          OBTENER LISTA DE ESTUDIANTES CON EL ID DEL CURSO
          =================================================*/

          $valor = $_GET["idCurso"];
          
          $estudiantes = ControladorInscritos::ctrMostrarListaE($valor); 

          foreach ($estudiantes as $key => $value) { 
            
            echo'<tr>
                  
                  <td>'.($key+1).'</td>
                  <td>'.$value["ape_paterno"].'  '.$value["ape_materno"].'  '.$value["nombre_usu"].'</td>';            

                    for($j = 0; $j < 18 ; $j++){

                      if (isset($respuestaFecha[$j]["fecha_asis"])) { 

                        $item1 = "cod_ins";
                        $valor1 = $value["cod_ins"];
                        

                        $item2 = "fecha_asis";
                        $valor2 = $respuestaFecha[$j]["fecha_asis"];
                        

                        $item3 = "cod_asig";
                        $valor3 = $_GET["idAsignacion"];
                    

                        $respuesta = ControladorAsistencia::ctrMostrarAsistencia($item1, $valor1, $item2, $valor2, $item3, $valor3);

                        

                        if(isset($respuesta)){ 

                          echo'<td>'.$respuesta["estado_asis"].'</td>';
                          
                        }else{ 

                        echo'<td>-</td>';
                        
                        }

                      }else { 

                        echo'<td>-</td>';
                      
                      }


                    }

            echo'</tr>';
          }

        
        ?>
           

      </tbody> 

     </table>

    </div>

  </div>


  <!-- ====================================================
  HORARIO DE CLASES
  ==================================================== -->

  <div class="box box-warning">

    <div class="box-header with-border"><h3>PRIMARIA</h3></div> 

    <div class="box-body">
                        
        <table class="table table-bordered table-striped dt-responsive" style="width:100%">
            
            <thead>
            
                <tr>
                    <th style="width:10px;">#</th>
                    <th style="background-color : #ccffff";>Lunes</th>
                    <th style="background-color : #ccffcc";>Martes</th>
                    <th style="background-color : #ffffcc";>Miercoles</th>
                    <th style="background-color : #ffcccc";>Jueves</th>
                    <th style="background-color : #ffccff";>Viernes</th>
                </tr> 

            </thead>

            <tbody>    
            
                <?php

                    $item = "cod_asig";
                    $valor = $cod_asig;

                    $respuestaAsignacion = ControladorAsignacion:: ctrMostrarAsignacionGeneral($item, $valor);
                    
                    $item = "cod_cur";
                    $valor = $_GET["idCurso"];

                    $horario = ControladorHorarios::ctrMostrarHorarios($item, $valor);

                    //var_dump($horario); 

                    $colorR ='style="background-color : #ccff66";';
                    
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
                                
                                  if ($horario[$j]["periodo".$i] == $respuestaAsignacion["cod_mat"]) {

                                    echo'<td style="background-color : #ccccff";>'.$respuesta["nombre_mat"].'</td>';
                                  
                                  }else{
  
                                    echo'<td>'.$respuesta["nombre_mat"].'</td>';
  
                                  }

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

</section>

</div>


<!--=====================================
MODAL AGREGAR ASISTENCIA DE CADA DIA
======================================-->

<div id="modalAgregarCurso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Administrativo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <?php

            echo'

            <div class="form-group">

              <div class="input-group">

                <input type="hidden" name="asignacion" value="'.$_GET["idAsignacion"].'">

                <input type="hidden" name="bimestre" value="'.$_GET["bimestre"].'">

              </div>

            </div>';

            $valor = $_GET["idCurso"];

            $estudiantes = ControladorInscritos::ctrMostrarListaE($valor);

            foreach ($estudiantes as $key => $value) {

              echo'

              <div class="form-group">

                <div class="row">

                <!-- PESO -->

                  <div class="col-xs-8">

                    <div class="input-group">

                      <span class="input-group-addon">'.($key+1).'</span>

                      <input type="text" class="form-control input-lg"  value="'.$value["ape_paterno"].'  '.$value["ape_materno"].'  '.$value["nombre_usu"].'" readonly>
                      
                      <input type="hidden" name="cod_ins'.$value["cod_ins"].'" value="'.$value["cod_ins"].'">
                      
                    </div>

                  </div>


                  <!-- GENERO -->

                  <div class="col-xs-2">

                    <select class="form-control input-lg" name="nuevaAsistencia'.$value["cod_ins"].'" required>
                      
                      <option value=""></option>

                      <option value="P">P</option>

                      <option value="F">F</option>

                      <option value="A">A</option>


                    </select>

                  </div>


                </div>

              </div>';


            }


          ?>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Lista de Asistencia</button>

        </div>


        <?php
        
        $crearAsistencia= new ControladorAsistencia();
        $crearAsistencia -> ctrGuardarAsistencias();

        ?>


      </form>

    </div>

  </div>

</div>