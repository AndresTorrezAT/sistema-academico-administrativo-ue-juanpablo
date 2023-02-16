

    <div class="col-md-4 col-xs-12">

        <div class="box box-success">

            <div class="box-header with-border">

                <h3 class="box-title">Inscritos Segun Genero y Nivel - GESTION <?php echo $_SESSION["gestion"];?></h3>

            </div>
          
            <div class="box-body">

                <div class="row">

                    <div class="col-md-7">

                        <div class="chart-responsive">

                            <canvas id="pieChart" height="150"></canvas>

                        </div>

                    </div>
                 
                    <div class="col-md-5">

                        <ul class="chart-legend clearfix">

                            <li ><i class="fa fa-circle-o" style="color:#ff99ff"></i> Femenino Primaria</li>
                            <li><i class="fa fa-circle-o" style="color:#99ccff"></i> Masculino Primaria</li>
                            <li><i class="fa fa-circle-o" style="color:#cc66ff"></i> Femenino Secundaria</li>
                            <li><i class="fa fa-circle-o" style="color:#3366ff"></i> Masculino Secundaria</li>
                    

                        </ul>
                        
                    </div>
              
                </div>
          
            </div>
        
            <div class="box-footer no-padding">

                <ul class="nav nav-pills nav-stacked">

                    <?php

                        $gestion = $_SESSION["gestion"];

                        $respuestaTotal = ControladorInscritos::ctrMostrarSumaInscritos($gestion);
                        
                        if($respuestaTotal["total"] != 0){

                            // $estadoIns = 1;

                            // for ($i=1; $i <= 4 ; $i++) { 
                                
                            //     switch ($i) {

                            //         case 1:
                            //             $genero  = 0;
                            //             $nivel = 1;
                            //             $item = "Femenino Primaria";
                            //             break;
                            //         case 2:
                            //             $genero  = 1;
                            //             $nivel = 1;
                            //             $item = "Masculino Primaria";
                            //             break;
                            //         case 3:
                            //             $genero  = 0;
                            //             $nivel = 2;
                            //             $item = "Femenino Secundaria";
                            //             break;
                            //         case 4:
                            //             $genero  = 1;
                            //             $nivel = 2;
                            //             $item = "Masculino Secundaria";
                            //             break;
                            //     }

                            //     $respuestaGenero = ControladorInscritos::ctrMostrarSumaInscritosGeneroNivel($estadoIns, $genero, $nivel, $gestion);

                            //     echo'
                            //     <li>
                            //         <a href="#"> '.$item.'
                            //             <span class="pull-right" style="color:#ff99ff"><i class="fa fa-angle-down"></i> '.$respuestaGenero["total"]*100/$respuestaTotal["total"].' %</span>
                            //         </a>
                            //     </li>
                            //     ';
                            // }

                            $estadoIns = 1;
                            $genero  = 0;
                            $nivel = 1;

                            $respuestaFP = ControladorInscritos::ctrMostrarSumaInscritosGeneroNivel($estadoIns, $genero, $nivel, $gestion);

                            $respuesta = round($respuestaFP["total"]*100/$respuestaTotal["total"]);

                            echo'
                            <li>
                                <a href="#"> Femenino Primaria
                                    <span class="pull-right" style="color:#ff99ff"><i class="fa fa-angle-down"></i> '.$respuesta.' %</span>
                                </a>
                            </li>
                            ';

                            $estadoIns = 1;
                            $genero  = 1;
                            $nivel = 1;

                            $respuestaMP = ControladorInscritos::ctrMostrarSumaInscritosGeneroNivel($estadoIns, $genero, $nivel, $gestion);

                            $respuesta = round($respuestaMP["total"]*100/$respuestaTotal["total"]);

                            echo'
                            <li>
                                <a href="#"> Masculino Primaria
                                    <span class="pull-right " style="color:#99ccff"><i class="fa fa-angle-down"></i> '.$respuesta.' %</span>
                                </a>
                            </li>
                            ';

                            $estadoIns = 1;
                            $genero  = 0;
                            $nivel = 2;

                            $respuestaFS = ControladorInscritos::ctrMostrarSumaInscritosGeneroNivel($estadoIns, $genero, $nivel, $gestion);

                            $respuesta = round($respuestaFS["total"]*100/$respuestaTotal["total"]);


                            echo'
                            <li>
                                <a href="#"> Femenino Secundaria
                                    <span class="pull-right " style="color:#cc66ff"><i class="fa fa-angle-down"></i> '.$respuesta.' %</span>
                                </a>
                            </li>
                            ';

                            $estadoIns = 1;
                            $genero  = 1;
                            $nivel = 2;

                            $respuestaMS = ControladorInscritos::ctrMostrarSumaInscritosGeneroNivel($estadoIns, $genero, $nivel, $gestion);

                            $respuesta = round($respuestaMS["total"]*100/$respuestaTotal["total"]);

                            echo'
                            <li>
                                <a href="#"> Masculino Secundaria
                                    <span class="pull-right " style="color:#3366ff"><i class="fa fa-angle-down"></i> '.$respuesta.' %</span>
                                </a>
                            </li>
                            ';

                        }
                        

                    ?>
                    
                </ul>

            </div>
     
        </div>

    </div>

    



<script>

    // -------------
    // - PIE CHART -
    // -------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieChart       = new Chart(pieChartCanvas);
    var PieData        = [

        <?php

            echo"
            {
            value    : ".$respuestaFP["total"].",
            color    : '#ff99ff',
            highlight: '#999999',
            label    : 'Femenino Primaria'
            },
            {
            value    : ".$respuestaMP["total"].",
            color    : '#99ccff',
            highlight: '#999999',
            label    : 'Masculino Primaria'
            },
            {
            value    : ".$respuestaFS["total"].",
            color    : '#cc66ff',
            highlight: '#999999',
            label    : 'Femenino Secundaria'
            },
            {
            value    : ".$respuestaMS["total"].",
            color    : '#3366ff',
            highlight: '#999999',
            label    : 'Masculino Secundaria'
            },
            ";


        ?>
        
    ];
    var pieOptions     = {
        // Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        // String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        // Number - The width of each segment stroke
        segmentStrokeWidth   : 1,
        // Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        // Number - Amount of animation steps
        animationSteps       : 100,
        // String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        // Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        // Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        // Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : false,
        // String - A legend template
        legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
        // String - A tooltip template
        tooltipTemplate      : '<%=value %> <%=label%> '
    };
    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
    // -----------------
    // - END PIE CHART -
    // -----------------

</script>