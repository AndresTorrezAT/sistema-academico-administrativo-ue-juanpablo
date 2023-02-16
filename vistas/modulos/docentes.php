<div class="content-wrapper"> 

<section class="content-header">
  
  <h1>
    
    Personal Docente
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Personal Docente</li>
  
  </ol>

</section>

<section class="content">

<div class="box box-default">

  <div class="box-header with-border">

      <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarDocente">
        
        Registrar Nuevo Docente

      </button>

  </div>

  <div class="box-body"> 
  
    <!-- TABLA PRIMARIA -->

    <div class="box box-solid box-maroon">  

      <div class="box-header with-border">

        DOCENTES DE PRIMARIA

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        
        <thead>
          
          <tr>
            
            <th style="width:10px">#</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Nombre</th>
            <th>N° Carnet</th>
            <th>Foto</th>
            <th>Estado</th>
            <th>Formacion</th>
            <th>Acciones</th>
  
          </tr> 
  
        </thead>
  
        <tbody>
  
          <?php
            
            $item = "tipo_usu";
            $valor = 2;
    
            $usuarios = ControladorUsuarios::ctrMostrarUsuariosE($item, $valor);
    
            //  var_dump($usuarios); 
    
            foreach ($usuarios as $key => $value){

              $item = "cod_usu";
              $valor = $value["cod_usu"];
              
              $docente = ControladorDocentes::ctrMostrarDocentes($item, $valor); 

              if($docente["nivel"] == 1){
                  
                  echo '<tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["ape_paterno"].'</td>
                          <td>'.$value["ape_materno"].'</td>
                          <td>'.$value["nombre_usu"].'</td>
                          <td>'.$value["carnet"].'</td>';

                          if($value["foto_perfil"] != ""){

                            echo '<td><img src="'.$value["foto_perfil"].'" class="img-thumbnail" width="40px"></td>';

                          }
                          else{

                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';                        

                          }
                          
                                   


                          if($docente["estado"] != 0){

                            echo '<td><button class="btn btn-success btn-xs btnActivarD" idDocente="'.$docente["cod_doc"].'" estadoUsuario="0">Activado</button></td>';

                          }else{

                            echo '<td><button class="btn btn-danger btn-xs btnActivarD" idDocente="'.$docente["cod_doc"].'" estadoUsuario="1">Desactivado</button></td>';

                          }

                          echo '<td>'.$docente["formacion"].'</td>

                          <td>
                          
                            <div class="btn-group">

                              <button class="btn btn-warning btnEditarDocente" idUsuario="'.$value["cod_usu"].'" data-toggle="modal" data-target="#modalEditarDocente"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnEliminarDocente" idUsuario="'.$value["cod_usu"].'" fotoUsuario="'.$value["foto_perfil"].'" carnet="'.$value["carnet"].'"><i class="fa fa-times"></i></button>
                            
                            </div>
                          
                          </td>
                    </tr>'; 
              }

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

        DOCENTES DE SECUNDARIA

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        
        <thead>
          
          <tr>
            
            <th style="width:10px">#</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Nombre</th>
            <th>N° Carnet</th>
            <th>Foto</th>
            <th>Estado</th>
            <th>Formacion</th>
            <th>Campo</th>
            <th>Acciones</th>
  
          </tr> 
  
        </thead>
  
        <tbody>
  
          <?php
            
            $item = "tipo_usu";
            $valor = 2;
    
            $usuarios = ControladorUsuarios::ctrMostrarUsuariosE($item, $valor);
    
            //  var_dump($usuarios); 
    
            foreach ($usuarios as $key => $value){

              $item = "cod_usu";
              $valor = $value["cod_usu"];
                
              $docente = ControladorDocentes::ctrMostrarDocentes($item, $valor);     

              if($docente["nivel"] == 2){
                  
                  echo '<tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["ape_paterno"].'</td>
                          <td>'.$value["ape_materno"].'</td>
                          <td>'.$value["nombre_usu"].'</td>
                          <td>'.$value["carnet"].'</td>';

                          if($value["foto_perfil"] != ""){

                            echo '<td><img src="'.$value["foto_perfil"].'" class="img-thumbnail" width="40px"></td>';

                          }
                          else{

                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';                        

                          }
                          
                                                         
                          if($docente["estado"] != 0){

                            echo '<td><button class="btn btn-success btn-xs btnActivarD" idDocente="'.$docente["cod_doc"].'" estadoUsuario="0">Activado</button></td>';

                          }else{

                            echo '<td><button class="btn btn-danger btn-xs btnActivarD" idDocente="'.$docente["cod_doc"].'" estadoUsuario="1">Desactivado</button></td>';

                          }

                          $item = "cod_mat";
                          $valor = $docente["materia"];

                          $materia = ControladorMaterias::ctrMostrarMaterias($item, $valor);

                          echo '<td>'.$docente["formacion"].'</td>
                          <td>'.$materia["nombre_mat"].'</td>

                          <td>
                          
                            <div class="btn-group">

                              <button class="btn btn-warning btnEditarDocente" idUsuario="'.$value["cod_usu"].'" data-toggle="modal" data-target="#modalEditarDocente"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnEliminarDocente" idUsuario="'.$value["cod_usu"].'" fotoUsuario="'.$value["foto_perfil"].'" carnet="'.$value["carnet"].'"><i class="fa fa-times"></i></button>
                            
                            </div>
                          
                          </td>
                    </tr>'; 
              }

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
MODAL AGREGAR DOCENTE
======================================-->

<div id="modalAgregarDocente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" class="formularioDocente">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Docente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL APELLIDO PATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApellidoP" placeholder="Ingresar Apellido Paterno" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO MATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApellidoM" placeholder="Ingresar Apellido Materno" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" id="nuevoNombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevaFechaN" placeholder="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CI-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoCi" id="nuevoCi" placeholder="Ingresar N° de Carnet" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA FORMACION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFormacion" placeholder="Ingresar Formacion" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA ASIGNACION DE MATERIA-->

            <div class="form-group">
              
              <div class="panel">ASIGNACION DE CAMPO</div>

              <div class="input-group form-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                  <select class="form-control input-lg seleccionarNivelA" name="nuevoNivel">
                    
                    <option value="">Selecionar Nivel</option>

                    <option value="1">  Primaria</option>

                    <option value="2">  Secundaria</option>

                  </select>

              </div>

              <div class="input-group form-group materiaDocenteA">
              
                <!-- <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoNivel" id="selectMateria">
                  
                  <option value="">Selecionar Materia</option>

                </select> -->

              </div>

            </div>

   

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Docente</button>

        </div>


        <?php
        
        $crearDocente = new ControladorDocentes();
        $crearDocente -> ctrCrearDocente();

        ?>


      </form>

    </div>

  </div>

</div>



<!--=====================================
MODAL EDITAR DOCENTE
======================================-->

<div id="modalEditarDocente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" class="formularioDocente">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Docente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL APELLIDO PATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="hidden" id="cod_usu" name="cod_usu">
                <input type="text" class="form-control input-lg" id="editarApellidoP" name="editarApellidoP" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO MATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarApellidoM" name="editarApellidoM" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" id="editarPassword" name="editarPassword" placeholder="Ingresar nueva contraseña" required>
                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="date" class="form-control input-lg" id="editarFechaN" name="editarFechaN"  required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CI-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="number" class="form-control input-lg" id="editarCi" name="editarCi" readonly>
              </div>

            </div>

            <!-- ENTRADA PARA LA FORMACION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarFormacion" name="editarFormacion" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA ASIGNACION DE MATERIA-->

            <div class="form-group">
              
              <div class="panel">ASIGNACION DE MATERIA</div>

              <div class="input-group form-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                  <select class="form-control input-lg seleccionarNivelE"  name="editarNivel">
                    
                    <option value="" id="selectNivel"></option>

                    <option value="1">  Primaria</option>

                    <option value="2">  Secundaria</option>

                  </select>

              </div>

              <div class="input-group form-group materiaDocenteE">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarMateria">
                  
                  <option value="" id="selectMateria"></option>

                </select>

              </div>

            </div>

   

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

                <input type="file" class="nuevaFoto" name="editarFoto">

                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Docente</button>

        </div>

        <?php

          $editarDocente = new  ControladorDocentes();
          $editarDocente -> ctrEditarDocente();

        ?>


      </form>

    </div>

  </div>

</div>

<?php

    $borrarDocente = new ControladorDocentes();
    $borrarDocente -> ctrBorrarDocente();

?>

