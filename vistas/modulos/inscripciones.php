<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
       
      <?php 

      	$item = "cod_gestion";
				$valor = $_SESSION["gestion"];

				$gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

        echo 'Inscripciones y Retiros - Gestion : '.$gestion["gestion"];
      ?>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Inscripciones </li>
    
    </ol>

  </section>

  <section class="content">

  <?php    

    // $item = "gestion";
    // $valor = $_SESSION["gestion"];

    // $Idgestion = ControladorGestion::ctrMostrarGestion($item, $valor);

    $gestion = $_SESSION["gestion"];

    $item = null;

    $valor = null;

    $cursos = ControladorCursos::ctrMostrarCursos($item, $valor, $gestion);

    //var_dump($cursos); // SIRVE PARA MOSTRAR LAS VARIABLES 

    foreach ($cursos as $key => $value) 
    {
      if($value["nivel"] == 1) {

        $color="maroon";
        
      }else{

        $color="primary";

      }

      echo'<div class="box box-solid box-'.$color.'">

            <div class="box-header with-border">';

              if($value["nivel"] == 1){

                echo '<h3 class="box-title"> Curso: '.$value["grado"].'º de Primaria ('.$value["paralelo"].')</h3>';

              }else{

                echo '<h3 class="box-title"> Curso: '.$value["grado"].'º de Secundaria ('.$value["paralelo"].')</h3>';
              }

       echo'</div>

            <div class="box-body with-border">

              <button class="btn btn-success btnnuevoEstudiante"  data-toggle="modal" data-target="#modalAgregarInscrito" idCurso="'.$value["cod_cur"].'">
                
                Inscribir Estudiante

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
                    <th>Estado Inscripción</th>
                    <th>Re inscripcion automatica</th>
                    <th>Acciones</th>

                  </tr> 

                </thead>

                <tbody>';    
  ?>
  <?php
                  // CODIGO DEL CURSO ($valor)

                  $valor = $value["cod_cur"];

                  $estudiantes = ControladorInscritos::ctrMostrarListaE($valor);

                  // var_dump($estudiantes); 

                  foreach ($estudiantes as $key => $value) 
                  {

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

                            if($value["estadoIns"] != 0){

                              echo '<td><button class="btn btn-success btn-xs btnActivarI" idInscrito="'.$value["cod_ins"].'" estadoUsuario="0">Inscrito</button></td>';

                            }else{

                              echo '<td><button class="btn btn-danger btn-xs btnActivarI" idInscrito="'.$value["cod_ins"].'" estadoUsuario="1">Retirado</button></td>';

                            }

                      echo '<td><input type="checkbox"></td>

                            <td>
                            
                              <div class="btn-group">

                                <button class="btn btn-warning btnEditarAdministrativo" idUsuario="'.$value["cod_usu"].'" data-toggle="modal" data-target="#modalEditarAdministrativo"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btnEliminarAdministrativo" idUsuario="'.$value["cod_usu"].'" fotoUsuario="'.$value["foto_perfil"].'" carnet="'.$value["carnet"].'"><i class="fa fa-times"></i></button>
                              
                              </div>
                            
                            </td>
                        
                          </tr>'; 

                  }

  ?>
  <?php
        echo '</tbody> 

            </table>

          </div>

        </div>';
  
    }
  ?>
  
  </section>

</div>


<!--=====================================
MODAL AGREGAR ESTUDIANTE
======================================-->

