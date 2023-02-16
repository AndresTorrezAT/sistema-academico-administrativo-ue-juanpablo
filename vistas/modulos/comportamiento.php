<div class="content-wrapper">

    <section class="content-header">
    
    <h1>
        
        Registros Kardex
    
    </h1>

    <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Asistencia - Materia</li>
    
    </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">
               
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                
                <thead>
                
                    <tr>
                    
                    <th style="width:10px">#</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Nombre</th>
                    <th>Foto</th>
                    
                    <th>Acciones</th>

                    </tr> 

                </thead>

                <tbody>
    
                    <?php
                    // CODIGO DEL CURSO ($valor)
                    $valor = $_GET["idCurso"];

                    $estudiantes = ControladorInscritos::ctrMostrarListaE($valor);

                    foreach ($estudiantes as $key => $value) 
                    {
                        if($value["estadoIns"] != 0){

                        echo '<tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["ape_paterno"].'</td>
                                <td>'.$value["ape_materno"].'</td>
                                <td>'.$value["nombre_usu"].'</td>';

                                if($value["foto_perfil"] != ""){

                                    echo '<td><img src="'.$value["foto_perfil"].'" class="img-thumbnail" width="40px"></td>';

                                }
                                else{

                                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';                        

                                }

                            echo '<td>
                                                   
                                    <button class="btn btn-success btnAbrirComportamientoRegistro" idEstudiante="'.$value["cod_est"].'" bimestre="'.$_GET["bimestre"].'" idGestion="'.$_GET["idGestion"].'" idAsignacion="'.$_GET["idAsignacion"].'">ABRIR REGISTRO</button>
             
                                </td>
                            
                            </tr>'; 

                        }

                    }

                    ?>
    
                </tbody> 

                </table>

            </div>
            
        </div>

    </section>

</div>