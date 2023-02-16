<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
   

      <?php 

      	$item = "cod_gestion";
				$valor = $_SESSION["gestion"];

				$gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

        echo ' Administrar Materias - Gestion : '.$gestion["gestion"];
      ?>
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Materias</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

      <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarMateria">
        
        Agregar Materia

      </button>

    </div>

    <div class="box-body">

      <div class="row">

        <!-- PRIMERA MITAD -->

        <div class="col-lg-6">

          <div class="box box-solid box-maroon">

            <div class="box-header with-border">

                    PRIMARIA

            </div>

            <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
              
              <tr>
                
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>Acciones</th>

              </tr> 

              </thead>
              <tbody>

                <?php

                  // $item = "gestion";
                  // $valor = $_SESSION["gestion"];

                  // $Idgestion = ControladorGestion::ctrMostrarGestion($item, $valor);

                  $valor = 1;
                  $gestion = $_SESSION["gestion"];

                  $materias = ControladorMaterias::ctrMostrarMateriasNivel($valor, $gestion);

                  foreach ($materias as $key => $value) {


                    echo '<tr>
                            <td>'.($key+1).'</td>
                            <td><button class="btn bg-maroon ">'.$value["nombre_mat"].'</button></td>                          
                            <td>

                              <div class="btn-group">
                                  
                                <button class="btn btn-warning btnEditarMateria" idMateria="'.$value["cod_mat"].'" data-toggle="modal" data-target="#modalEditarMateria"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btnEliminarMateria" idMateria="'.$value["cod_mat"].'"><i class="fa fa-times"></i></button>


                              </div>  

                            </td>

                          </tr>';
                  
                  }

                ?>

                

              </tbody> 

            </table>

            </div>

          </div>
        
        </div>

        
        <!-- SEGUNDA MITAD -->

        <div class="col-lg-6">

          <div class="box box-solid box-primary">

            <div class="box-header with-border">

                    SECUNDARIA

            </div>

            <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
              
              <tr>
                
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>N° Profesores del Area</th>
                <th>Acciones</th>

              </tr> 

              </thead>
              <tbody>

                <?php

                  $valor = 2;
                  $gestion = $_SESSION["gestion"];

                  $materias = ControladorMaterias::ctrMostrarMateriasNivel($valor, $gestion);

                  foreach ($materias as $key => $value) {

                    $item = "materia";

                    $valor = $value["cod_mat"];

                    $docentes = ControladorDocentes::ctrMostrarDocentesPorMateria($item, $valor);

                    $numero = count($docentes);

                    echo '<tr>
                    
                            <td>'.($key+1).'</td>
                            <td><button class="btn btn-primary">'.$value["nombre_mat"].'</button></td>
                            <td> '.$numero.'</td>                            
                            <td>

                              <div class="btn-group">
                                  
                                <button class="btn btn-warning btnEditarMateria" idMateria="'.$value["cod_mat"].'" data-toggle="modal" data-target="#modalEditarMateria"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btnEliminarMateria" idMateria="'.$value["cod_mat"].'"><i class="fa fa-times"></i></button>

                              </div>  

                            </td>

                          </tr>';
                  
                  }

                ?>

                

              </tbody> 

            </table>

            </div>
          
            

          </div>

        </div>
      
      </div>

    </div>

  </div>

</section>

</div>





<!--=====================================
MODAL AGREGAR CURSO
======================================-->

<div id="modalAgregarMateria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Materia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DE MATERIA (matematicas, fisica) -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaMateria" placeholder="Ingresar Materia" required>

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
            
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Materia</button>

        </div>

        <?php

          $crearMateria = new ControladorMaterias();
          $crearMateria -> ctrCrearMateria();

        ?>

      </form>

    </div>

  </div>

</div>





<!--=====================================
MODAL EDITAR MATERIA
======================================-->

<div id="modalEditarMateria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Materia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DE MATERIA (Matematicas, Fisica) -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="hidden" id="editarCod" name="editarCod">

                <input type="text" class="form-control input-lg" id="editarMateria" name="editarMateria" value="" required>

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

          $editarMateria = new ControladorMaterias();
          $editarMateria -> ctrEditarMaterias();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarMateria = new ControladorMaterias();
$borrarMateria -> ctrBorrarMateria();

?> 
