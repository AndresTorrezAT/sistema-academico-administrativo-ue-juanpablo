<?php

require_once "../../../controladores/inscritos.controlador.php";
require_once "../../../modelos/inscripciones.modelo.php";

require_once "../../../controladores/estudiantes.controlador.php";
require_once "../../../modelos/estudiante.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/cursos.controlador.php";
require_once "../../../modelos/cursos.modelo.php";

require_once "../../../controladores/asignaciones.controlador.php";
require_once "../../../modelos/asignaciones.modelo.php";

require_once "../../../controladores/asignaciones.controlador.php";
require_once "../../../modelos/asignaciones.modelo.php";

require_once "../../../controladores/materias.controlador.php";
require_once "../../../modelos/materias.modelo.php";

require_once "../../../controladores/calificaciones.controlador.php";
require_once "../../../modelos/calificaciones.modelo.php";

require_once "../../../controladores/gestion.controlador.php";
require_once "../../../modelos/gestion.modelo.php";


class ImprimirBoletin{

public $inscrito;

public function traerImpresionBoletin(){

//TRAEMOS LA INFORMACIÓN DE (CURSO, INSCRITO Y BIMESTRE)
$valorInscrito = $this->Idinscrito;
$valorCurso = $this->Idcurso;
$idBimestre = $this->bimestre;
//GESTION
// date_default_timezone_set('America/La_Paz');
// $gestion = date('Y');
$gestion = null;
//TRAEMOS LA INFORMACION DEL INSCRITO
$itemInscrito = "cod_ins";

$respuestaInscrito = ControladorInscritos::ctrMostrarInscritos($itemInscrito, $valorInscrito , $gestion);

//TRAEMOS LA INFORMACION DEL ESTUDIANTE

$itemEstudiante = "cod_est";
$valorEstudiante = $respuestaInscrito["cod_est"];

$respuestaEstudiante = ControladorEstudiantes::ctrMostrarEstudiantes($itemEstudiante, $valorEstudiante);

$itemUsuario = "cod_usu";
$valorUsuario = $respuestaEstudiante["cod_usu"];

$respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

//TRAEMOS LA INFORMACION DEL CURSO
$itemCurso = "cod_cur";

$codigoGestion = null;

$respuestaCurso = ControladorCursos::ctrMostrarCursos($itemCurso, $valorCurso, $codigoGestion);

$item1 = "cod_gestion";
$valor1 = $respuestaCurso["cod_gestion"];

$item2 = "cod_bimestre";
$valor2 = $idBimestre;

$respuestaBimestre = ControladorGestion::ctrMostrarBimestre($item1, $valor1, $item2, $valor2);


if ($respuestaCurso["nivel"] == 1) {
	
	$nivel = "Primaria";

}else {

	$nivel = "Secundaria";
}


require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPAgeGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

	<table>
			
		<tr>
			
			<td style="width:150px"><img src="images/logo-blanco-bloque.png"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Codigo Inscrito: $valorInscrito

					<br>
					Dirección: Zona Sur , Alto Seguencoma, Av. del Policia

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 2 222 2222
					
					<br>
					www.unidadeducativa.com

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>BIMESTRE<br>$respuestaBimestre[numeroBi]</td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
			
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>	

	<table>
		
		<tr>
			<td style="width:140px"></td>
			<td style="width:400px"><h1>BOLETIN DE CALIFICACIONES</h1></td>
			
		
		</tr>

	</table>

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Nombre de Estudiante: $respuestaUsuario[ape_paterno] $respuestaUsuario[ape_materno] $respuestaUsuario[nombre_usu]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">
			
				Gestion:  $respuestaCurso[gestion]

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Curso: $respuestaCurso[grado] ° $respuestaCurso[paralelo] de $nivel </td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px"> $respuestaBimestre[numeroBi] ° BIMESTRE</td>

		</tr>

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:35px; text-align:center">N°</td>
		<td style="border: 1px solid #666; background-color:white; width:105px; text-align:center">Curricula</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Ser</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Saber</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Hacer</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Decidir</td>
		<td style="border: 1px solid #666; background-color:white; width:80capx; text-align:center">Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

$itemAsignacion = "cod_cur";

$valorAsignacion = $valorCurso;


$respuestaAsignacion = ControladorAsignacion::ctrMostrarAsignacionesEspecificas($itemAsignacion, $valorAsignacion);

foreach ($respuestaAsignacion as $key => $item) {

$n=$key+1;

$itemMateria = "cod_mat";
$valorMateria = $item["cod_mat"];
$respuestaMateria = ControladorMaterias::ctrMostrarMaterias($itemMateria, $valorMateria);



$valorAsignacion = $item["cod_asig"];

$respuestaCalificaciones = ControladorCalificaciones::ctrCalificacionesGeneralesBimestrales($valorAsignacion, $valorInscrito, $idBimestre);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:35px; text-align:center">
				$n
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:105px; text-align:center">
				$respuestaMateria[nombre_mat]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center"> 
				$respuestaCalificaciones[ser]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center"> 
				$respuestaCalificaciones[saber]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
				$respuestaCalificaciones[hacer]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
				$respuestaCalificaciones[decidir]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
				$respuestaCalificaciones[nota_bi]
			</td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}
	
// ---------------------------------------------------------


$pdf->Output('boletin.pdf');

}

}

$boletin = new imprimirBoletin();
$boletin -> Idinscrito = $_GET["inscrito"];
$boletin -> Idcurso = $_GET["curso"];
$boletin -> bimestre = $_GET["bimestre"];
$boletin -> traerImpresionBoletin();

?>