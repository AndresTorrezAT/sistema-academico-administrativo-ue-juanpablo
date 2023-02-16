<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      

      <?php 

      	$item = "cod_gestion";
				$valor = $_SESSION["gestion"];

				$gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

        echo 'Tablero  - Gestion : '.$gestion["gestion"];
      ?>
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  
  <section class="content">
      
    <!-- MENU ESTUDIANTES -->
    
    <?php

      if($_SESSION["tipo"] == 3){

        include "inicio/estudiante-opciones.php";

      }

    ?>

    <!-- MENU ADMINISTRATIVOS -->
    
    <?php

      if($_SESSION["tipo"] == 1){

        include "inicio/administrativo-bimestre.php";

        echo'<div class="row">';
        
        include "inicio/administrativo-estadistica.php";

        include "inicio/administrativo-estadistica-barras-primaria.php";

        include "inicio/administrativo-estadistica-barras-secundaria.php";


        echo'</div>';
      }

    ?>

    <!-- MENU DOCENTE -->
    
    <?php

      if($_SESSION["tipo"] == 2){

        include "inicio/docente-opciones.php";

      }

    ?>
    

      
  </section>
 
</div>



