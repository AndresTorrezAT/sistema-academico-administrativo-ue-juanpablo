<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Estadisticas de Asistencia
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  
  <section class="content">

  <?php

    /*=================================================
    OBTENER LISTA DE FECHAS
    =================================================*/

    $bimestre = $_GET["bimestre"];
    $cod_asig = $_GET["idAsignacion"];

    $respuesta = ControladorAsistencia::ctrMostrarFechas($bimestre, $cod_asig);

    /*=================================================
    OBTENER LISTA DE ESTUDIANTES CON EL ID DEL CURSO
    =================================================*/

    $valor = $_GET["idCurso"];
    
    $estudiantes = ControladorInscritos::ctrMostrarListaE($valor); 

    

    foreach ($estudiantes as $key => $value) { 
      
      echo'
      <div class="col-md-3 col-xs-12">

          <div class="box box-default">

              <div class="box-header with-border">

                  <h3 class="box-title">'.($key+1).' - '.$value["ape_paterno"].'  '.$value["ape_materno"].'  '.$value["nombre_usu"].'</h3>

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

                        <li><i class="fa fa-circle-o text-green"></i> PRESENTE</li>

                        <li><i class="fa fa-circle-o text-yellow"></i> ATRASADO</li>

                        <li><i class="fa fa-circle-o text-red"></i> FALTO</li>
                         
                      </ul>
                      
                  </div>
            
              </div>
        
          </div>
            
              

              
      
          </div>

      </div>
      ';
    }

  
  ?>

  </section>
 
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

      $bimestre = $_GET["bimestre"];
      $cod_ins = $value["cod_ins"];
      $cod_asig = $_GET["idAsignacion"];



      $fecha = ControladorAsistencia::ctrMostrarAsistencia($bimestre, $cod_ins, $cod_asig);

      $P=0; $A=0; $F=0; 

        echo"
        {
        value    : 100,
        color    : 'red',
        highlight: 'red',
        label    : 'Femenino Primaria'
        },
        {
        value    : 100,
        color    : 'yellow',
        highlight: 'yellow',
        label    : 'Masculino Primaria'
        },
        {
        value    : 100,
        color    : 'green',
        highlight: 'green',
        label    : 'Femenino Secundaria'
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