<div id="modalAgregarInscrito" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">FORMULARIO DE INSCRIPCION</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <!--///// DIVISION PRINCIPAL ROW DEL MODAL /////-->

          <div class="row">

            <!--///// MITAD 1 /////-->

            <div class="col-lg-6">

              <div class="box-body">
    
                <!-- P R I M E R  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">DATOS PERSONALES DEL ESTUDIANTE</div>

                    <!-- ENTRADA PARA EL APELLIDO PATERNO -->
                    
                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoApellidoP"  placeholder="Ingresar Apellido Paterno">

                      </div>

                    </div>

                    <!-- ENTRADA PARA EL APELLIDO MATERNO -->
                    
                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" name="nuevoApellidoM" placeholder="Ingresar Apellido Materno">

                      </div>

                    </div>


                    <!-- ENTRADA PARA EL NOMBRE -->

                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa  fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

                      </div>

                    </div>

                    <!-- ENTRADA PARA EL CI-->

                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa  fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" name="nuevoCi" id="nuevoCi" placeholder="Ingresar N° de Carnet" required>

                      </div>

                    </div>

                    <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                    <div class="panel">FECHA DE NACIMIENTO</div>

                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                        <input type="date" class="form-control input-lg" name="nuevaFechaN" placeholder="" required>

                      </div>

                    </div>

                    <!--******* DIVISION DE DIVISION (GENERO, PESO, TALLA)-->

                    <div class="panel"> GENERO  -  PESO  -  TALLA</div>

                    <div class="form-group">

                      <div class="row">

                        <!-- GENERO -->

                        <div class="col-xs-4">

                          <select class="form-control input-lg" name="nuevoGenero" required>
                            
                            <option value="">Genero</option>

                            <option value="0">Femenino</option>

                            <option value="1">Masculino</option>

                          </select>

                        </div>

                        <!-- PESO -->

                        <div class="col-xs-4">

                          <div class="input-group">
                        
                            <input type="text" class="form-control input-lg" name="nuevoPeso" id="nuevoPeso" placeholder="Peso">
                            <span class="input-group-addon"><i class="fa fa-child"></i></span>

                          </div>

                        </div>

                        <!-- TALLA -->
                        <div class="col-xs-4">
                        
                          <div class="input-group">

                            <input type="text" class="form-control input-lg" name="nuevaTalla" id="nuevaTalla" placeholder="Talla">
                            <span class="input-group-addon"><i class="fa fa-child"></i></span>

                          </div>

                        </div>
          
                      </div>

                    </div>

                </div>

                <!-- S E G U N D O  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">DATOS DE USUARIO</div>

                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Usuario" readonly>

                  </div>
                  
                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                    <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                  </div>

                </div>

                <!-- T E R C E R   T I T U L O  -->

                <div class="form-group">

                  <div class="panel">GESTION Y CURSO A INSCRIBIR</div>

                  <label for="Name">Gestion</label>
                  
                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span> 

                    <input type="text" class="form-control input-lg" id="gestionIns" readonly>
                    <input type="hidden" name="nuevaGestion" id="idGestionIns" >

                  </div>

                  <label for="Name">Curso</label>

                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa  fa-graduation-cap"></i></span> 

                    <input type="text" class="form-control input-lg" id="Curso" value="" readonly>
                    
                    <input type="hidden" class="form-control input-lg" id="nuevoCodCurso"  name="nuevoCodCurso" required>

                  </div>

                </div>

                <!-- C U A R T O  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">TELEFONO FIJO Y CELULAR DE CONTACTO</div>

                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoFijo" placeholder="Ingresar teléfono fijo" data-inputmask="'mask':'(999) 999-9999'" data-mask>

                  </div>
                  
                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoCelular" placeholder="Ingresar celular de contacto" data-inputmask="'mask':'(999) 999-9999'" data-mask>        

                  </div>

                </div>


                <!-- C U A R T O   T I T U L O -->

                <div class="form-group">
                  
                  <div class="panel">SUBIR FOTO</div>

                    <input type="file" class="nuevaFoto" name="nuevaFoto">

                    <p class="help-block">Peso máximo de la foto 2MB</p>

                    <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                </div>


              </div>

            </div>

            <!--///// MITAD 2 /////-->
            <div class="col-lg-6">

              <div class="box-body">

                <!-- P R I M E R  T I T U L O  -->
                <div class="form-group">

                  <div class="panel">DATOS DEL PADRE DEL ESTUDIANTE</div>

                  <div class="form-group">

                    <div class="row form-group">

                        <div class="col-xs-6">

                          <input type="text" class="form-control input-lg" name="nuevoApellidoPP" placeholder="Apellido Paterno(P)">

                        </div>

                        <div class="col-xs-6">
                       
                          <input type="text" class="form-control input-lg" name="nuevoApellidoMP" placeholder="Apellido Materno(P)">
                        
                        </div>

                    </div>

                    <div class="row form-group">

                        <div class="col-xs-7">

                          <input type="text" class="form-control input-lg" name="nuevoNombreP" placeholder="Nombre de Padre">

                        </div>

                        <div class="col-xs-5">
                       
                          <input type="text" class="form-control input-lg" name="nuevoCiP" placeholder="Carnet Padre">
                        
                        </div>

                    </div>

                  </div>

                </div>

                <!-- S E G U N D O  T I T U L O  -->
                <div class="form-group">

                  <div class="panel">DATOS DE LA MADRE DEL ESTUDIANTE</div>

                  <div class="form-group">

                    <div class="row form-group">

                        <div class="col-xs-6">

                          <input type="text" class="form-control input-lg" name="nuevoApellidoPM" placeholder="Apellido Paterno(M)">

                        </div>

                        <div class="col-xs-6">

                          <input type="text" class="form-control input-lg" name="nuevoApellidoMM" placeholder="Apellido Materno(M)">

                        </div>

                    </div>

                    <div class="row form-group">

                        <div class="col-xs-7">

                        <input type="text" class="form-control input-lg" name="nuevoNombreM" placeholder="Nombre de Madre">

                        </div>

                        <div class="col-xs-5">

                          <input type="text" class="form-control input-lg" name="nuevoCiM" placeholder="Carnet Madre">

                        </div>

                    </div>

                  </div>

                </div>

                <!-- T E R C E R O  T I T U L O  -->
                <div class="form-group">

                  <div class="panel">DATOS DEL TUTOR DEL ESTUDIANTE</div>

                  <div class="form-group">

                    <div class="row form-group">

                        <div class="col-xs-6">

                          <input type="text" class="form-control input-lg" name="nuevoApellidoPT" placeholder="Apellido Paterno(T)">

                        </div>

                        <div class="col-xs-6">

                          <input type="text" class="form-control input-lg" name="nuevoApellidoMT" placeholder="Apellido Materno(T)">
                          
                        </div>

                    </div>

                    <div class="row form-group">

                        <div class="col-xs-7">

                          <input type="text" class="form-control input-lg" name="nuevoNombreT" placeholder="Nombre de Tutor">

                        </div>

                        <div class="col-xs-5">

                          <input type="text" class="form-control input-lg" name="nuevoCiT" placeholder="Carnet Tutor">
                          
                        </div>

                    </div>

                  </div>

                </div>

                <!-- C U A R T O  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">DIRECCION ACTUAL DEL ESTUDIANTE</div>

                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-home"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Direccion de Domicilio" required>

                  </div>
                  
                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-home"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevaPuerta" placeholder="N° de Vivienda" required>

                  </div>

                </div>

                <!-- Q U I N T O  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">DOCUMENTACION DE ADMISION DEL ESTUDIANTE [ <i class="fa fa-eye"></i>   <i class="fa fa-folder-open"></i> ]</div>

                  <div class="input-group form-group">
                  
                    <label for="Name">Libreta Original</label>

                    <select class="form-control input-lg" name="nuevaLibreta" required>
                            
                      <option value="">¿Se recibio la libreta original del ultimo año?</option>

                      <option value="1">Si</option>

                      <option value="0">No</option>

                    </select>

                  </div>
                  
                  <div class="input-group form-group">
                  
                    <label for="Name">Certificado de Nacimiento</label>

                    <select class="form-control input-lg" name="nuevoCertificado" required>
                            
                      <option value="">¿Se recibio el certificado de nacimiento?</option>

                      <option value="1">Si</option>

                      <option value="0">No</option>

                    </select>

                  </div>

                  <div class="input-group form-group">
                  
                    <label for="Name">Certificado de Vacuna (Solo 1° de Primaria)</label>

                    <select class="form-control input-lg" name="nuevaVacuna" required>
                            
                      <option value="">¿Se recibio el certificado de vacuna?</option>

                      <option value="1">Si</option>

                      <option value="0">No</option>

                    </select>

                  </div>

                  <div class="input-group form-group">
                  
                    <label for="Name">Factura para Corovorar</label>

                    <select class="form-control input-lg" name="nuevaFactura">
                            
                      <option value="">¿Se recibio la factura?</option>

                      <option value="1">Si</option>

                      <option value="0">No</option>

                    </select>

                  </div>

                  <div class="input-group form-group">
                  
                    <label for="Name">RUDE</label>

                    <input type="text" class="form-control input-lg" name="nuevoRude" placeholder="Ingrese Codigo de RUDE" required>

                  </div>

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

          <button type="submit" class="btn btn-primary">Realizar Inscripcion</button>

        </div>


        <?php
        
        $crearInscrito = new ControladorInscritos();
        $crearInscrito -> ctrCrearInscrito();

        ?>

      </form>

    </div>

  </div>

</div>