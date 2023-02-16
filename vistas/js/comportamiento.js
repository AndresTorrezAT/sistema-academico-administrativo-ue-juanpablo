/*===================================
BOTON -> LISTA DE ESTUDIANTES
===================================*/

$(".btnComportamientoRegistro").click(function(){

	var bimestre = $("#BimestreComportamiento").val();

	var idCurso = $("#CursoComportamiento").val();

	var idGestion = $("#GestionComportamiento").val();

	var idAsignacion = $("#AsignacionComportamiento").val();

	

		window.location = "index.php?ruta=comportamiento&bimestre="+bimestre+"&idCurso="+idCurso+"&idGestion="+idGestion+"&idAsignacion="+idAsignacion;

	

	 

})


/*===================================
BOTON -> REGISTRO DE COMPORTAMIENTO DE UN ESTUDIANTE
===================================*/

$(".btnAbrirComportamientoRegistro").click(function(){

	var idEstudiante = $(this).attr("idEstudiante");

	var bimestre = $(this).attr("bimestre");

	var idGestion = $(this).attr("idGestion");

	var idAsignacion = $(this).attr("idAsignacion");

	

		window.location = "index.php?ruta=comportamiento-registro&idEstudiante="+idEstudiante+"&bimestre="+bimestre+"&idGestion="+idGestion+"&idAsignacion="+idAsignacion; 


	

	

})

/*===================================
BOTON MODAL - DATOS
===================================*/

$(".btnModalComportamiento").click(function(){

	var idCurso = $(this).attr("idCurso");

	var idAsignacion = $(this).attr("idAsignacion");

	$("#CursoComportamiento").val(idCurso);
	$("#AsignacionComportamiento").val(idAsignacion);

})

/*===================================
BOTON COMPORTAMIENTO (ESTUDIANTE)
===================================*/

$(".btnComportamientoEst").click(function(){

	var idBimestre = $("#BimestreComportamientoEstudiante").val();
	var idEstudiante = $("#idEstudianteRegistroEstudiantilKardex").val();

	window.location = "index.php?ruta=estudiante-comportamiento&idBimestre="+idBimestre+"&idEstudiante="+idEstudiante; 

})


$(".btnRegistroEstudiantilKardex").click(function(){

	var idEstudiante = $(this).attr("idEstudiante"); 

	$("#idEstudianteRegistroEstudiantilKardex").val(idEstudiante);

})