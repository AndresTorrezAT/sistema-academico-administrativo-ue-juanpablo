<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      

      <?php 

      $item = "cod_gestion";
      $valor = $_SESSION["gestion"];

      $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

      echo 'Administrar Cursos  - Gestion : '.$gestion["gestion"];

    ?>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Curso</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box box-default">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCurso">
          
          Añadir Nuevo Curso

        </button>

      </div>

      <div class="box-body"> 
      
        <!-- TABLA PRIMARIA -->

        <div class="box box-solid box-maroon">  

          <div class="box-header with-border">

                  PRIMARIA

          </div>

          <div class="box-body">
              
            <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
                
                <thead>
                
                  <tr>
                    
                    <th>Curso</th>
                    <th>Paralelo</th>
                    <th>Cupos</th>
                    <th>N° de inscritos</th>
                    <th>Capacidad</th>
                    <th>Gestion</th>
                    <th>Acciones</th>

                  </tr> 

                </thead>

                <tbody>  

                  <?php

                  // MOSTRAR CURSOS NIVEL PRIMARIA

                  // $item = "gestion";
                  // $valor = $_SESSION["gestion"];

                  // $Idgestion = ControladorGestion::ctrMostrarGestion($item, $valor);

                  $valor = 1;
                  
                  $gestion = $_SESSION["gestion"];

                  $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

                  foreach ($cursos as $key => $value) {

                    $item ="cod_cur";
                    $valor = $value["cod_cur"];

                    $totalIns = ControladorInscritos::ctrMostrarCantidadInscritosCurso($item, $valor);

                    
                    echo'
                    <tr>
                    <td><dt class="text-maroon">'.$value["grado"].' ° de Primaria</dt> </td>
                    <td><dt>'.$value["paralelo"].'</dt></td>
                    <td> '.$value["cupos"].' Maximo </td>
                    <td><button class="btn bg-maroon">'.$totalIns["cantidad"].'</button></td>
                    <td>
                      <div  class="progress progress-xs progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: '.$totalIns["cantidad"]*100/$value["cupos"].'%"></div>
                      </div>                 
                    </td>               
                    <td>'.$value["gestion"].'</td>
                    
                    <td>

                      <div class="btn-group">
                              
                        <button class="btn btn-warning btnEditarCurso" idCurso="'.$value["cod_cur"].'" data-toggle="modal" data-target="#modalEditarCurso"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCurso" idCurso="'.$value["cod_cur"].'"><i class="fa fa-times"></i></button>

                      </div>

                      <button class="btn btn-success btnAsignar" idCurso="'.$value["cod_cur"].'"  key="'.$key.'" data-toggle="modal" data-target="#modalAgregarMat-Doc">Asignatura - Docente</button>

                    </td>

                  </tr>
                    ';
                  }

                  ?>

                </tbody> 

            </table>

          </div>

        </div>

        <!-- FINAL TABLA PRIMARIA -->


        <!-- TABLA PRIMARIA -->

        <div class="box box-solid box-primary">  

          <div class="box-header with-border">

                  SECUNDARIA

          </div>

          <div class="box-body">
          

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                  
                  <thead>
                  
                    <tr>
                      
                      <th>Curso</th>
                      <th>Paralelo</th>
                      <th>Cupos</th>
                      <th>N° de inscritos</th>
                      <th>Capacidad</th>
                      <th>Gestion</th>
                      <th>Acciones</th>

                    </tr> 

                  </thead>

                  <tbody>  

                    <?php

                    // MOSTRAR CURSOS NIVEL SECUNDARIA

                    $valor = 2; 

                    $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

                    foreach ($cursos as $key => $value) {

                      $item ="cod_cur";
                      $valor = $value["cod_cur"];
  
                      $totalIns = ControladorInscritos::ctrMostrarCantidadInscritosCurso($item, $valor);
                           
                      echo'
                      <tr>
                      <td><dt class="text-light-blue">'.$value["grado"].' ° de Secundaria</dt> </td>
                      <td><dt>'.$value["paralelo"].'</dt></td>
                      <td> '.$value["cupos"].' Maximo </td>
                      <td><button class="btn btn-primary">'.$totalIns["cantidad"].'</button></td>
                      <td>
                        <div  class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: '.$totalIns["cantidad"]*100/$value["cupos"].'%"></div>
                        </div>                 
                      </td>               
                      <td>'.$value["gestion"].'</td>
                      
                      <td>

                        <div class="btn-group">
                                
                          <button class="btn btn-warning btnEditarCurso" idCurso="'.$value["cod_cur"].'" data-toggle="modal" data-target="#modalEditarCurso"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnEliminarCurso" idCurso="'.$value["cod_cur"].'"><i class="fa fa-times"></i></button>

                        </div>

                        <button class="btn btn-success btnAsignar" idCurso="'.$value["cod_cur"].'" key="'.$key.'" data-toggle="modal" data-target="#modalAgregarMat-Doc">Asignatura - Docente</button> 

                      </td>

                    </tr>
                      ';
                    }

                    ?>
    
                  </tbody> 

            </table>   

          </div>

        </div>

        <!-- FINAL TABLA PRIMARIA -->
        </div>

    </div>

  </section>

