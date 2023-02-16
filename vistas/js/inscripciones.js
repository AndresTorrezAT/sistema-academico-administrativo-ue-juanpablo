
// ENVIAR EL CODIGO DEL CURSO A INSCRIBIR AL FORMULARIO MODAL
$(document).on("click", ".btnnuevoEstudiante", function(){

    var idCurso = $(this).attr("idCurso");

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
			
            $("#nuevoCodCurso").val(respuesta["cod_cur"]);

            $("#gestionIns").val(respuesta["gestion"]);

            $("#idGestionIns").val(respuesta["cod_gestion"]);

            if(respuesta["nivel"] == 1){

                $("#Curso").val(respuesta["grado"]+ "° " + respuesta["paralelo"] + " de Primaria");

			}else{

                $("#Curso").val(respuesta["grado"]+ "° " + respuesta["paralelo"] + " de Secundaria");

            }

        }   

    });
    
})



// GENERAR EL USUARIO CON EL CI

$("#nuevoCi").change(function(){

    var ci = $(this).val();

    $("#nuevoUsuario").val(ci);


})


/*=========================================
RETIRAR AL ESTUDIANTE
==========================================*/
$(document).on("click", ".btnActivarI", function(){

    // swal({
    //     title: '¿Está seguro de Retirar al Estudiante (Desinscribir)',
    //     text: "¡Si no lo está puede cancelar la accíón!",
    //     type: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     cancelButtonText: 'Cancelar',
    //     confirmButtonText: 'Si, Retirar Estudiante!'
    // }).then(function(result){

        // if(result.value){

            var idInscrito = $(this).attr("idInscrito");
            var estadoInscrito = $(this).attr("estadoUsuario");

            var datos = new FormData(); // variable para ajax
            datos.append("activarId", idInscrito);
            datos.append("activarInscrito", estadoInscrito);

            $.ajax({
                url:"ajax/estudiante.ajax.php",
                method:"POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta){
        
                }
            })

            if(estadoInscrito == 0){

                $(this).removeClass('btn-success');
                $(this).addClass('btn-danger');
                $(this).html('Retirado');
                $(this).attr('estadoUsuario',1);
        
            }else{
        
                $(this).addClass('btn-success');
                $(this).removeClass('btn-danger');
                $(this).html('Inscrito');
                $(this).attr('estadoUsuario',0);
        
            }

            
    //     }
    // })
})


/*========================================================
ENVIAR EL CODIGO DEL ESTUDIANTE AL MODAL DE NOTA
=======================================================*/
$(document).on("click", ".btnAgregarNota", function(){

    var idEstudiante = $(this).attr("idEstudiante");

    $("#cod_estNota").val(idEstudiante);

  
    
})



$(document).ready(function() {
    var table = $('#example').DataTable({
        columnDefs: [{
            orderable: false,
            targets: [1,2,3]
        }]
    });
 
    $('.b').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );



/*========================================================
INFORMACION DEL ESTUDIANTE INSCRITO
=======================================================*/
$(document).on("click", ".btnInformacionInscrito", function(){

    var idInscrito = $(this).attr("idInscrito");

    var datos = new FormData(); 


    datos.append("MostrarInformacionInscrito", "ok");
    datos.append("idInscrito", idInscrito);

    $.ajax({
        url:"ajax/inscrito.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            

            var idEstudiante = respuesta["cod_est"];

            if (respuesta["foto_perfil"] != "") {

                $("#fotoEstudiante").attr("src", respuesta["foto_perfil"]);
                
            }else{


                $("#fotoEstudiante").attr("src", "vistas/img/usuarios/default/anonymous.png");


            }

            $("#paternoEstudiante").val(respuesta["ape_paterno"]);
            $("#maternoEstudiante").val(respuesta["ape_materno"]);
            $("#nombreEstudiante").val(respuesta["nombre_usu"]);
            $("#carnetEstudiante").val(respuesta["carnet"]);
            $("#fechaNacimientoEstudiante").val(respuesta["fecha_nac"]);

            if (respuesta["genero"] == 1) { 

                $("#generoEstudiante").val("M");
                
            }else{

                $("#generoEstudiante").val("F");

            }
            
            $("#pesoEstudiante").val(respuesta["peso"]);
            $("#tallaEstudiante").val(respuesta["talla"]);

            $("#usuarioEstudiante").val(respuesta["carnet"]);

            $("#gestionInscritoEstudiante").val(respuesta["gestion"]);

            if (respuesta["nivel"] == 1) {

                var nivel = "Primaria";
                
            }else{

                var nivel = "Secundaria";
            }
            $("#cursoInscritoEstudiante").val(respuesta["grado"]+' ° '+respuesta["paralelo"]+' de '+nivel);

            $("#telefonoEstudiante").val(respuesta["tel_fijo"]);
            $("#celularEstudiante").val(respuesta["celular_con"]);


            $("#direccionEstudiante").val(respuesta[33]);
            $("#puertaEstudiante").val(respuesta["num_puerta"]);

            if (respuesta["libreta_ori"] == 1) {

                $("#libretaEstudiante").val("SI , presento la libreta de calificaciones");
                
            }else{

                $("#libretaEstudiante").val("NO presento la libreta de calificaciones");

            }


            if (respuesta["cert_nac"] == 1) {

                $("#certificadoNacimientoEstudiante").val("SI , presento el certificado");
                
            }else{

                $("#certificadoNacimientoEstudiante").val("NO , presento el certificado");

            }

            if (respuesta["cert_vac"] == 1) {

                $("#certificadoVacunaEstudiante").val("SI , presento certificado");
                
            }else{

                $("#certificadoVacunaEstudiante").val(" N/D");

            }


            if (respuesta["factura"] == 1) {

                $("#facturaEstudiante").val("SI , presento factura");
                
            }else{

                $("#facturaEstudiante").val("NO, presento factura");

            }


            $("#rudeEstudiante").val(respuesta["rude"]);


            datos.append("idEstudiante", idEstudiante);
            datos.append("mostrarResponsables", "ok");

            $.ajax({
                url:"ajax/estudiante.ajax.php",
                method:"POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta){

                    respuesta.forEach(funcionForEach);

                    function funcionForEach(item, index){

                        if (item.tipo == 1) {

                            $("#paternoPadreEstudiante").val(item.pat_res);
                            $("#maternoPadreEstudiante").val(item.mat_res);
                            $("#nombrePadreEstudiante").val(item.nom_res);
                            $("#carnetPadreEstudiante").val(item.ci);
                            
                        }

                        if (item.tipo == 2) {

                            $("#paternoMadreEstudiante").val(item.pat_res);
                            $("#maternoMadreEstudiante").val(item.mat_res);
                            $("#nombreMadreEstudiante").val(item.nom_res);
                            $("#carnetMadreEstudiante").val(item.ci);
                            
                        }

                        if (item.tipo == 3) {

                            $("#paternoTutorEstudiante").val(item.pat_res);
                            $("#maternoTutorEstudiante").val(item.mat_res);
                            $("#nombreTutorEstudiante").val(item.nom_res);
                            $("#carnetTutorEstudiante").val(item.ci);
                            
                        }



                    }

                }

            });

            


        }
    });

    





  
    
});


