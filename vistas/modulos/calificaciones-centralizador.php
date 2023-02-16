<div class="content-wrapper">

  <section class="content-header">
    
    <h1>

      <?php
        echo 'Registro de Calificacion - '.$_GET["nombreMat"];
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

      </div>

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          
          <thead>

          <tr>

            <th style="width:10px" rowspan="2">N°</th>
            <th style="width:150px" rowspan="2">Nomina</th>

            <?php

              $paleta = array("#ff6666", "#66b3ff", "#fbfb6a", "#9A2EFE", "#ccffe6", "#ccccff", "#ff5050", "#ffd966" , "#00cc99", "#99ccff");

              $item = "cod_gestion";
              $valor = $_GET["idGestion"];

              $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

              if($gestion["bimestres"] >= 1){

                $item1 = "cod_gestion";
                $valor1 = $gestion["cod_gestion"];

                $item2 = "numeroBi";
                $valor2 = 1;

                $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                echo'
                <th colspan="7" style="background-color : '.$paleta[6].'";> 1ER. BIMESTRE 

                  <div class="btn-group  pull-right">
                        
                    <button type="button" class="btn  btn-outline-warning btn-sm pull-right btnBimestre"  bimestre="'.$bimestre["cod_bimestre"].'" idAsignacion="'.$_GET["idAsignacion"].'" idCurso="'.$_GET["idCurso"].'" nombreMat="'.$_GET["nombreMat"].'" tipo="'.$_SESSION["tipo"].'">Abrir</button>
      
                  </div>  
                
                </th>
                ';

              }

              if($gestion["bimestres"] >= 2){

                $item1 = "cod_gestion";
                $valor1 = $gestion["cod_gestion"];

                $item2 = "numeroBi";
                $valor2 = 2;

                $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                echo'

                <th colspan="7" style="background-color : '.$paleta[7].'";> 2DO. BIMESTRE  
                  <div class="btn-group  pull-right">
                        
                    <button type="button" class="btn  btn-outline-warning btn-sm pull-right btnBimestre"  bimestre="'.$bimestre["cod_bimestre"].'" idAsignacion="'.$_GET["idAsignacion"].'" idCurso="'.$_GET["idCurso"].'" nombreMat="'.$_GET["nombreMat"].'"  tipo="'.$_SESSION["tipo"].'">Abrir</button>
      
                  </div>  
                </th>
                
                ';

              }

              if($gestion["bimestres"] >= 3){

                $item1 = "cod_gestion";
                $valor1 = $gestion["cod_gestion"];

                $item2 = "numeroBi";
                $valor2 = 3;

                $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                echo'
                <th colspan="7" style="background-color : '.$paleta[8].'";> 3ER. BIMESTRE
                  <div class="btn-group  pull-right">
                        
                    <button type="button" class="btn  btn-outline-warning btn-sm pull-right btnBimestre"  bimestre="'.$bimestre["cod_bimestre"].'" idAsignacion="'.$_GET["idAsignacion"].'" idCurso="'.$_GET["idCurso"].'" nombreMat="'.$_GET["nombreMat"].'"  tipo="'.$_SESSION["tipo"].'">Abrir</button>
          
                  </div>
                </th>
                ';

              }

              if($gestion["bimestres"] >= 4){

                $item1 = "cod_gestion";
                $valor1 = $gestion["cod_gestion"];

                $item2 = "numeroBi";
                $valor2 = 4;

                $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                echo'
                <th colspan="7" style="background-color : #9A2EFE";> 4TO. BIMESTRE
                  <div class="btn-group  pull-right">
                        
                    <button type="button" class="btn  btn-outline-warning btn-sm pull-right btnBimestre"  bimestre="'.$bimestre["cod_bimestre"].'" idAsignacion="'.$_GET["idAsignacion"].'" idCurso="'.$_GET["idCurso"].'" nombreMat="'.$_GET["nombreMat"].'"  tipo="'.$_SESSION["tipo"].'">Abrir</button>
      
                  </div>
                </th>
                ';

              }

            ?>

              <th style="width:10px; background-color : #6600cc"; rowspan="2"><p class="verticalText" style="color:#ffffff";>PROMEDIO FINAL</p></th>

            </tr>
          
            <tr>

              

              <?php

                  for ($i=1; $i <= $gestion["bimestres"]; $i++) { 

                    echo'
                      <th data-orderable="false" style="width:10px">Ser</th>
                      <th data-orderable="false" style="width:10px">Saber</th>
                      <th data-orderable="false" style="width:10px">Hacer</th>
                      <th data-orderable="false" style="width:10px">Decidir</th>
                      <th data-orderable="false" style="width:10px">Auto Ser</th>
                      <th data-orderable="false" style="width:10px">Auto Decidir</th>
                      <th  style="width:10px; background-color : '.$paleta[9].'">TOTAL</th>
                    ';
                    
                  }
              ?>
              
              
          
            </tr> 

          </thead>

          <tbody>

            <?php

            

            $valor = $_GET["idCurso"];

            $estudiantes = ControladorInscritos::ctrMostrarListaE($valor);

            foreach ($estudiantes as $key => $value) {

              $final = 0;
              
              echo'<tr>
                    
                    <td>'.($key+1).'</td>
                    <td>'.$value["ape_paterno"].'  '.$value["ape_materno"].'  '.$value["nombre_usu"].'</td>';

                    for( $i = 1 ; $i <=$gestion["bimestres"] ; $i++){

                      $idAsignacion = $_GET["idAsignacion"];

                      $idInscrito = $value["cod_ins"];

                      $bimestre = $i;

                      $calificacionesBi = ControladorCalificaciones::ctrCalificacionesGeneralesBimestrales($idAsignacion, $idInscrito, $bimestre);

                      if(!empty($calificacionesBi)){

                        echo' <td>'.$calificacionesBi["ser"].'</td>
                              <td>'.$calificacionesBi["saber"].'</td>
                              <td>'.$calificacionesBi["hacer"].'</td>
                              <td>'.$calificacionesBi["decidir"].'</td>
                              <td>'.$calificacionesBi["auto_ser"].'</td>
                              <td>'.$calificacionesBi["auto_decidir"].'</td>
                              <td  style="width:10px; background-color : '.$paleta[9].'">'.$calificacionesBi["nota_bi"].'</td>';

                              $final = $final + $calificacionesBi["nota_bi"] / $gestion["bimestres"];

                      }else{
                            
                        echo' <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>';

                      } 

                    }
                    
                    $ponderacion = round($final);

                    echo' <td style="background-color : '.$paleta[5].'">'.$ponderacion.'</td>';
                      
                    echo '</tr>'; 

            }

            ?>

          </tbody> 

        </table>

      </div>

    </div>

  </section>

</div>