<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Mensajes y Comunicados
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Mensajes</li>
  
  </ol>

</section>

<section class="content">

  <?php

    if($_SESSION["tipo"] == 1){

      include "mensaje/administrativos-mensaje.php";

    }

    if($_SESSION["tipo"] == 2){

      include "mensaje/docentes-mensaje.php";

    }

    if($_SESSION["tipo"] == 3 ){

      include "mensaje/estudiante-mensaje.php";

    }


  ?>
 
</section>

</div>







<!--=====================================
MODAL ESTUDIANTES
======================================-->

<div id="modalEstudiantes" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#ff6666; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Lista de Estudiantes</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" id="modalBodyEstudiante">

          



      

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
