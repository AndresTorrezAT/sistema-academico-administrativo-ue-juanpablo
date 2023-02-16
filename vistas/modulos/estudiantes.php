<div class="content-wrapper">

  <section class="content-header">
    
    <h1>

      <?php 

      	$item = "cod_gestion";
				$valor = $_SESSION["gestion"];

				$gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

        echo 'Listas de Estudiantes - Gestion : '.$gestion["gestion"];
      ?>
      
      
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Estudiantes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <div class="col-lg-6">

        <?php    

        $gestion = $_SESSION["gestion"];

        $valor = 1;

        $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

        //var_dump($cursos); // SIRVE PARA MOSTRAR LAS VARIABLES 

        foreach ($cursos as $key => $value) 
        { 

          $idCurso = $value["cod_cur"];

        echo'<div class="box box-solid box-maroon">

              <div class="box-header with-border">

                <h3 class="box-title"> Curso: '.$value["grado"].'º de Primaria ('.$value["paralelo"].')</h3>
          
              </div>

              <div class="box-body with-border">

            

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
                        if($value["estadoIns"] != 0){

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

                            echo '<td>
                                  
                                    <div class="btn-group">
                                                    
                                      <button class="btn btn-success btnInformacionInscrito" idInscrito="'.$value["cod_ins"].'" data-toggle="modal" data-target="#modalInfoInscrito"><i class="fa fa-info"></i></button>
                        
                                      <button class="btn  bg-purple btnRegistroEstudiantilCalificaciones" idEstudiante="'.$value["cod_est"].'" idGestion="'.$gestion.'"><i class="fa fa-file"></i></button>
                        
                                      <button class="btn bg-teal btnRegistroEstudiantilAsistencia" data-toggle="modal" data-target="#modalAsistenciaEstudiante" idInscrito="'.$value["cod_ins"].'" idCurso="'.$idCurso.'"><i class="fa fa-pencil-square-o"></i></button>
                        
                                      <button class="btn bg-navy-active btnRegistroEstudiantilKardex" data-toggle="modal" data-target="#modalComportamientoEstudiante" idEstudiante="'.$value["cod_est"].'" idGestion="'.$gestion.'" ><i class="fa fa-child"></i></button>
                                                                        
                                    </div>
                                  
                                  </td>
                              
                                </tr>'; 

                        }

                    }

      ?>
      <?php
            echo '</tbody> 

                </table>

              </div>

            </div>';
      
        }
      ?>
      
      </div>

      <div class="col-lg-6">

      <?php    

        $gestion = $_SESSION["gestion"];

        $valor = 2;

        $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

        //var_dump($cursos); // SIRVE PARA MOSTRAR LAS VARIABLES 

        foreach ($cursos as $key => $value) 
        {

          $idCurso = $value["cod_cur"];

        echo'<div class="box box-solid box-primary">

              <div class="box-header with-border">

                <h3 class="box-title"> Curso: '.$value["grado"].'º de Secundaria ('.$value["paralelo"].')</h3>
          
              </div>

              <div class="box-body with-border">

            

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
                        if($value["estadoIns"] != 0){

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

                            echo '<td>
                                      <div class="btn-group">
                                                              
                                        <button class="btn btn-success btnInformacionInscrito" idInscrito="'.$value["cod_ins"].'" data-toggle="modal" data-target="#modalInfoInscrito"><i class="fa fa-info"></i></button>
                          
                                        <button class="btn  bg-purple btnRegistroEstudiantilCalificaciones" idEstudiante="'.$value["cod_est"].'" idGestion="'.$gestion.'"><i class="fa fa-file"></i></button>
                          
                                        <button class="btn bg-teal btnRegistroEstudiantilAsistencia" data-toggle="modal" data-target="#modalAsistenciaEstudiante" idInscrito="'.$value["cod_ins"].'" idCurso="'.$idCurso.'"><i class="fa fa-pencil-square-o"></i></button>
                          
                                        <button class="btn bg-navy-active btnRegistroEstudiantilKardex" data-toggle="modal" data-target="#modalComportamientoEstudiante" idEstudiante="'.$value["cod_est"].'" idGestion="'.$gestion.'" ><i class="fa fa-child"></i></button>
                                                                          
                                      </div>
                                  </td>
                              
                                </tr>'; 

                        }

                    }

      ?>
      <?php
            echo '</tbody> 

                </table>

              </div>

            </div>';
      
        }
      ?>
      
      </div>
    
    </div>

  <!-- <?php    

    $gestion = $_SESSION["gestion"];

    $item = null;

    $valor = null;

    $cursos = ControladorCursos::ctrMostrarCursos($item, $valor, $gestion);

    //var_dump($cursos); // SIRVE PARA MOSTRAR LAS VARIABLES 

    foreach ($cursos as $key => $value) 
    {

      if($value["nivel"] == 1) {

        $color="maroon";

        $nivel ="Primaria";
        
      }else{

        $color="primary";

        $nivel ="Secundaria";

      }

    echo'<div class="box box-solid box-'.$color.'">

          <div class="box-header with-border">

            <h3 class="box-title"> Curso: '.$value["grado"].'º de '.$nivel.' ('.$value["paralelo"].')</h3>
       
          </div>

          <div class="box-body with-border">

         

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
                    if($value["estadoIns"] != 0){

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

                        echo '<td>
                              
                                <div class="btn-group">
                                                
                                  <button class="btn btn-warning btnAgregarNota" idEstudiante="'.$value["cod_est"].'" data-toggle="modal" data-target="#modalAgregarNota"><i class="fa fa-pencil"></i></button>
                    
                                  <button class="btn btn-success btnEliminarUsuario" idUsuario="'.$value["cod_usu"].'" ><i class="fa fa-file"></i></button>
                    
                                  <button class="btn btn-success btnEliminarUsuario" idUsuario="'.$value["cod_usu"].'" ><i class="fa fa-pencil-square-o"></i></button>
                    
                                  <button class="btn btn-success btnEliminarUsuario" idUsuario="'.$value["cod_usu"].'" ><i class="fa fa-child"></i></button>
                                                                    
                                </div>
                              
                              </td>
                          
                            </tr>'; 

                    }

                }

  ?>
  <?php
        echo '</tbody> 

            </table>

          </div>

        </div>';
  
    }
  ?> -->
  
    
    

  </section>

