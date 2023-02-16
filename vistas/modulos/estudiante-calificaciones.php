<div class="content-wrapper">

  <section class="content-header">
    
    <h1> 

        <?php 

      	$item = "cod_gestion";
				$valor = $_SESSION["gestion"];

				$gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

        echo ' Calificaciones - Gestion : '.$gestion["gestion"];
      ?>

    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registros de Calificacion</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success " data-toggle="modal" data-target="#modalImprimirBoletin" ><i class="fa fa-print"></i> -
            
            Imprimir Boletin

        </button>             

      </div>  

      <div class="box-body table-responsive">
        
        <table class="table table-bordered table-striped  tablas" width="100%">
          
          <thead>

          

            <tr>
              <th style="width:10px" rowspan="2" >N°</th>
              <th style="width:100px" rowspan="2" >Curricula</th>

                <?php

                   if($_SESSION["tipo"] == 3){

                    $idGestion = $_SESSION["gestion"];
      
                  }else {
      
                    $idGestion = $_GET["idGestion"];
      
                  }


                $item = "cod_gestion";
                
                $valor = $idGestion;

                $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

                $item1 = null;
                $valor1 = null;
                $item2 = "cod_gestion";
                $valor2 = $gestion["cod_gestion"];

                $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                $paleta = array("#ff6666", "#66b3ff", "#fbfb6a", "#9A2EFE", "#ccffe6", "#ccccff");

                


                if($gestion["bimestres"] >= 1){
                  echo'<th colspan="7" style="background-color : #ff6666";> 1ER. BIMESTRE </th> ';

                }

                if($gestion["bimestres"] >= 2){
                  echo'<th colspan="7" style="background-color : #66b3ff";> 2DO. BIMESTRE </th>';

                }

                if($gestion["bimestres"] >= 3){
                  echo'<th colspan="7" style="background-color : #fbfb6a";> 3ER. BIMESTRE </th>';

                }

                if($gestion["bimestres"] >= 4){
                  echo'<th colspan="7" style="background-color : #9A2EFE";> 4TO. BIMESTRE </th> ';

                }

                ?>

                <th style="width:10px" rowspan="2">FINAL</th>

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
                      <th style="width:10px; background-color : '.$paleta[4].'">PROM</th>
                    ';
                    
                  }
              ?>

              
          
            </tr> 

          </thead>

          <tbody>

            <?php

            if($_SESSION["tipo"] == 3){

              $valor = $_SESSION["idEstudiante"];
              $idGestion = $_SESSION["gestion"];

            }else {

              $valor = $_GET["idEstudiante"];
              $idGestion = $_GET["idGestion"];

            }
            // var_dump($valor);
            // var_dump($idGestion);

            $item = "cod_est";  

            $inscrito = ControladorInscritos::ctrMostrarInscritos($item, $valor , $idGestion);

            $item = "cod_cur";

            $valor = $inscrito["cod_cur"]; 
            $curso = $inscrito["cod_cur"]; 

            $asignacion = ControladorAsignacion::ctrMostrarAsignacionesEspecificas($item, $valor);

            foreach ($asignacion as $key => $value) { // Se recore todas las masterias del alumno
            
              $item = "cod_mat";
              $valor = $value["cod_mat"];

              $materia = ControladorMaterias::ctrMostrarMaterias($item, $valor);

              

              echo'<tr>
                    
                    <td>'.($key+1).'</td>
                    <td>'.$materia["nombre_mat"].'</td>';

                    $item1 = null;
                    $valor1 = null;
                    $item2 = "cod_gestion";
                    $valor2 = $gestion["cod_gestion"];

                    $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);



                    foreach ($bimestre as $key1 => $value1) {
 
                      $idAsignacion = $value["cod_asig"];

                      $idInscrito = $inscrito["cod_ins"];

                      $bimestre =  $value1["cod_bimestre"];

                      $calificacionesBi = ControladorCalificaciones::ctrCalificacionesGeneralesBimestrales($idAsignacion, $idInscrito, $bimestre);

                      if(!empty($calificacionesBi)){

                        echo' <td>'.$calificacionesBi["ser"].'</td>
                              <td>'.$calificacionesBi["saber"].'</td>
                              <td>'.$calificacionesBi["hacer"].'</td>
                              <td>'.$calificacionesBi["decidir"].'</td>
                              <td>'.$calificacionesBi["auto_ser"].'</td>
                              <td>'.$calificacionesBi["auto_decidir"].'</td>
                              <td style="background-color : '.$paleta[4].'">'.$calificacionesBi["nota_bi"].'</td>';

                        
                        

                      }else{
                            
                        echo' <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td style="background-color : '.$paleta[4].'"></td>';

                      } 

                      

                    }

                    //array_values ( array $bimestre );

                    
                    



              echo'<td style="background-color : '.$paleta[5].'"></td>';
                
              echo '</tr>'; 
            }

          
            ?>

          </tbody> 

        </table>

      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL BiMESTRE COMPORTAMIENTO
======================================-->

<div id="modalImprimirBoletin" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Selecione Boletin de Bimestre a Imprimir</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Bimestre -->

            <div class="form-group">

              <table class="table table-bordered text-center">

                <tbody>

                <?php

                  date_default_timezone_set('America/La_Paz');
                  $hoy = date('Y-m-d');
                
                  $item1 = null;
                  $valor1 = null;
                  $item2 = "cod_gestion";
                  $valor2 = $gestion["cod_gestion"];

                  $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                  foreach ($bimestre as $key => $value) {

                    switch ($value["numeroBi"]) {
                      case 1:
                        $numero ="Primer";
                        $color ="#ff6666";
                        break;

                      case 2:
                        $numero ="Segundo";

                        $color ="#66b3ff";
                        break;
                        
                      case 3:
                        $numero ="Tercer";
                        $color ="#fbfb6a";
                        break;

                      case 4:
                        $numero ="Cuarto";
                        $color ="#9A2EFE";
                        break;
                    
                    }

                    

                    if ($hoy >= $value["fin"]) {

                      $atributo = "";


                     
                    }else{


                      $atributo = "disabled";


                    }

                    echo'<tr>
                          <td>
                          <button type="button" '.$atributo.' class="btn btn-block  btn-lg btnImprimirBoletin" style="background-color : '.$color.'"  codigoInscrito="'.$idInscrito.'" codigoCurso="'.$curso.'" bimestre="'.$value["cod_bimestre"].'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-print"></i> '.$numero.' Bimestre</font></font></button>
                          </td>
                        </tr>';
                  }

                ?>
                
                </tbody>

              </table>
              
            </div>
            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

      </form>

    </div>

  </div>

</div>