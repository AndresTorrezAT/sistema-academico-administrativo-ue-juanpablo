<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Administrar Curso
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Curso</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCurso">
        
        Agregar Curso

      </button>

    </div>

    <div class="box-body">
      
     <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
       
      <thead>
       
       <tr>
         
         <th>Grado</th>
         <th>Nivel</th>
         <th>Paralelo</th>
         <th>Cupos</th>
         <th>Estado</th>
         <th>Gestion</th>
         <th>Acciones</th>

       </tr> 

      </thead>

      <tbody>

        <?php

        $item = null;
        $valor = null;

        $cursos = ControladorCursos::ctrMostrarCursos($item, $valor);

        //var_dump($cursos); // SIRVE PARA MOSTRAR LAS VARIABLES 

        foreach ($cursos as $key => $value) {
          
          echo'<tr>
                <td><button class="btn btn-primary">'.$value["grado"].'</button></td>';

                if($value["nivel"] == 1){

                  echo '<td style="background-color : #ffcccc">PRIMARIA</td>'; 

                }else{

                  echo '<td style="background-color : #66ccff">SECUNDARIA</td>'; 

                }

                echo '<td>'.$value["paralelo"].'</td>
                <td>'.$value["cupos"].'</td>
                <td><button class="btn btn-success">15</button></td>
                <td>'.$value["gestion_cur"].'</td>

                <td>

                  <div class="btn-group">
                      
                    <button class="btn btn-warning btnEditarCurso" idCurso="'.$value["cod_cur"].'" data-toggle="modal" data-target="#modalEditarCurso"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarCurso" idCurso="'.$value["cod_cur"].'"><i class="fa fa-times"></i></button>

                    <button class="btn btn-success btnAsignar" idCurso="'.$value["cod_cur"].'" nivelCurso="'.$value["nivel"].'" data-toggle="modal" data-target="#modalAgregarMat-Doc">M</button> 

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
