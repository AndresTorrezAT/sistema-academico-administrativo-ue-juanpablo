/*===================================
AGREGANDO MATERIAS AL SELECT DE ASIGNACION MATERIA - DOCENTE (AGREGAR)
===================================*/

$(".formularioDocente").on("change", "select.seleccionarNivelA", function(){
	
    var nivelCur = $(this).val();

    var datos = new FormData();

    datos.append("traerMaterias", "ok");
    datos.append("nivelCur", nivelCur);

    
	$.ajax({

		url:"ajax/materia.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
        success:function(respuesta){

            // if (nivelCur == 1) {
                
            
            //     console.log("respuesta", respuesta);

            //     $(".materiaDocenteA").html(

            //         '<span class="input-group-addon"><i class="fa fa-users"></i></span>'+

            //         '<select class="form-control input-lg" name="nuevaMateria" id="selectMateriaA">'+

            //             '<option value="">Selecionar Materia</option>'+
            //             '<option  value="0"> General </option>'+

            //         '</select>'

            //     )

            //     // AGREGAR LOS CURSOS AL SELECT

            //     respuesta.forEach(funcionForEach);

            //     function funcionForEach(item, index){

            //         if (item.nombre_mat == "Educación Física") {

            //             $("#selectMateriaA").append(

            //                 '<option  value="'+item.cod_mat+'">'+item.nombre_mat+'</option>'
            //             )
                        
            //         }
                    
                    
                
            //     }

            // }

            // if (nivelCur == 2) {
                
            

                console.log("respuesta", respuesta);

                $(".materiaDocenteA").html(

                    '<span class="input-group-addon"><i class="fa fa-users"></i></span>'+

                    '<select class="form-control input-lg" name="nuevaMateria" id="selectMateriaA">'+
                    
                    '<option value="">Selecionar Materia</option>'+

                    '</select>'

                )

                // AGREGAR LOS CURSOS AL SELECT

                respuesta.forEach(funcionForEach);

                function funcionForEach(item, index){
                    
                    $("#selectMateriaA").append(

                        '<option  value="'+item.cod_mat+'">'+item.nombre_mat+'</option>'
                    )
                
                }

            // }

        }
        
    })

})

/*===================================
AGREGANDO MATERIAS AL SELECT DE ASIGNACION MATERIA - DOCENTE (EDITAR)
===================================*/

$(".formularioDocente").on("change", "select.seleccionarNivelE", function(){
	
    var nivelCur = $(this).val();

    

    var datos = new FormData();

    
    datos.append("traerMaterias", "ok");
    datos.append("nivelCur", nivelCur);

    
	$.ajax({

		url:"ajax/materia.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
        success:function(respuesta){

            // console.log("respuesta", respuesta);

            $(".materiaDocenteE").html(

                '<span class="input-group-addon"><i class="fa fa-users"></i></span>'+

                '<select class="form-control input-lg" name="editarMateria" id="selectMateriaE">'+
                  
                  '<option value="">Selecionar Materia</option>'+

                '</select>'

            )

            // AGREGAR LOS CURSOS AL SELECT

            respuesta.forEach(funcionForEach);

            function funcionForEach(item, index){
                
                $("#selectMateriaE").append(

                    '<option  value="'+item.cod_mat+'">'+item.nombre_mat+'</option>'
                )
               
            }

        }
        
    })

})



/*=============================================
ASIGNACION DE MATERIAS A CURSO Y ESCOGER EL DOCENTE
=============================================*/
$(".btnAsignar").click(function(){

    var idCurso = $(this).attr("idCurso"); // ID DEL CURSO
    
    var key = $(this).attr("key"); 

    console.log("key", key);

    $("#modalBaseAsignacion").html(

        '<div class="box-body" id="modalInputsAsignacion">'+

            '<div class="form-group">'+
              
              '<div class="input-group">'+
  
                  '<input type="hidden" name="asigCurso" value="'+idCurso+'">'+
         
              '</div>'+
  
            '</div>'+

        '</div>'  
    )

    var datos = new FormData();

    datos.append("traerMateriasAsignadasCurso", "ok");
    datos.append("idCurso", idCurso);

    /*=================================================
    TRAER MATERIAS ASIGNADAS A UN CURSO
    =================================================*/

	$.ajax({

		url:"ajax/asignacion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
            
            console.log("respuesta", respuesta);

            respuesta.forEach(funcionForEach);

            function funcionForEach(item, index){

                /*=================================================
                TRAER NOMBRES DE MATERIAS
                =================================================*/

                var idMateria = item.cod_mat; // GUARDANDO CODIGO DE MATERIA

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

                        //console.log("respuesta", respuesta); 

                        $("#modalInputsAsignacion").append(

                            '<div class="form-group">'+

                                '<div class="row">'+

                                    '<!-- MATERIA-->'+

                                    '<div class="col-xs-6">'+

                                        '<div class="input-group">'+

                                        '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
                                        '<input type="text" class="form-control input-lg" name="asigMateria'+idMateria+'"  value="'+respuesta["nombre_mat"]+'" readonly>'+
                                        
                                        '</div>'+

                                    '</div>'+

                                    '<!-- DOCENTE -->'+

                                    '<div class="col-xs-6">'+

                                        '<select class="form-control input-lg" name="asigDocente'+idMateria+'" id="asigDocente'+idMateria+'" required>'+
                                        
                                        

                                        '</select>'+

                                    '</div>'+
                            

                                '</div>'+

                            '</div>'

                        )

                        

                        /*=================================================
                        AÑADIR DOCENTES AL SELECT
                        =================================================*/

                        var variable = new FormData();
                
                        variable.append("idMateria", idMateria);

                        $.ajax({

                            url:"ajax/docente.ajax.php",
                            method: "POST",
                            data: variable,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            success: function(respuestaDoc){

                                if (item.cod_doc == null) {

                                    $("#asigDocente"+idMateria).append(
        
                                    '<option value="0">Sin Docente</option>'
        
                                    );

                                    
                                    
                                }else{

                                    if(respuestaDoc != ""){

                                        respuestaDoc.forEach(funcionForEachTwo);
    
                                        function funcionForEachTwo(item2, index2){

                                            if (item2.cod_doc == item.cod_doc) {

                                                $("#asigDocente"+idMateria).append(
    
                                                    '<option value="'+item2.cod_doc+'">'+item2.nombre_usu+' '+item2.ape_paterno+' '+item2.ape_materno+'</option>'+
                                                    '<option value="0">Sin Docente</option>'
                                                );

                                            }
      
    
                                        }
    
                                        console.log("respuestaDoc", respuestaDoc);
    
    
                                    }

                                }

                                if(respuestaDoc != ""){

                                    respuestaDoc.forEach(funcionForEachTwo);

                                    function funcionForEachTwo(item2, index2){

                                        if (item2.cod_doc != item.cod_doc) {

                                            $("#asigDocente"+idMateria).append(

                                                '<option value="'+item2.cod_doc+'">'+item2.nombre_usu+' '+item2.ape_paterno+' '+item2.ape_materno+'</option>'
                                            );


                                        }


                                        

                                    }

                                    console.log("respuestaDoc", respuestaDoc);


                                }

                                


                            }

                        });

                       


                    }

                });
                
                
                



            }

        }
    });


})

// $("#modalAgregarMat-Doc").on('hidden.bs.modal', function () {
//     // alert("Esta accion se ejecuta al cerrar el modal")
//     $("#modalBaseAsignacion").html('');
// });