<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
     ASISTENCIA
  
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
      
     <table class="table table-bordered table-striped tablas display" width="100%">
       
      <thead>
       
       <tr>
         
        <th style="width:10px;" rowspan="2" >N°</th>
        <th style="width:200px;" rowspan="2">Materias</th>
        

          <?php

            if ($_SESSION["tipo"] == 3) {

              $idBimestre = $_GET["idBimestre"];
              $idInscrito = $_SESSION["idInscrito"];
              $idCurso = $_SESSION["idCurso"];

            } else {

              $idBimestre = $_GET["idBimestre"];
              $idInscrito = $_GET["idInscrito"];
              $idCurso = $_GET["idCurso"];
              
            }
            

            $paleta = array("#ff6666", "#66b3ff", "#fbfb6a", "#9A2EFE", "#ccffe6", "#ccccff", "#ccffff", "#ccffcc", "#ffffcc" , "#ffcccc", "#ffccff");

            

            $fecha = ControladorAsistencia::ctrMostrarFechasEstudiante($idBimestre, $idInscrito);

            $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');

            $colores = array(2,6,7,8,9,10,2);

            foreach ($fecha as $key => $value) {

                $dia = $dias[date('N', strtotime($value["fecha_asis"]))];

                $diaColor = $colores[date('N', strtotime($value["fecha_asis"]))];

                echo'<th style="background-color : '.$paleta[$diaColor].'";>'.$dia.'</th>';
                

            }

          ?>

       </tr> 

       <tr>

           <?php
 
             $fecha = ControladorAsistencia::ctrMostrarFechasEstudiante($idBimestre, $idInscrito);
 
             // $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
             // $fecha = $dias[date('N', strtotime($nombredia))];
          
 
             foreach ($fecha as $key => $value) {
 
                 $fechaComoEntero = strtotime($value["fecha_asis"]);
 
                 $date = date("m-d", $fechaComoEntero);
 
                 echo'<th>'.$date.'</th>';
                 
 
             }
 
           ?>
 
        </tr> 
 

      </thead>

      <tbody>

        <?php

          /*=================================================
          OBTENER LISTA DE ESTUDIANTES CON EL ID DEL CURSO
          =================================================*/

          $item = "cod_cur";

          $valor = $idCurso;
          
          $asignacion = ControladorAsignacion::ctrMostrarAsignacionesEspecificas($item, $valor); 

          

          foreach ($asignacion as $key => $value) {

            $item = "cod_mat";
            $valor = $value["cod_mat"];


            $materias = ControladorMaterias::ctrMostrarMaterias($item, $valor);

            $idAsignacion = $value["cod_asig"];

            echo'<tr>
                  
                  <td>'.($key+1).'</td>
                  <td>'.$materias["nombre_mat"].'</td>';

                  foreach ($fecha as $key => $value) {

                    $fechaAsis = $value["fecha_asis"];

                    $respuesta = ControladorAsistencia::ctrMostarFechaEspecificaEst($idInscrito, $idAsignacion, $fechaAsis);

                    //var_dump($respuesta);

                    if (!empty($respuesta)) {

                      echo'<td>'.$respuesta["estado_asis"].'</td>';

                      
                    }else {

                      echo'<td> - </td>';

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
                    
                    $item = "cod_cur";
                    $valor = $idCurso;

                    $horario = ControladorHorarios::ctrMostrarHorarios($item, $valor);

                    //var_dump($horario); 

                    $colorR ='style="background-color :  #ccff66";';
                    
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
                                
                                  echo'<td>'.$respuesta["nombre_mat"].'</td>';

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