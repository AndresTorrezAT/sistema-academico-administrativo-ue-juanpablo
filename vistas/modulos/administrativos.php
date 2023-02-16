<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Personal Administrativo
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrativos</li>
  
  </ol>

</section>


<section class="content">

  <div class="box box-success">

    <div class="box-header with-border">

      <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarAdministrativo">
        
        Registrar Nuevo Administrativo

      </button>

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
         <th>Cargo</th>
         <th>Acciones</th>

       </tr> 

      </thead>

      <tbody>

        <?php
        
        $item = "tipo_usu";
        $valor = 1;

        $usuarios = ControladorUsuarios::ctrMostrarUsuariosE($item, $valor);

        //  var_dump($usuarios); 


        foreach ($usuarios as $key => $value) {

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
                      
                      $item = "cod_usu";
                      $valor = $value["cod_usu"];
                      
                      $administrativo = ControladorAdministrativos::ctrMostrarAdministrativos($item, $valor);                                    


                      if($administrativo["estado"] != 0){

                        echo '<td><button class="btn btn-success btn-xs btnActivarA" idAdministrativo="'.$administrativo["cod_adm"].'" estadoUsuario="0">Activado</button></td>';

                      }else{

                        echo '<td><button class="btn btn-danger btn-xs btnActivarA" idAdministrativo="'.$administrativo["cod_adm"].'" estadoUsuario="1">Desactivado</button></td>';

                      }

                      echo '<td>'.$administrativo["cargo"].'</td>

                      <td>
                      
                        <div class="btn-group">

                          <button class="btn btn-warning btnEditarAdministrativo" idUsuario="'.$value["cod_usu"].'" data-toggle="modal" data-target="#modalEditarAdministrativo"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnEliminarAdministrativo" idUsuario="'.$value["cod_usu"].'" fotoUsuario="'.$value["foto_perfil"].'" carnet="'.$value["carnet"].'"><i class="fa fa-times"></i></button>
                        
                        </div>
                      
                      </td>
                  
                   </tr>'; 

        }

      ?>

      </tbody> 

     </table>

    </div>

  </div>

</section>

</div>




<!--=====================================
MODAL AGREGAR ADMINISTRATIVO
======================================-->

<div id="modalAgregarAdministrativo" class="modal fade" role="dialog">
  
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

            <!-- ENTRADA PARA EL CARGO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCargo" placeholder="Ingresar Cargo" required>

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

          <button type="submit" class="btn btn-primary">Guardar Administrativo</button>

        </div>


        <?php
        
        $crearDocente = new ControladorAdministrativos();
        $crearDocente -> ctrCrearAdministrativo();

        ?>


      </form>

    </div>

  </div>

</div>




<!--=====================================
MODAL EDITAR DOCENTE
======================================-->

<div id="modalEditarAdministrativo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Administrativo</h4>

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

                <input type="text" class="form-control input-lg" id="editarCargo" name="editarCargo" required>

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

          <button type="submit" class="btn btn-primary">Editar Administrativo</button>

        </div>

        <?php

          $editarAdministrativo = new ControladorAdministrativos();
          $editarAdministrativo -> ctrEditarAdministrativo();

        ?> 


      </form>

    </div>

  </div>

</div>

<?php

  $borrarAdministrativo = new ControladorAdministrativos();
  $borrarAdministrativo -> ctrBorrarAdministrativo();

?>
