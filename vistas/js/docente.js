/*=========================================
ACTIVAR USUARIO
==========================================*/

$(document).on("click", ".btnActivarD", function(){

    var idDocente = $(this).attr("idDocente");
    var estadoDocente = $(this).attr("estadoUsuario");

    var datos = new FormData(); // variable para ajax
    datos.append("activarId", idDocente);
    datos.append("activarDocente", estadoDocente);

    $.ajax({

        url:"ajax/docente.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

       

        }
    })

    if(estadoDocente == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1);

    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',0);

    }


})




/*=========================================
EDITAR DOCENTE
==========================================*/

$(document).on("click", ".btnEditarDocente", function(){

    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();

    datos.append("idUsuario", idUsuario);

    // RECOGIENDO DATOS DE USUARIO MEDIANTE AJAX

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            $("#cod_usu").val(respuesta["cod_usu"]); 
            $("#editarApellidoP").val(respuesta["ape_paterno"]);
            $("#editarApellidoM").val(respuesta["ape_materno"]);
            $("#editarNombre").val(respuesta["nombre_usu"]);
            $("#passwordActual").val(respuesta["passwor"]);
            $("#editarFechaN").val(respuesta["fecha_nac"]);
            $("#editarCi").val(respuesta["carnet"]);                            
            $("#fotoActual").val(respuesta["foto_perfil"]); 

            if(respuesta["foto_perfil"] != ""){

                $(".previsualizar").attr("src", respuesta["foto_perfil"]);

            }

            
            // RECOGIENDO DATOS DE DOCENTE MEDIANTE AJAX

            $.ajax({

                url:"ajax/docente.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta){
        
                    $("#editarFormacion").val(respuesta["formacion"]);

                    var idMateria = respuesta["materia"];

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

                            if(respuesta["nivel"] == 1){

                                $("#selectNivel").html("Primaria");
                
                            }else{
                
                                $("#selectNivel").html("Secundaria");
                
                            }

                            $("#selectNivel").val(respuesta["nivel"]);

                
                            $("#selectMateria").html(respuesta["nombre_mat"]);
                            $("#selectMateria").val(respuesta["cod_mat"]);


                        }
                    });
                              
                }
            });

            
        }
    });

})



/*=========================================
ELIMINAR DOCENTE
==========================================*/
$(document).on("click", ".btnEliminarDocente", function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var carnet = $(this).attr("carnet");

    swal({
        title: '¿Está seguro de borrar el Docente',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Docente!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=docentes&idUsuario="+idUsuario+"&carnet="+carnet+"&fotoUsuario="+fotoUsuario;
        }
    })
})
