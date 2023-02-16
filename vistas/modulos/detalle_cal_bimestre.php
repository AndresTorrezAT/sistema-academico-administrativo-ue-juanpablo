<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    <?php
    $paleta = array("#ff6666", "#66b3ff", "#fbfb6a", "#9A2EFE", "#ccffe6", "#ccccff" , "#ffb3b3" , "#ffe6cc", "#ccffcc", "#cce6ff");

    echo $_GET["nombreMat"].' - '. $_GET["bimestre"] . '° BIMESTRE ';

    ?>
    
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

          echo'<button class="btn btn-success btnDimenciones" data-toggle="modal" idAsignacion="'.$_GET["idAsignacion"].'" bimestre="'.$_GET["bimestre"].'" data-target="#modalEditarAdministrativo">
        
                Editar Dimeciones
        
              </button>';

        }


      ?>

      

    </div>

    <div class="box-body table-responsive">
      
    <table class="table table-bordered table-striped  tablas" width="100%">
       
      <thead>

        <tr>
            <th rowspan="2" style="width:10px" data-orderable="false">N°</th>
            <th rowspan="2" style="width:200px">Nomina</th>
            <th colspan="4" style="background-color : #ff6666";> SER</th> 
            <th colspan="5" style="background-color : #ffcc99";> SABER</th>
            <th colspan="5" style="background-color : #00cc99";> HACER</th>
            <th colspan="4" style="background-color : #99ccff";> DECIDIR</th>
            <th colspan="2" style="background-color : #9966ff";>AUTOEVALUACION</th> 
            <th rowspan="2" style="background-color : #ffffff";><p>NOTA FINAL</p></th>
        </tr>
       
        <tr>

            <?php

              $idAsignacion = $_GET["idAsignacion"];

              $bimestre = $_GET["bimestre"];

              $num = null;

              $dimencion = ControladorDimenciones::ctrMostrarDimenciones($idAsignacion, $num, $bimestre);

              

              $j = 0;

              for ($i= 1; $i <= 18 ; $i++) {           

                switch ($i) {

                  case 4:
                     
                      echo'<th style="width:10px; background-color : '.$paleta[6].'"><p class="verticalText">PROM 10Pts</p></th>';
                      break;

                  case 9:
                      
                      echo'<th style="width:10px; background-color : '.$paleta[7].'"><p class="verticalText">PROM 35Pts</p></th>';
                      break;

                  case 14:
                     
                      echo'<th style="width:10px; background-color : '.$paleta[8].'"><p class="verticalText">PROM 35Pts</p></th>';
                      break;

                  case 18:
                    
                      echo'<th style="width:10px; background-color : '.$paleta[9].'"><p class="verticalText">PROM 10Pts</p></th>';
                      break;

                  default:
                      
                      echo'<th  data-orderable="false" style="width:5px"><p class="verticalText">'.$dimencion[$j]["nom_dim"].'</p></th>';
                      $j++;
                }
               

              }

              echo'<th data-orderable="false" style="width:10px;  background-color : '.$paleta[5].'"><p class="verticalText">Ser  5Pts</p></th>
                  <th data-orderable="false" style="width:10px;  background-color : '.$paleta[5].'"><p class="verticalText">Decidir  5Pts</p></th>';
                  


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

        foreach ($estudiantes as $key => $value) { // FOR EACH DE CADA ESTUDIANTE
          
          echo'<tr>
                
                <td>'.($key+1).'</td>
                <td>'.$value["ape_paterno"].'  '.$value["ape_materno"].'  '.$value["nombre_usu"].'</td>';

                /*=================================================
                OBTENER EL REGISTRO GENERAL DE CALIFIACIONES POR BIMESTRE
                =================================================*/

                $idAsignacion = $_GET["idAsignacion"];

                $idInscrito = $value["cod_ins"];

                $bimestre = $_GET["bimestre"];

                $calificacionesBi = ControladorCalificaciones::ctrCalificacionesGeneralesBimestrales($idAsignacion, $idInscrito, $bimestre);

                if(!empty($calificacionesBi)){ // SI HAY REGISTRO DE CALIFICACION DEL ESTUDIANTE

                  for ($i = 1; $i <= 6; $i++) { 

                    $tipo = $i;

                    $dimencionTipo= ControladorDimenciones::ctrMostrarDimencionesEspecificas($idAsignacion, $tipo, $bimestre);

                    foreach ($dimencionTipo as $key => $value) {

                      //var_dump($value["num"]);

                      $idDimencion = $value["cod_dim"]; // COLUMNA

                      $idCalificacion = $calificacionesBi["cod_cal"]; // FILA

                      $respuestaDetalle = ControladorDetalleCal::ctrMostrarDetallesDeCalificacion($idDimencion, $idCalificacion);

                      if(!empty($respuestaDetalle)){ // si se encontraron los DETALLES DE CALIFICACIONES

                        if ($_SESSION["tipo"] == 2) {

                          echo'<td><input  type="text" class="form-control input-sm inputPonderacion" size="1"  idAsignacion="'.$idAsignacion.'" idBimestre="'.$bimestre.'" tipoImput="'.$tipo.'" idDimencion="'.$idDimencion.'" idCalificacion="'.$idCalificacion.'" value="'.$respuestaDetalle["ponderacion"].'"></td>';

                        } else {
                          
                          echo'<td><input  type="text" class="form-control input-sm inputPonderacion" size="1" value="'.$respuestaDetalle["ponderacion"].'" readonly ></td>';

                        }
                        

                        

                      }else{ // SI HAY DIMENCION - PERO NO HAY DETALLE DE CALIFICACION 

                        //var_dump($respuesta);

                        $tipo = $value["tipo_dim"];;

                        $defaultDetalle = ControladorDetalleCal::ctrCrearCalificacionDetalleDefault($idDimencion, $idCalificacion, $tipo); 

                        echo'<td></td>';

                      }

                    }

                    switch ($tipo) {
                      case 1:
                        echo'<td style="background-color : '.$paleta[6].'" id="'.$tipo.$calificacionesBi["cod_cal"].'">'.$calificacionesBi["ser"].'</td>';
                        break;

                      case 2:
                        echo'<td style="background-color : '.$paleta[7].'" id="'.$tipo.$calificacionesBi["cod_cal"].'">'.$calificacionesBi["saber"].'</td>';
                        break;

                      case 3:
                        echo'<td style="background-color : '.$paleta[8].'" id="'.$tipo.$calificacionesBi["cod_cal"].'">'.$calificacionesBi["hacer"].'</td>';
                        break;

                      case 4:
                        echo'<td style="background-color : '.$paleta[9].'" id="'.$tipo.$calificacionesBi["cod_cal"].'">'.$calificacionesBi["decidir"].'</td>';
                        break;    

                      case 5:

                        if ($_SESSION["tipo"] == 2) {

                          echo'<td><input type="text" class="form-control input-sm inputPonderacion"" size="1" tipoImput="'.$tipo.'" idCalificacion="'.$calificacionesBi["cod_cal"].'" max="100" value="'.$calificacionesBi["auto_ser"].'"></td>';

                        }else{

                          echo'<td><input type="text" class="form-control input-sm inputPonderacion"" size="1" value="'.$calificacionesBi["auto_ser"].'" readonly></td>';

                        }
                        
                        break;  
                        
                      case 6:

                        if ($_SESSION["tipo"] == 2) {
                          echo'<td><input type="text" class="form-control input-sm " size="1" tipoImput="'.$tipo.'" idCalificacion="'.$calificacionesBi["cod_cal"].'" max="100" value="'.$calificacionesBi["auto_decidir"].'"></td>';
                        }else {
                          echo'<td><input type="text" class="form-control input-sm " size="1" value="'.$calificacionesBi["auto_decidir"].'" readonly></td>';
                        }
                          break;                    
                    }

                  }

                  echo'<td style="background-color : #cc6699" size="1" id="promedio'.$calificacionesBi["cod_cal"].'">'.$calificacionesBi["nota_bi"].'</td>';

                  echo '</tr>'; 


                }else{

                  echo'<td></td>
                       <td></td>
                       <td></td>
                       <td style="background-color : #ffcccc">0</td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td style="background-color : #ffcccc">0</td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td style="background-color : #ffcccc">0</td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td style="background-color : #ffcccc">0</td>
                       <td><input type="text" class="form-control input-sm" size="1"  max="100" ></td>
                       <td><input type="text" class="form-control input-sm" size="1"  max="100" ></td>
                       <td style="background-color : #b5e7a0">0</td>';

                  echo '</tr>'; 


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
MODAL EDITAR
======================================-->

<div id="modalEditarAdministrativo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: #605ca8; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">EDITAR DIMENCIONES</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">

            <!--=====================================
            SER
            ======================================-->

            <div class="box box-warning box-solid" style="border-color: #ff6666;">

              <div class="box-header with-border" style="background-color: #ff6666;">

                <h3 class="box-title" style="background-color: #ff6666;">SER</h3>
               
              </div>
           
              <div class="box-body">

                <div class="input-group form-group">

                  <input type="hidden" class="form-control input-lg" name="cod_asig" value="<?php echo $_GET["idAsignacion"]; ?>">

                  <input type="hidden" class="form-control input-lg" name="bimestre" value="<?php echo $_GET["bimestre"]; ?>">

                  <input type="hidden" class="form-control input-lg" name="cod_cur" value="<?php echo $_GET["idCurso"]; ?>">

                  <input type="hidden" class="form-control input-lg" name="nombre" value="<?php echo $_GET["nombreMat"]; ?>">
                  
                </div>

                <?php

                  $tipo = 1;

                  $dimencionTipo= ControladorDimenciones::ctrMostrarDimencionesEspecificas($idAsignacion, $tipo, $bimestre);

                  foreach ($dimencionTipo as $key => $value) {

                    echo
                    '
                    <div class="input-group form-group">
                  
                      <span class="input-group-addon primary">Ser '.$value["num"].'</span> 

                      <input type="text" class="form-control input-lg" name="d'.$value["cod_dim"].'" value="'.$value["nom_dim"].'" required>

                    </div>
                    ';

                  }                 

                ?>

              </div>
              
            </div>

            <!--=====================================
            SABER
            ======================================-->

            <div class="box  box-warning box-solid" style="border-color: #ffcc99;">

              <div class="box-header with-border" style="background-color: #ffcc99;">

                <h3 class="box-title" style="background-color: #ffcc99;">SABER</h3>

               
              </div>
           
              <div class="box-body">

                <?php

                    $tipo = 2;

                    $dimencionTipo= ControladorDimenciones::ctrMostrarDimencionesEspecificas($idAsignacion, $tipo, $bimestre);

                    foreach ($dimencionTipo as $key => $value) {

                      echo
                      '
                      <div class="input-group form-group">
                  
                        <span class="input-group-addon primary">Saber '.$value["num"].'</span> 

                        <input type="text" class="form-control input-lg" name="d'.$value["cod_dim"].'" value="'.$value["nom_dim"].'" required>


                      </div>
                    
                      ';

                    }                 

                  ?>

                
                
              </div>
              
            </div>

            <!--=====================================
            HACER
            ======================================-->

            <div class="box box-info box-solid" style="border-color: #00cc99;">

              <div class="box-header with-border" style="background-color: #00cc99;">

                <h3 class="box-title" style="background-color: #00cc99;">HACER</h3>

               
              </div>
           
              <div class="box-body">

                  <?php

                    $tipo = 3;

                    $dimencionTipo= ControladorDimenciones::ctrMostrarDimencionesEspecificas($idAsignacion, $tipo, $bimestre);

                    foreach ($dimencionTipo as $key => $value) {

                      echo
                      '
                      <div class="input-group form-group">
                
                        <span class="input-group-addon primary">Hacer '.$value["num"].'</span> 

                        <input type="text" class="form-control input-lg" name="d'.$value["cod_dim"].'" value="'.$value["nom_dim"].'" required>

                      </div>
                      ';

                    }                 

                  ?>

                

              </div>
              
            </div>

            <!--=====================================
            DECIDIR
            ======================================-->

            <div class="box box-danger box-solid" style="border-color: #99ccff;">

              <div class="box-header with-border" style="background-color : #99ccff";>

                <h3 class="box-title" style="background-color : #99ccff";>DECIDIR</h3>

              </div>
           
              <div class="box-body">

                  <?php

                    $tipo = 4;

                    $dimencionTipo= ControladorDimenciones::ctrMostrarDimencionesEspecificas($idAsignacion, $tipo, $bimestre);

                    foreach ($dimencionTipo as $key => $value) {

                      echo
                      '
                      <div class="input-group form-group">
                
                        <span class="input-group-addon primary">Decidir '.$value["num"].'</span> 

                        <input type="text" class="form-control input-lg" name="d'.$value["cod_dim"].'" value="'.$value["nom_dim"].'" required>

                      </div>
                      ';

                    }                 

                  ?>

              </div>
              
            </div>


            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Dimenciones</button>

        </div>

        <?php

          $editarDimencion = new ControladorDimenciones();
          $editarDimencion -> ctrEditarDimencion();

        ?> 


      </form>

    </div>

  </div>

</div>