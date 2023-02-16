/*=============================================
EDITAR USUARIO
=============================================*/
$(".btnEditarCurso").click(function(){

	var idCurso = $(this).attr("idCurso");

	// console.log("idCurso", idCurso);
	
	var datos = new FormData();
	datos.append("idCurso", idCurso);

	

	$.ajax({

		url:"ajax/curso.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			
			console.log("respuesta", respuesta);
			
			$("#editarCod").val(respuesta["cod_cur"]);
			$("#editarGrado").val(respuesta["grado"]);
			$("#editarParalelo").val(respuesta["paralelo"]);
			$("#editarNivel").val(respuesta["nivel"]);

			if(respuesta["nivel"] == 1){

				$("#editarNivel").html("Primaria");

			}else{

				$("#editarNivel").html("Seccundaria");

			}
			
			$("#editarCupo").val(respuesta["cupos"]);

		}

	});

})


/*=============================================
ELIMINAR CURSO
=============================================*/
$(document).on("click", ".btnEliminarCurso", function(){

	var idCurso = $(this).attr("idCurso");

	swal({
	  title: '¿Está seguro de borrar el curso?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar curso!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=curso&idCurso="+idCurso;
  
	  }
  
	})
  
  })
  