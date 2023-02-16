<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Crear Horario
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reportes de ventas</li>
    
    </ol>

  </section>

  
  <section class="content">

    <div class="box box-success">

      <form role="form" method="post" class="formularioHorario">

        <div class="box-header with-border">

          <button type="submit" class="btn btn-success" >Guardar</button>
          

        </div>

        <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control seleccionarCurso" id="seleccionarCurso" name="idCurso" required>

                  <option value="">Seleccionar Curso</option>

                  <?php

                    $gestion = $_SESSION["gestion"];
                    $item = null;
                    $valor = null;

                    $cursos = ControladorCursos::ctrMostrarCursos($item, $valor, $gestion);

                      foreach($cursos as $key => $value){
                        
                        if($value["horario"] == 0){

                          if($value["nivel"] == 1){

                            echo'<option value="'.$value["cod_cur"].'" nivelCur="'.$value["nivel"].'">'.$value["grado"].'°('.$value["paralelo"].') de Primaria</option>';

                          }else{

                            echo'<option value="'.$value["cod_cur"].'" nivelCur="'.$value["nivel"].'">'.$value["grado"].'°('.$value["paralelo"].') de Secundaria</option>';

                          }

                        }  
                        
                      }

                  ?>

                </select>
                
                
              </div>
            
            </div>

            <div class="box input-group">
            
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

                  <tbody class="tablaHorario">

                    <!-- <?php

                      for($i=1; $i<=9; $i++){

                        if($i != 5){

                        echo '<tr>

                                <td>'.$i.'</td>
              
                                <td>
                                  <select size="1" id="row-'.$i.'1" name="row-'.$i.'1" required>
                                      
                                  </select>
                                </td>
              
                                <td>
                                  <select size="1" id="row-'.$i.'2" name="row-'.$i.'2" required>
                                      
                                  </select>
                                </td>
              
                                <td>
                                  <select size="1" id="row-'.$i.'3" name="row-'.$i.'3" required>
                                      
                                  </select>
                                </td>
              
                                <td>
                                  <select size="1" id="row-'.$i.'4" name="row-'.$i.'4" required>
                                    
                                  </select>
                                </td>
              
                                <td>
                                  <select size="1" id="row-'.$i.'5" name="row-'.$i.'5" required>
                                      
                                  </select>
                                </td>

                              </tr>'; 

                        }else{

                          echo'<tr>
                                <td>'.$i.'</td>
                                <td>
                                  RECREO
                                </td>
              
                                <td>
                                  RECREO
                                </td>
              
                                <td>
                                  RECREO
                                </td>
              
                                <td>
                                  RECREO
                                </td>
              
                                <td>
                                  RECREO
                                </td>
                              </tr>';
                        }

                      }

                    ?> -->
    
                  </tbody>
                  
              </table>

            </div>

          </div>

      </form>

      <?php
        
      $crearHorario = new ControladorMaterias();
      $crearHorario -> ctrCrearHorario();

      ?>

     
    </div>
  
  </section>

</div>


