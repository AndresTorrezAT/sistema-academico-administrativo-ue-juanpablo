<div class="box box-success">

    <div class="box-header with-border">

      <button class="btn btn-success" data-toggle="modal" data-target="#modalEditarBimestre">
        
        Definir Bimestres

      </button>

      <!-- <button class="btn bg-orange" data-toggle="modal" data-target="#modalAgregarMateria">
        
        INICIAR SIGUIENTE GESTION

      </button> -->

    </div>

    <div class="box-body">

        <div class="row">

            <?php

               $item = "cod_gestion";
               $valor = $_SESSION["gestion"];

               $gestion = ControladorGestion::ctrMostrarGestion($item, $valor);

                $item1 = "cod_gestion";
                $valor1 = $_SESSION["gestion"];

                $item2 = "numeroBi";
                $valor2 = 1;

                $PrimerBimestre= ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);


                $item1 = "cod_gestion";
                $valor1 = $_SESSION["gestion"];

                $item2 = "numeroBi";
                $valor2 = 2;

                $SegundoBimestre= ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);


                $item1 = "cod_gestion";
                $valor1 = $_SESSION["gestion"];

                $item2 = "numeroBi";
                $valor2 = 3;

                $TercerBimestre= ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);

               if($gestion["bimestres"] == 3){
                   
                echo'
                    <!-- ============================================
                    PRIMERA DIVISION
                    ============================================== -->
                    <div class="col-lg-4 col-xs-12">
                    
                        <div class="small-box" style="background-color: #ff5050;">

                            <div class="inner">
                            <h3 style="color:#ffffff";>Primer Bimestre</h3>
                            <p> Inicio:   '.$PrimerBimestre["inicio"].'</p>
                            <p> Fin: '.$PrimerBimestre["fin"].'</p>
                            </div>

                            <div class="icon">
                            <i class="ion ion-calendar"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                        </div>

                    </div>

                    <!-- ============================================
                    SEGUNDA DIVISION
                    ============================================== -->
                    <div class="col-lg-4 col-xs-12">
                    
                        <div class="small-box" style="background-color: #ffd452;"> 

                            <div class="inner">
                            <h3 style="color:#ffffff";>Segundo Bimestre</h3>

                            <p> Inicio: '.$SegundoBimestre["inicio"].'</p>
                            <p> Fin:  '.$SegundoBimestre["fin"].'</p>
                            </div>

                            <div class="icon">
                            <i class="ion ion-calendar"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                            
                        </div>

                    </div>
                
                    <!-- ============================================
                    TERCERA DIVISION
                    ============================================== -->
                    <div class="col-lg-4 col-xs-12">
                    
                        <div class="small-box " style="background-color:#00cc99;">
                            <div class="inner">
                            <h3 style="color:#ffffff";>Tercer Bimestre</h3>
                            <p> Inicio: '.$TercerBimestre["inicio"].'</p>
                            <p> Fin: '.$TercerBimestre["fin"].'</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-calendar"></i>
                            </div>
                            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                        </div>

                    </div>
                
                ';


               }

            ?>
           
        </div>

    </div>

  </div>

<!--=====================================
MODAL EDITAR BIMESTRES
======================================-->

<div id="modalEditarBimestre" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: #605ca8; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">DEFINIR BIMESTRES</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">

            <!--=====================================
            SER
            ======================================-->

            <div class="box box-warning box-solid" style="border-color: #ff6666;">

              <div class="box-header with-border" style="background-color: #ff6666;">

                <h3 class="box-title" style="background-color: #ff6666;">PRIMER BIMESTRE</h3>
               
              </div>
           
              <div class="box-body">

                <input type="hidden" name="numeroBimestres" value="<?php echo $gestion["bimestres"]; ?>"> 

                <?php

                    echo
                      '
                      <div class="form-group">

                      <input type="hidden" name="idBimestre1" value="'.$PrimerBimestre["cod_bimestre"].'">

                      <div class="row">

                        <!-- PESO -->

                        <div class="col-xs-6">

                        <div class="panel">FECHA INICIO</div>

                          <input type="date" class="form-control input-lg" name="inicioBimestre1" placeholder="" value="'.$PrimerBimestre["inicio"].'" required>

                        </div>

                        <!-- TALLA -->
                        <div class="col-xs-6">

                        <div class="panel">FECHA FIN</div>

                          <input type="date" class="form-control input-lg" name="finBimestre1" placeholder="" value="'.$PrimerBimestre["fin"].'" required>

                        </div>
          
                      </div>

                    </div>
                    
                      ';

                               

                ?>

              </div>
              
            </div>

            <!--=====================================
            SABER
            ======================================-->

            <div class="box  box-warning box-solid" style="border-color: #ffcc66;">

              <div class="box-header with-border" style="background-color: #ffcc66;">

                <h3 class="box-title" style="background-color:#ffcc66;">SEGUNDO BIMESTRE</h3>

               
              </div>
           
              <div class="box-body">

                <?php

                      echo
                      '
                      <div class="form-group">

                      <input type="hidden" name="idBimestre2" value="'.$SegundoBimestre["cod_bimestre"].'">

                      <div class="row">

                        <!-- PESO -->

                        <div class="col-xs-6">

                        <div class="panel">FECHA INICIO</div>

                          <input type="date" class="form-control input-lg" name="inicioBimestre2" placeholder="" value="'.$SegundoBimestre["inicio"].'" required>

                        </div>

                        <!-- TALLA -->
                        <div class="col-xs-6">

                        <div class="panel">FECHA FIN</div>

                          <input type="date" class="form-control input-lg" name="finBimestre2" placeholder="" value="'.$SegundoBimestre["fin"].'" required>

                        </div>
          
                      </div>

                    </div>
                    
                      ';

                                  

                  ?>

                
                
              </div>
              
            </div>

            <!--=====================================
            HACER
            ======================================-->

            <div class="box box-info box-solid" style="border-color: #00cc99;">

              <div class="box-header with-border" style="background-color: #00cc99;">

                <h3 class="box-title" style="background-color: #00cc99;">TERCER BIMESTRE</h3>

               
              </div>
           
              <div class="box-body">

                  <?php

                    echo
                    '
                    <div class="form-group">

                    <input type="hidden" name="idBimestre3" value="'.$TercerBimestre["cod_bimestre"].'">

                    <div class="row">

                      <!-- PESO -->

                      <div class="col-xs-6">

                      <div class="panel">FECHA INICIO</div>

                        <input type="date" class="form-control input-lg" name="inicioBimestre3" placeholder="" value="'.$TercerBimestre["inicio"].'" required>

                      </div>

                      <!-- TALLA -->
                      <div class="col-xs-6">

                      <div class="panel">FECHA FIN</div>

                        <input type="date" class="form-control input-lg" name="finBimestre3" placeholder="" value="'.$TercerBimestre["fin"].'" required>

                      </div>
        
                    </div>

                  </div>
                  
                    ';

                                  

                  ?>

                

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

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

        <?php

          $editarBimestre = new ControladorGestion();
          $editarBimestre -> ctrEditarBimestre();

        ?> 


      </form>

    </div>

  </div>

</div>



 