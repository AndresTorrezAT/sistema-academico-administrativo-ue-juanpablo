<div>

    <div class="box box-success direct-chat direct-chat-success">

        <div class="box-header with-border">

            <h3 class="box-title">Lista de Todos los Comunicados</h3>

            <div class="box-tools pull-right">

                <!-- <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="3 New Messages">3</span>  -->

                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->

            </div>

        </div>
              
            
        <div class="box-body" >
        
            <div class="direct-chat-messages" id="panel-mensajes">

               <?php

                    $valor = $_SESSION["idUsuario"];

                    $respuesta = ControladorMensajes::ctrMostrarMensajesBuzon($valor);

                    foreach ($respuesta as $key => $value) {

                        switch ($value["tipo_usu"]) {

                            case 1:
                                $tipo = "Direccion";
                                break;

                            case 2:

                                $tipo = "Docente";

                                $item = "cod_usu";

                                $valor = $value["origen"];

                                $Docente =ControladorDocentes::ctrMostrarDocentes($item, $valor);

                                $item = "cod_mat";

                                $valor = $Docente["materia"];

                                $Materia =ControladorMaterias::ctrMostrarMaterias($item, $valor);

                                break;


                            case 3:
                                $tipo = "Estudiante";
                                break;
                            
                        }

                        echo'

                        <div class="direct-chat-msg">
              
                            <div class="direct-chat-info clearfix">';

                            if($value["tipo_usu"] == 1){

                                echo'<span class="direct-chat-name pull-left">'.$value["nombre_usu"].' '.$value["ape_paterno"].' '.$value["ape_materno"].' - '.$tipo.' </span>';

                            }else{

                                echo'<span class="direct-chat-name pull-left">'.$value["nombre_usu"].' '.$value["ape_paterno"].' '.$value["ape_materno"].' - '.$tipo.' ( '.$Materia["nombre_mat"].' ) </span>';

                            }

                            echo'
                                <span class="direct-chat-timestamp pull-right">'.$value["fecha_envio"].'</span>
                            </div>
            
                            <img class="direct-chat-img" src="'.$value["foto_perfil"].'" alt="Message User Image">
                            <div class="direct-chat-text">
                            '.$value["contenido"].'
                            </div>
            
                        </div>
                        '; 
                        
                    }


               ?>
            
            </div>
    
            <div class="direct-chat-contacts">

                <ul class="contacts-list">
                
                    <li>
                        <a href="#">

                            <img class="contacts-list-img" src="vistas/img/usuarios/12345678/944.jpg" alt="User Image">

                            <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Count Dracula
                                    <small class="contacts-list-date pull-right">2/28/2015</small>
                                </span>

                                <span class="contacts-list-msg">How have you been? I was...</span>
                            </div>
        
                        </a>
                    </li>
                
                </ul>
            
            </div>
    
        </div>
      
        <div class="box-footer">
            <form action="#" method="post">
                <div class="input-group">
                <!-- <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat">Send</button>
                    </span>
                </div> -->
            </form>
        </div>
        
    </div>
        
</div>