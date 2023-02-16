<div class="row">

    <!-- TODO: PRIMERA DIVISION -->

  <div class="col-md-3">

    <div class="row">

      <div class="col-md-4">

        <a class="btn btn-success btn-block margin-bottom btnTipoContactoDocente msjP " style="text-align:center;" tipo = "p" idGestion="<?php echo $_SESSION["gestion"]; ?>" idDocente="<?php echo $_SESSION["idDocente"];?>">DIRECCIÓN</a>

      </div>

      <div class="col-md-4">
 
        <a class="btn btn-default btn-block margin-bottom btnTipoContactoDocente msjC"  style="text-align:center;" tipo = "c" idGestion="<?php echo $_SESSION["gestion"]; ?>" idDocente="<?php echo $_SESSION["idDocente"]; ?>">CURSOS</a>

      </div>

      <div class="col-md-4">

        <a class="btn btn-default btn-block margin-bottom btnTipoContactoDocente msjE"   style="text-align:center;" tipo = "e" idGestion="<?php echo $_SESSION["gestion"]; ?>" idDocente="<?php echo $_SESSION["idDocente"]; ?>">ALUMNOS</a>

      </div>

    </div>

    <div id="panelBaseContactos1">

      <div class="box box-success box-solid">

        <div class="box-header with-border">

          <h3 class="box-title">Administrativos</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" ><i class="fa fa-comments"></i></button>
          </div>
          
        </div>

        <div class="box-body no-padding">

          <ul class="nav nav-pills nav-stacked">

            <?php

              $item = "tipo_usu";

              $valor = 1;

              $administrativos = ControladorUsuarios::ctrMostrarUsuariosE($item, $valor);

              $item = "cod_usu";

              foreach ($administrativos as $key => $value) {

                if($value["cod_usu"] != $_SESSION["idUsuario"]){

                    $valor = $value["cod_usu"];
              
                    $cargo = ControladorAdministrativos::ctrMostrarAdministrativos($item, $valor);

                    echo'<li ><a href="#" class="btnChat" idUsuario = "'.$value["cod_usu"].'"  titulo="'.$value["nombre_usu"].' '.$value["ape_paterno"].' '.$value["ape_materno"].'" descripcion="'.$cargo["cargo"].'" foto="'.$value["foto_perfil"].'" idGestion="'.$_SESSION["gestion"].'" color ="success"><i class="fa fa-user"></i> '.$cargo["cargo"].' - '.$value["nombre_usu"].' '.$value["ape_paterno"].' '.$value["ape_materno"].'</a></li>';

                }

                

              }

            ?>
            
          </ul>

        </div>

      </div>

    </div>

    <div id="panelBaseContactos2">

    </div>

  </div>
    
    <!-- TODO: SEGUNDA DIVISION -->

  <div class="col-md-9" id="CambioBandejaMensaje" > 

    
    
  </div>
    
</div>