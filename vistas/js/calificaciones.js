/*=============================================
Data Table
=============================================*/

// $(".tablas").DataTable({

// 	"language": {

// 		"sProcessing":     "Procesando...",
// 		"sLengthMenu":     "Mostrar _MENU_ registros",
// 		"sZeroRecords":    "No se encontraron resultados",
// 		"sEmptyTable":     "Ningún dato disponible en esta tabla",
// 		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
// 		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
// 		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
// 		"sInfoPostFix":    "",
// 		"sSearch":         "Buscar:",
// 		"sUrl":            "",
// 		"sInfoThousands":  ",",
// 		"sLoadingRecords": "Cargando...",
// 		"oPaginate": {
// 		"sFirst":    "Primero",
// 		"sLast":     "Último",
// 		"sNext":     "Siguiente",
// 		"sPrevious": "Anterior"
// 		},
// 		"oAria": {
// 			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
// 			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
// 		}

// 	}

// });




/*===================================
BOTON que Direcciona a las materias del curso
===================================*/

$(".btnCalifiaciones").click(function(){

	var idGestion = $(this).attr("idGestion");

	var idCurso = $(this).attr("idCurso");

	window.location = "index.php?ruta=materias-calificacion&idGestion="+idGestion+"&idCurso="+idCurso; 

})

/*===================================
BOTON que Direcciona al Centralizador de calificaciones (1 MATERIA)
===================================*/

$(".btnCalifiacionesMateria").click(function(){

	var idAsignacion = $(this).attr("idAsignacion");
	var nombreMat = $(this).attr("nombreMat"); 
	var idCurso = $(this).attr("idCurso");
	var idGestion = $(this).attr("idGestion");

	window.location = "index.php?ruta=calificaciones-centralizador&idAsignacion="+idAsignacion+"&nombreMat="+nombreMat+"&idCurso="+idCurso+"&idGestion="+idGestion; 

})

/*===================================
BOTON que Direcciona al las califiaciones segun el BIMESTRE  ////REVISAR
===================================*/

$(".btnBimestre").click(function(){

	

	var idCurso = $(this).attr("idCurso");
	
	var nombreMat = $(this).attr("nombreMat"); 

	var idAsignacion = $(this).attr("idAsignacion");

	var bimestre = $(this).attr("bimestre");

	var tipoUsu = $(this).attr("tipo");

	

	var datos = new FormData();

	datos.append("idAsignacion", idAsignacion);

	datos.append("bimestre", bimestre);  

	if(tipoUsu == 2){

		/*--------- INICIA EL FORM DATA ------------------------------*/

		datos.append("idCurso", idCurso);

		/* ---------------TRAER LISTA DE ESTUDIANTES(crear registro de calificacion de cada estudiante)----------------*/

		$.ajax({

			url:"ajax/estudiante.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType:"json",
			success:function(respuesta){

				console.log("Estudiantes", respuesta);

				// datos.append("idAsignacion", idAsignacion);

				// datos.append("bimestre", bimestre);  

				respuesta.forEach(funcionForEach);

				function funcionForEach(item, index){		

					idInscrito = item.cod_ins;

					datos.append("idInscrito", idInscrito);

					/* ---------------BUSCAR LA TABLA DE CALIFICACIONES DE CADA ALUMNDO( Y SI NO TIENE SE LO CREA UNO)----------------*/
					
					$.ajax({

						url:"ajax/calificacion.ajax.php",
						method: "POST",
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						dataType:"json",
						success: function(respuestaA){

							console.log("respuestaA", respuestaA);

						}

					});

					
				}


			}

		});

	}
	// /* --------------- REVISAR SI LAS DIMENCIONES EXISTEN PARA LA ASIGNACION SEGUN EL BIMESTRE----------------*/ // PROBLEMA ACA <- REVISARRRRRRRRRRRRRRRR PENDEJOOOOOOOOOOOO

	datos.append("revisar", "ok");

	$.ajax({

		url:"ajax/dimencion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			datos.append("revisar", " ");

			//console.log("respuesta", respuesta);

			if (Object.entries(respuesta).length === 0 ){

				console.log("Dimenciones", "vacia");
				console.log("R", respuesta);


				// for (var i = 1; i <= 4; i++) {

				// 	if (i == 1 || i == 4) {

				// 		var max = 3;
						
				// 	}

				// 	if (i == 2 || i == 3) {

				// 		var max = 4;
						
				// 	}

				// 	for (var num = 1; num <= max; num++) {

				// 		datos.append("crearDimencion", "ok");
				// 		datos.append("tipo_dim", i);
				// 		datos.append("num", num);
				// 		datos.append("nom_dim", "Dimen");

				// 		$.ajax({
			
				// 			url:"ajax/dimencion.ajax.php",
				// 			method: "POST",
				// 			data: datos,
				// 			cache: false,
				// 			contentType: false,
				// 			processData: false,
				// 			dataType: "json",
				// 			success: function(respuesta){
			
				// 				console.log("Creado"+i, respuesta);
			
							
								
				// 			}
			
				// 		});

				// 	}

				// }

				

			}else{

				console.log("Dimenciones", "No esta vacia");

				console.log("R", respuesta);
				

				

			}

			

				window.location = "index.php?ruta=detalle_cal_bimestre&idCurso="+idCurso+"&nombreMat="+nombreMat+"&idAsignacion="+idAsignacion+"&bimestre="+bimestre; 
				
			
			

			
			
			
		}

	});

	//window.location = "index.php?ruta=detalle_cal_bimestre&idCurso="+idCurso+"&nombreMat="+nombreMat+"&idAsignacion="+idAsignacion+"&bimestre="+bimestre; 

	


});




