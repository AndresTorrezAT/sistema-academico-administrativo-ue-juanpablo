
<div class="col-md-8 col-xs-12">

    <div class="box box-maroon">
        
        <div class="box-header with-border">
        
            <h3 class="box-title">Asistencia del dia de HOY - PRIMARIA</h3>
    
        </div>

        <div class="box-body">
            
            <div class=" chart-responsive">
              <div class="chart" id="bar-chart1" style="height: 300px;"></div>
            </div>

        </div>

    </div>

</div>

<script>

    //BAR CHART
    var bar = new Morris.Bar({
    element: 'bar-chart1',
    resize: true,
    data: [ 

        <?php

            $gestion = $_SESSION["gestion"];
            $valor = 1; // PRIMARIA

            $cursos = ControladorCursos::ctrMostrarCursosNivel($valor, $gestion);

            if(!empty($cursos)){

                foreach ($cursos as $key => $value) {

                    date_default_timezone_set('America/La_Paz');
                    $fecha = date('Y-m-d');
                    $bimestre = 1;
                    $idCurso = $value["cod_cur"];
    
                    $respuestaAsistencia = ControladorAsistencia::ctrMostarAsistenciaEspecificaCursoAsignacion($fecha, $bimestre, $idCurso);
    
                    $P=0; $A=0; $F=0;
    
                    foreach ($respuestaAsistencia as $key => $valueFecha) {
    
                        switch ($valueFecha["estado_asis"]) {
    
                            case 'P':
                                $P++;
                                break;
    
                            case 'A':
                                $A++;
                                break;
    
                            case 'F':
                                $F++;
                                break;
                        }       
    
                    }
    
                    $total=$P+$A+$F;
    
                    echo"{y: '".$value["grado"]." ° ".$value["paralelo"]." - Total (".$total.")', a:'".$P."', b: '".$F."' , c: '".$A."'},";
    
                }

            }
            

        ?>
    ],
    barColors: ['#00a65a', '#ffbb33', '#f56954'],
    xkey: 'y',
    ykeys: ['a', 'b' , 'c'],
    labels: ['PRESENTE', 'FALTO', 'ATRASADO'],
    hideHover: 'auto' ,
    gridTextColor: '#00a65a',
    ymax: 25,
    ymin: 0,
    numLines: 6
    });

</script>