</div>



<!--=====================================
MODAL BiMESTRE ASISTENCIA
======================================-->

<div id="modalAsistenciaEstudiante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Selecionar Bimestre</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Bimestre -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="hidden" id="idInscritoRegistroEstudiantilAsistencia">

                <input type="hidden" id="idCursoRegistroEstudiantilAsistencia">

                <select class="form-control input-lg" id="BimestreAsistenciaEstudiante">  <!-- ENTRADA PARA EL BIMESTRE --> 

                  <?php

                    $item1 = null;
                    $valor1 = null;
                    $item2 = "cod_gestion";
                    $valor2 = $gestion;

                    $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                    foreach ($bimestre as $key => $value) {

                      switch ($value["numeroBi"]) {
                        case 1:
                          $numero ="Primer";
                          break;

                        case 2:
                          $numero ="Segundo";
                          break;
                          
                        case 3:
                          $numero ="Tercer";
                          break;

                        case 4:
                          $numero ="Cuarto";
                          break;
                      
                      }
                      echo'<option value="'.$value["cod_bimestre"].'">'.$numero.' Bimestre </option>';
                    }

                  ?>


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

          <button type="button" class="btn btn-primary btnAsistenciaEst" >Ingresar</button>

        </div>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL BiMESTRE KARDEX
======================================-->

<div id="modalComportamientoEstudiante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content"> 
      
      <!-- INICIO DE FORMULARIO -->

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Selecionar Bimestre</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Bimestre -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="hidden" id="idEstudianteRegistroEstudiantilKardex">

                <input type="hidden" id="idCursoRegistroEstudiantilKardex">

                
                <select class="form-control input-lg" id="BimestreComportamientoEstudiante">  <!-- ENTRADA PARA EL BIMESTRE -->

                  <?php

                    $item1 = null;
                    $valor1 = null;
                    $item2 = "cod_gestion";
                    $valor2 = $gestion;

                    $bimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

                    foreach ($bimestre as $key => $value) {

                      switch ($value["numeroBi"]) {
                        case 1:
                          $numero ="Primer";
                          break;

                        case 2:
                          $numero ="Segundo";
                          break;
                          
                        case 3:
                          $numero ="Tercer";
                          break;

                        case 4:
                          $numero ="Cuarto";
                          break;
                      
                      }
                      echo'<option value="'.$value["cod_bimestre"].'">'.$numero.' Bimestre </option>';
                    }

                  ?>


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

          <button type="button" class="btn btn-primary btnComportamientoEst" >Ingresar</button>

        </div>

      </form>

    </div>

  </div>