</div>




<!--=====================================
MODAL AGREGAR CURSO
======================================-->

<div id="modalAgregarCurso" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL GRADO (1°, 2°) -->
            
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <select class="form-control input-lg" name="nuevoGrado">
                  
                  <option value="">Selecionar Grado</option>

                  <option value="1"> 1 ° - Primero</option>

                  <option value="2"> 2 ° - Segundo</option>

                  <option value="3"> 3 ° - Tercero</option>

                  <option value="4"> 4 ° - Cuarto</option>

                  <option value="5"> 5 ° - Quinto</option>

                  <option value="6"> 6 ° - Sexto</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA EL NIVEL (primaria, seccundaria) -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoNivel">
                  
                  <option value="">Selecionar Nivel</option>

                  <option value="1">Primaria</option>

                  <option value="2">Secundaria</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA EL PARALELO (A, B, c)-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <select class="form-control input-lg" name="nuevoParalelo">
                  
                  <option value="">Selecionar Paralelo</option>

                  <option value="A">Paralelo A</option>

                  <option value="B">Paralelo B</option>

                  <option value="C">Paralelo C</option>

                  <option value="D">Paralelo D</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA CANTIDAD DE CUPOS -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoCupo" placeholder="Ingresar Cupos Maximo" required>

              </div>

            </div>


            
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Curso</button>

        </div>

        <?php

          $crearCurso = new ControladorCursos();
          $crearCurso -> ctrCrearCursos();

        ?>

      </form>

    </div>

  </div>

</div>





<!--=====================================
MODAL EDITAR CURSO
======================================-->

<div id="modalEditarCurso" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL GRADO (1°, 2°) -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="hidden" id="editarCod" name="editarCod">

                <input type="text" class="form-control input-lg" id="editarGrado" name="editarGrado" value="" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL NIVEL (primaria, seccundaria) -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarNivel">
                  
                  <option value="" id="editarNivel"></option>

                  <option value="1">Primaria</option>

                  <option value="2">Secundaria</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA EL PARALELO (A, B, c)-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" id="editarParalelo" name="editarParalelo" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CANTIDAD DE CUPOS -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCupo" name="editarCupo" value="" required>

              </div>

            </div>


            
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

        <?php

          $editarCurso = new ControladorCursos();
          $editarCurso -> ctrEditarCursos();

        ?>

      </form>

    </div>

  </div>

</div>





<!--=====================================
MODAL AGREGAR MATERIA - DOCENTE
======================================-->

<div id="modalAgregarMat-Doc" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" id="modalBaseAsignacion">

          

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" id="btnGuardarAsig">Guardar Asignacion</button>

        </div>

        <?php

          $asignacion = new ControladorAsignacion();
          $asignacion -> ctrEditarAsignacion();

        ?>

      </form>

    </div>

  </div>

</div>










<?php

$borrarCurso = new ControladorCursos();
$borrarCurso -> ctrBorrarCurso();

?> 




