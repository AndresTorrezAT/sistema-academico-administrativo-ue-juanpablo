/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function(){

    var imagen = this.files[0];
    
        /*=========================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        ==========================================*/

        if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

            $(".nuevaFoto").val("");

            swal({
                title: "Error al subir la imagen",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
                });

        }else if(imagen["size"] > 2000000){

            $(".nuevaFoto").val("");

            swal({
                title: "Error al subir la imagen",
                text: "¡La imagen no debe pesar mas de 2MB!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
                });

        }else{

            var datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on("load", function(event){

                var rutaImagen = event.target.result;

                $(".previsualizar").attr("src", rutaImagen);
            })


             
        }

})

/*=========================================
REVISAR SI EL USUARIO YA ESTA REGISTRADO
==========================================*/

$("#nuevoCi").change(function(){

    $(".alert").remove();

    var carnet = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", carnet);

    $.ajax({
            url:"ajax/usuarios.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){

                if(respuesta){

                    $("#nuevoCi").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');
                    $("#nuevoCi").val("");

                }

            }
    })
})