</div>




<!--=====================================
INFORMACION DEL ESTUDIANTE
======================================-->

<div id="modalInfoInscrito" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">INFORMACION DEL ESTUDIANTE</h4>

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

                <div class="form-group" >

                  <img class="img-responsive pad center-block" width="150px" style="float: center; border: black 2px solid;" src="" id="fotoEstudiante" alt="User Avatar">
                  
                </div>

                <div class="form-group">

                  <div class="panel">DATOS PERSONALES DEL ESTUDIANTE</div>

                    <!-- ENTRADA PARA EL APELLIDO PATERNO -->

                    <label for="Name">Apellido Paterno</label>
                    
                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" id="paternoEstudiante" readonly>

                      </div>

                    </div>

                    <!-- ENTRADA PARA EL APELLIDO MATERNO -->

                    <label for="Name">Apellido Materno</label>
                    
                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" id="maternoEstudiante" readonly>

                      </div>

                    </div>


                    <!-- ENTRADA PARA EL NOMBRE -->

                    <label for="Name">Nombres</label>

                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa  fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" id="nombreEstudiante"  readonly>

                      </div>

                    </div>

                    <!-- ENTRADA PARA EL CI-->

                    <label for="Name">Numero de Carnet</label>

                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa  fa-user"></i></span> 

                        <input type="text" class="form-control input-lg" id="carnetEstudiante" readonly>

                      </div>

                    </div>

                    <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                    <div class="panel">FECHA DE NACIMIENTO</div>

                    <div class="form-group">
                      
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                        <input type="date" class="form-control input-lg" id="fechaNacimientoEstudiante" readonly>

                      </div>

                    </div>

                    <!--******* DIVISION DE DIVISION (GENERO, PESO, TALLA)-->

                    <div class="panel"> GENERO  -  PESO  -  TALLA</div>

                    <div class="form-group">

                      <div class="row">

                        <!-- GENERO -->

                        <div class="col-xs-4">

                          <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                            <input type="text" class="form-control input-lg" id="generoEstudiante" readonly>
                            

                          </div>

                        </div>

                        <!-- PESO -->

                        <div class="col-xs-4">

                          <div class="input-group">
                        
                            <input type="text" class="form-control input-lg" id="pesoEstudiante" readonly>
                            <span class="input-group-addon">Kg</span>

                          </div>

                        </div>

                        <!-- TALLA -->
                        <div class="col-xs-4">
                        
                          <div class="input-group">

                            <input type="text" class="form-control input-lg" id="tallaEstudiante" readonly>
                            <span class="input-group-addon">Mts</span>

                          </div>

                        </div>
          
                      </div>

                    </div>

                </div>

                <!-- S E G U N D O  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">DATOS DE USUARIO (PLATAFORMA ESTUDIANTIL)</div>

                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                    <input type="text" class="form-control input-lg"id="usuarioEstudiante" readonly>

                  </div>
                  
                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                    <input type="password" class="form-control input-lg"  readonly>

                  </div>

                </div>

                <!-- T E R C E R   T I T U L O  -->

                <div class="form-group">

                  <div class="panel">GESTION Y CURSO A INSCRIBIR</div>

                  <label for="Name">Inscrito a Gestion</label>
                  
                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span> 

                    <input type="text" class="form-control input-lg" id="gestionInscritoEstudiante"readonly>

                  </div>

                  <label for="Name">Inscrito Actualmente</label>

                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa  fa-graduation-cap"></i></span> 

                    <input type="text" class="form-control input-lg" id="cursoInscritoEstudiante"readonly>

                  </div>

                </div>

                <!-- C U A R T O  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">TELEFONO FIJO Y CELULAR DE CONTACTO</div>

                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                    <input type="text" class="form-control input-lg" id="telefonoEstudiante" data-inputmask="'mask':'(999) 999-9999'" data-mask readonly> 

                  </div>
                  
                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                    <input type="text" class="form-control input-lg" id="celularEstudiante"data-inputmask="'mask':'(999) 999-9999'" data-mask readonly>        

                  </div>

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

                          <label for="Name">Apellido Paterno</label>

                          <input type="text" class="form-control input-lg"  id="paternoPadreEstudiante"readonly>

                        </div>

                        <div class="col-xs-6">

                          <label for="Name">Apellido Materno</label>
                       
                          <input type="text" class="form-control input-lg" id="maternoPadreEstudiante" readonly>
                        
                        </div>

                    </div>

                    <div class="row form-group">

                        <div class="col-xs-7">

                          <label for="Name">Nombre</label>

                          <input type="text" class="form-control input-lg"  id="nombrePadreEstudiante" readonly>

                        </div>

                        <div class="col-xs-5">

                          <label for="Name">Carnet</label>
                       
                          <input type="text" class="form-control input-lg" id="carnetPadreEstudiante" readonly>
                        
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

                          <label for="Name">Apellido Paterno</label>

                          <input type="text" class="form-control input-lg" id="paternoMadreEstudiante" readonly>

                        </div>

                        <div class="col-xs-6">

                          <label for="Name">Apellido Materno</label>

                          <input type="text" class="form-control input-lg" id="maternoMadreEstudiante" readonly>

                        </div>

                    </div>

                    <div class="row form-group">

                        <div class="col-xs-7">

                          <label for="Name">Nombre</label>

                          <input type="text" class="form-control input-lg"  id="nombreMadreEstudiante" readonly>

                        </div>

                        <div class="col-xs-5">

                          <label for="Name">Carnet</label>

                          <input type="text" class="form-control input-lg"  id="carnetMadreEstudiante" readonly>

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

                          <label for="Name">Apellido Paterno</label>

                          <input type="text" class="form-control input-lg" id="paternoTutorEstudiante" readonly>

                        </div>

                        <div class="col-xs-6">

                          <label for="Name">Apellido Materno</label>

                          <input type="text" class="form-control input-lg" id="maternoTutorEstudiante" readonly>
                          
                        </div>

                    </div>

                    <div class="row form-group">

                        <div class="col-xs-7">

                          <label for="Name">Nombre</label>

                          <input type="text" class="form-control input-lg"  id="carnetTutorEstudiante" readonly>

                        </div>

                        <div class="col-xs-5">

                          <label for="Name">Carnet</label>

                          <input type="text" class="form-control input-lg"  id="carnetTutorEstudiante" readonly>
                          
                        </div>

                    </div>

                  </div>

                </div>

                <!-- C U A R T O  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">DIRECCION ACTUAL DEL ESTUDIANTE</div>

                  <label for="Name">Direccion</label>

                  <div class="input-group form-group">

                    
                  
                    <span class="input-group-addon"><i class="fa fa-home"></i></span> 

                    <input type="text" class="form-control input-lg" id="direccionEstudiante" readonly>

                  </div>

                  <label for="Name">N° Puerta</label>
                  
                  <div class="input-group form-group">
                  
                    <span class="input-group-addon"><i class="fa fa-home"></i></span> 

                    <input type="text" class="form-control input-lg" id="puertaEstudiante" readonly>

                  </div>

                </div>

                <!-- Q U I N T O  T I T U L O  -->

                <div class="form-group">

                  <div class="panel">DOCUMENTACION DE ADMISION DEL ESTUDIANTE [ <i class="fa fa-eye"></i>   <i class="fa fa-folder-open"></i> ]</div>

                  <div class="input-group form-group">
                  
                    <label for="Name">Libreta Original</label>

                    <input type="text" class="form-control input-lg" id="libretaEstudiante" readonly>

                  </div>
                  
                  <div class="input-group form-group">
                  
                    <label for="Name">Certificado de Nacimiento</label>

                    <input type="text" class="form-control input-lg" id="certificadoNacimientoEstudiante"  readonly>

                  </div>

                  <div class="input-group form-group">
                  
                    <label for="Name">Certificado de Vacuna (Solo 1° de Primaria)</label>

                    <input type="text" class="form-control input-lg" id="certificadoVacunaEstudiante" readonly>

                  </div>

                  <div class="input-group form-group">
                  
                    <label for="Name">Factura para Corovorar</label>

                    <input type="text" class="form-control input-lg" id="facturaEstudiante" readonly>

                  </div>

                  <div class="input-group form-group">
                  
                    <label for="Name">RUDE</label>

                    <input type="text" style="background-color : #ccff66"; class="form-control input-lg" id="rudeEstudiante" readonly>

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



        </div>

      </form>

    </div>

  </div>

</div>