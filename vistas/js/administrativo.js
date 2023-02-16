/*=========================================
ACTIVAR USUARIO
==========================================*/

$(document).on("click", ".btnActivarA", function(){

    var idAdministrativo = $(this).attr("idAdministrativo");
    var estadoAdministrativo = $(this).attr("estadoUsuario");

    var datos = new FormData(); // variable para ajax
    datos.append("activarId", idAdministrativo);
    datos.append("activarAdministrativo", estadoAdministrativo);

    $.ajax({

        url:"ajax/administrativo.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

       

        }
    })

    if(estadoAdministrativo == 0){

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

$(document).on("click", ".btnEditarAdministrativo", function(){

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

            
            // RECOGIENDO DATOS DE ADMINISTRATIVO MEDIANTE AJAX

            $.ajax({

                url:"ajax/administrativo.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta){
        
                    $("#editarCargo").val(respuesta["cargo"]);
                              
                }
            });

            
        }
    });

})



/*=========================================
ELIMINAR DOCENTE
==========================================*/
$(document).on("click", ".btnEliminarAdministrativo", function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var carnet = $(this).attr("carnet");

    swal({
        title: '¿Está seguro de borrar el Administrativo',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Administrativo!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=administrativos&idUsuario="+idUsuario+"&carnet="+carnet+"&fotoUsuario="+fotoUsuario;
        }
    })
})
