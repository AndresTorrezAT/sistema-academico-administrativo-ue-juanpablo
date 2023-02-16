/*===================================
BOTON  -> MATERIAS DE UN CURSO - (ADMINISTRATIVOS)
===================================*/

$(".btnAsistencia").click(function(){

	var idGestion = $(this).attr("idGestion");

	var idCurso = $(this).attr("idCurso");

	window.location = "index.php?ruta=materias-asistencia&idGestion="+idGestion+"&idCurso="+idCurso; 

})



/*===================================
BOTON  -> REGISTRO DE ASISTENCIA DE UNA MATERIA - (DOCENTE) (ADMINISTRATIVOS)
===================================*/

$(".btnAsistenciaRegistro").click(function(){

	var idAsignacion = $("#AsignacionAsistencia").val();
	var nombreMat = $("#MateriaAsistencia").val();
    var idCurso = $("#CursoAsistencia").val();
    var bimestre = $("#BimestreAsistencia").val();

	window.location = "index.php?ruta=asistencia&idAsignacion="+idAsignacion+"&nombreMat="+nombreMat+"&idCurso="+idCurso+"&bimestre="+bimestre; 

})


/*===================================
BOTON MODAL - DATOS
===================================*/

$(".btnModalAsistencia").click(function(){

	var idAsignacion = $(this).attr("idAsignacion");
	var nombreMat = $(this).attr("nombreMat");
	var idCurso = $(this).attr("idCurso");

	$("#AsignacionAsistencia").val(idAsignacion);
	$("#MateriaAsistencia").val(nombreMat);
	$("#CursoAsistencia").val(idCurso);

})

/*===================================
REGISTRO DE ASISTENCIA (ESTUDIANTE)
===================================*/

$(".btnAsistenciaEst").click(function(){

	var idBimestre = $("#BimestreAsistenciaEstudiante").val();

	var idInscrito = $("#idInscritoRegistroEstudiantilAsistencia").val();

	var idCurso= $("#idCursoRegistroEstudiantilAsistencia").val();


	window.location = "index.php?ruta=estudiante-asistencia&idBimestre="+idBimestre+"&idInscrito="+idInscrito+"&idCurso="+idCurso;

})

/*===================================
BOTON  -> ESTADISTICAS DE ASISTENCIA DE DOCENTE - MATERIA
===================================*/

$(".btnAsistenciaEstadisticaDocente").click(function(){
	var idAsignacion = $(this).attr("idAsignacion");
	var nombreMat = $(this).attr("nombreMat");
	var idCurso = $(this).attr("idCurso");
	var bimestre = $(this).attr("bimestre");

	window.location = "index.php?ruta=estadistica-asistenciaDocente&idAsignacion="+idAsignacion+"&nombreMat="+nombreMat+"&idCurso="+idCurso+"&bimestre="+bimestre; 

})


/*===================================

===================================*/

$(".btnRegistroEstudiantilAsistencia").click(function(){

	var idInscrito = $(this).attr("idInscrito"); 
	var idCurso = $(this).attr("idCurso"); 

	$("#idInscritoRegistroEstudiantilAsistencia").val(idInscrito);

	$("#idCursoRegistroEstudiantilAsistencia").val(idCurso);

})


