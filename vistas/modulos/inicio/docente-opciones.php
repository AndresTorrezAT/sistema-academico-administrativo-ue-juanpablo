
<div class="row">


    <?php

    $item = "cod_gestion";
    $valor = $_SESSION["gestion"];

    $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

        $item1 = "cod_gestion";
        $valor1 = $_SESSION["gestion"];

        $item2 = "numeroBi";
        $valor2 = 1;

        $PrimerBimestre= ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);


        $item1 = "cod_gestion";
        $valor1 = $_SESSION["gestion"];

        $item2 = "numeroBi";
        $valor2 = 2;

        $SegundoBimestre= ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);


        $item1 = "cod_gestion";
        $valor1 = $_SESSION["gestion"];

        $item2 = "numeroBi";
        $valor2 = 3;

        $TercerBimestre= ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

    if($gestion["bimestres"] == 3){
        
        echo'
            <!-- ============================================
            PRIMERA DIVISION
            ============================================== -->
            <div class="col-lg-4 col-xs-12">
            
                <div class="small-box" style="background-color: #ff5050;">

                    <div class="inner">
                    <h3 style="color:#ffffff";>Primer Bimestre</h3>
                    <p> Inicio:   '.$PrimerBimestre["inicio"].'</p>
                    <p> Fin: '.$PrimerBimestre["fin"].'</p>
                    </div>

                    <div class="icon">
                    <i class="ion ion-calendar"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>

            </div>

            <!-- ============================================
            SEGUNDA DIVISION
            ============================================== -->
            <div class="col-lg-4 col-xs-12">
            
                <div class="small-box" style="background-color: #ffd452;"> 

                    <div class="inner">
                    <h3 style="color:#ffffff";>Segundo Bimestre</h3>

                    <p> Inicio: '.$SegundoBimestre["inicio"].'</p>
                    <p> Fin:  '.$SegundoBimestre["fin"].'</p>
                    </div>

                    <div class="icon">
                    <i class="ion ion-calendar"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    
                </div>

            </div>
        
            <!-- ============================================
            TERCERA DIVISION
            ============================================== -->
            <div class="col-lg-4 col-xs-12">
            
                <div class="small-box " style="background-color:#00cc99;">
                    <div class="inner">
                    <h3 style="color:#ffffff";>Tercer Bimestre</h3>
                    <p> Inicio: '.$TercerBimestre["inicio"].'</p>
                    <p> Fin: '.$TercerBimestre["fin"].'</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-calendar"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>

            </div>
        
        ';


    }

    ?>

</div>

        

<div class="box box-success">

  <div class="box-header with-border"><h3>Horario de Docente - <?php echo $_SESSION["nombre"];?></h3></div> 

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

                    $paleta = array("#ccccff", "#ccffff", "#ccffcc", "#ffffcc" , "#ffcccc", "#ffccff", "#ffcc99" );

                    $item = "cod_doc";

                    $valor = $_SESSION["idDocente"];

                    $idGestion = $_SESSION["gestion"];

                    $RespuestaCursosAsig = ControladorAsignacion::ctrMostrarCursosAsignadosADocenteGestion($item, $valor, $idGestion);

                    
                    
                    $colorR ='style="background-color : #ccff33 ";';
                                              
                        
                      $num = 1;

                      for ($i=1 ; $i <= 8 ; $i++) { // FILA

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

                              for ($j=1; $j <= 5 ; $j++) { // COLUMNA

                                $libre = 0; // EN CASO DE QUE NO TENGA MATERIA EN ESE PERIODO

                                $dia = $j; // LUNES - MARTES - MIERCOLES - JUEVES - VIERNES (COLUMNA)

                                $periodo = "periodo".$i; // PERIODO (FILA)

                                foreach ($RespuestaCursosAsig as $key => $value) {

                                  switch ($value["nivel"]) {
                                    case 1:
                                      $nivel = "Primaria";
                                      break;
                  
                                    case 2:
                                      $nivel = "Secundaria";
                                      break;
                                  }

                                $idCurso = $value["cod_cur"];

                                $horario = ControladorHorarios::ctrMostrarPeriodoEspecificos($dia, $periodo, $idCurso);

                                if(!empty($horario)) {

                                  if($_SESSION["materiaDocente"] == $horario[$periodo]) {

                                    $item = "cod_mat";

                                    $valor = $horario[$periodo];

                                    $respuesta = ControladorMaterias::ctrMostrarMaterias($item, $valor);

                                    echo'<td style="background-color : '.$paleta[$key].'";>'.$respuesta["nombre_mat"].'  -  '.$value["grado"].' ° '.$value["paralelo"].' de '.$nivel.' </td>';

                                    $libre = 1;

                                  }

                                }

                     

                                }

                                if($libre == 0){

                                  echo'<td> LIBRE </td>';

                                }

                                
                              }
                            
                        echo'</tr>';

                          $num++; 
                      }

                      



                    

                ?>

                
            
            </tbody> 

        </table>

    </div>

  </div>