$(".inputPonderacion").change(function(){

	var idCalificacion = $(this).attr("idCalificacion");
	var tipoImput = $(this).attr("tipoImput");
	var value = $(this).val();

	if(tipoImput < 5){

		var idDimencion = $(this).attr("idDimencion");
		var idAsignacion = $(this).attr("idAsignacion");
		var idBimestre = $(this).attr("idBimestre");

		
		// console.log("value", value);
		// console.log("idDimencion", idDimencion);
		console.log("idCalificacion", idCalificacion);
		

		var datos = new FormData();

		datos.append("value", value);
		datos.append("idDimencion", idDimencion);
		datos.append("idCalificacion", idCalificacion);

		$.ajax({

			url:"ajax/calificacion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(respuesta){

				//console.log("respuesta", respuesta);	

				datos.append("tipoImput", tipoImput);
				datos.append("idAsignacion", idAsignacion);
				datos.append("idBimestre", idBimestre);

				$.ajax({

					url:"ajax/dimencion.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(respuesta){
			
						console.log("respuestaTotal", respuesta);	

						$("#"+tipoImput+idCalificacion).html(respuesta);

						// datos.append("value", "");
						var dato = new FormData();
						dato.append("promedioBimestral", "ok");
						dato.append("idCalificacion", idCalificacion);

						$.ajax({

							url:"ajax/calificacion.ajax.php",
							method: "POST",
							data: dato,
							cache: false,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function(respuesta1){
					
								console.log("respuestaBi", respuesta1);	

								$("#promedio"+idCalificacion).html(respuesta1);
			
								
							}
					
						});

					}
			
				});
			
			}

		});

	}else{

		var datos = new FormData();

		datos.append("idCalificacion", idCalificacion);
		datos.append("tipoImput", tipoImput);
		datos.append("valor", value);
		datos.append("promedioAuto", "ok");
		
		$.ajax({

			url:"ajax/calificacion.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(respuesta){

				console.log("respuesta", respuesta);	

				var dato = new FormData();
				dato.append("promedioBimestral", "ok");
				dato.append("idCalificacion", idCalificacion);

				$.ajax({

					url:"ajax/calificacion.ajax.php",
					method: "POST",
					data: dato,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(respuesta1){
			
						console.log("respuestaBi", respuesta1);	

						$("#promedio"+idCalificacion).html(respuesta1);
	
						
					}
			
				});

			}
		});


	}


})

/*===================================
BOTON CALIFICACIONES - (ESTUDIANTE)
===================================*/

$(".btnCalificacionEst").click(function(){

	window.location = "index.php?ruta=estudiante-calificaciones"; 

})


/*===================================
 IMPRIMIR BOLETIN
===================================*/
$(".btnImprimirBoletin").click(function(){

	var codigoInscrito = $(this).attr("codigoInscrito");
	var codigoCurso = $(this).attr("codigoCurso");
	var bimestre = $(this).attr("bimestre");

	window.open("extensiones/tcpdf/pdf/boletin.php?inscrito="+codigoInscrito+"&curso="+codigoCurso+"&bimestre="+bimestre, "_blank");

})


/*===================================
 REGISTRO ESTUDIANTIL CALIFICACIONES (UNO)
===================================*/
$(".btnRegistroEstudiantilCalificaciones").click(function(){

	var idEstudiante = $(this).attr("idEstudiante");
	var idGestion = $(this).attr("idGestion");

	window.location = "index.php?ruta=estudiante-calificaciones&idEstudiante="+idEstudiante+"&idGestion="+idGestion; 

})