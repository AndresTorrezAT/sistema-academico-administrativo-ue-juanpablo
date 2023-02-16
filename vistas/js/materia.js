/*==================================
EDITAR MATERIA
==================================*/

$(document).on("click", ".btnEditarMateria", function(){

    var idMateria = $(this).attr("idMateria");

    var datos = new FormData();
    datos.append("idMateria", idMateria);


    $.ajax({

        url:"ajax/materia.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

            console.log("respuesta", respuesta);

            $("#editarCod").val(respuesta["cod_mat"]);
			
			$("#editarMateria").val(respuesta["nombre_mat"]);

			if(respuesta["nivel"] == 1){

				$("#editarNivel").html("Primaria");

			}else{

				$("#editarNivel").html("Secundaria");

			}
			
			$("#editarNivel").val(respuesta["nivel"]);

		}

    });


})



/*=============================================
ELIMINAR MATERIA
=============================================*/
$(document).on("click", ".btnEliminarMateria", function(){

	var idMateria = $(this).attr("idMateria");

	swal({
	  title: '¿Está seguro de borrar la materia?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar curso!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=materias&idMateria="+idMateria;
  
	  }
  
	})
  
  })