/*================================================
  MENSAJES DE UN USUARIO CON OTRO USUARIO (chat)
================================================*/

$(document).on("click", ".btnChat", function(){

  var idPerfil =  $("#idUsuarioJS").val();
  var idContacto = $(this).attr("idUsuario");
  var titulo = $(this).attr("titulo");
  var foto = $(this).attr("foto");
  var descripcion = $(this).attr("descripcion");
  var idGestion = $(this).attr("idGestion");
  var color = $(this).attr("color");

  bodyMenssage(titulo, foto, descripcion, color)

  $("#modalEstudiantes").modal('hide');

    $("#input-chat").html(

      '<input type="hidden"  id="MsjFoto" value="null">'+
      '<input type="hidden"  id="MsjDestino" value="'+idContacto+'">'+
      '<input type="hidden"  id="MsjOrigen" value="'+idPerfil+'">'+
      '<input type="hidden"  id="MsjTipo" value="1">'+
      '<input type="hidden"  id="MsjGestion" value="'+idGestion+'">'

    );
  
  var datos = new FormData();

  datos.append("idPerfil", idPerfil);
  datos.append("idContacto", idContacto);
  datos.append("idGestion", idGestion);

  $.ajax({

      url:"ajax/mensaje.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){

        console.log("respuesta", respuesta);

        respuesta.forEach(funcionForEach);

        function funcionForEach(item, index) {

          if(idContacto == item.origen){ // MENSAJES RECIBIDOS

            $("#panel-chat").append(

              '<div class="direct-chat-msg">'+

                '<div class="direct-chat-info clearfix">'+
                  '<span class="direct-chat-name pull-left">'+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'</span>'+
                  '<span class="direct-chat-timestamp pull-right"><i class="fa fa-clock-o"></i>  '+item.fecha_envio+'</span>'+
                '</div>'+
                
                '<img class="direct-chat-img" src="'+item.foto_perfil+'" alt="message user image">'+
                
                '<div class="direct-chat-text">'+
                  item.contenido+
                '</div>'+
              
              '</div>'

            );

          }

          if(idPerfil == item.origen){ // MENSAJES ENVIADOS

            
            $("#panel-chat").append(

              '<div class="direct-chat-msg right">'+

                '<div class="direct-chat-info clearfix">'+
                  '<span class="direct-chat-name pull-right">Tu - '+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'</span>'+
                  '<span class="direct-chat-timestamp pull-left"><i class="fa fa-clock-o"></i>  '+item.fecha_envio+'</span>'+
                '</div>'+
          
                '<img class="direct-chat-img" src="'+item.foto_perfil+'" alt="message user image">'+
              
                '<div class="direct-chat-text">'+
                  item.contenido+
                '</div>'+
            
              '</div>'

            );

          }

          
        }

    
      }
      
  });
});

/*================================================
  MENSAJES DE UN USUARIO CON UN CURSO (ADMINISTRADOR - CURSO)
================================================*/

$(document).on("click", ".btnComunicado", function(){ 

  var nombreUsuario = $("#nombreUsuario").val();
  var fotoUsuario = $("#fotoUsuario").val();

  

  var titulo = $(this).attr("titulo");
  var foto = $(this).attr("foto");
  var descripcion = $(this).attr("descripcion");
  var idGestion = $(this).attr("idGestion");
  var color = $(this).attr("color");

  bodyMenssage(titulo, foto, descripcion, color)


  var idUsuario = $("#idUsuarioJS").val();
  var idCurso = $(this).attr("idCurso");

  $("#input-chat").html(

    '<input type="hidden"  id="MsjFoto" value="null">'+
    '<input type="hidden"  id="MsjDestino" value="'+idCurso+'">'+
    '<input type="hidden"  id="MsjOrigen" value="'+idUsuario+'">'+
    '<input type="hidden"  id="MsjTipo" value="2">'+
    '<input type="hidden"  id="MsjGestion" value="'+idGestion+'">'

  );
  
  var datos = new FormData();

  datos.append("idUsuario", idUsuario);
  datos.append("idCurso", idCurso);
  datos.append("mostrarComunicado", "ok");

  $.ajax({

      url:"ajax/mensaje.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){

        respuesta.forEach(funcionForEach);

        function funcionForEach(item, index) {
            
            $("#panel-chat").append(

              '<div class="direct-chat-msg right">'+

                '<div class="direct-chat-info clearfix">'+
                  '<span class="direct-chat-name pull-right">Tu - '+nombreUsuario+'</span>'+
                  '<span class="direct-chat-timestamp pull-left"><i class="fa fa-clock-o"></i>  '+item.fecha_envio+'</span>'+
                '</div>'+
          
                '<img class="direct-chat-img" src="'+fotoUsuario+'" alt="message user image">'+
              
                '<div class="direct-chat-text">'+
                  item.contenido+
                '</div>'+
            
              '</div>'

            );
        }
    
      }
      
  });

});



// /*================================================
//     VER MENSAJE EN LA BARRA DE NAVEGACION
// ================================================*/
// $(document).on("click", "#btnBarraMsj", function(){
  
//   var idUsuario = $("#idUsuarioJS").val();

//   var datos = new FormData();

//   datos.append("idUsuario", idUsuario);

//   $.ajax({

//       url:"ajax/mensaje.ajax.php",
//       method: "POST",
//       data: datos,
//       cache: false,
//       contentType: false,
//       processData: false,
//       dataType: "json",
//       success: function(respuesta){

//         $("#caja-buzon").html(
//           '<ul class="menu" id="nav-mensajes">'+
// 					'</ul>'
//         );


//         if (Object.entries(respuesta).length === 0 ){ //Esta vacio

//           console.log("respuesta", "Esta Vacio");


//         }else{

//           respuesta.forEach(funcionForEach);

//           function funcionForEach(item, index) {

//             $("#nav-mensajes").append(

//               '<li>'+
// 									'<a href="#">'+
// 									'<div class="pull-left">'+
// 										'<img src="'+item.foto_perfil+'" class="img-circle" alt="User Image">'+
// 									'</div>'+
// 									'<h4>'+
//                     item.nombre_usu+' '+item.ape_paterno+
// 										'<small><i class="fa fa-clock-o"></i>'+item.fecha_envio+'</small>'+
// 									'</h4>'+
// 									'<p>'+item.contenido+'</p>'+
// 									'</a>'+
// 								'</li>'


//             );
            
//           }


//         }

//       }
//   });


// })


/*===================================
MOSTRAR MENSAJES RECIBIDOS EN GENERAL - PANEL DE MENSAJES
===================================*/
function mensajesEnGeneral(){

  bodyMenssage()

  var idUsuario = $("#idUsuarioJS").val();

  var datos = new FormData();

  datos.append("idUsuario", idUsuario);

  var tipoU = 0;

  $.ajax({

      url:"ajax/mensaje.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){

        if (Object.entries(respuesta).length === 0 ){ //Esta vacio

          console.log("respuesta", "Esta Vacio");


        }else{

          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index) {

            if ( item.tipo_usu == 1) {

              var tipo = "Administrativo";
              
            }
            if ( item.tipo_usu == 2) {

              var tipo = "Docente";
              
            }
            if ( item.tipo_usu == 3) {

              var tipo = "Estudiante";
              
            }           

            $("#panel-mensajes").append(

              '<div class="direct-chat-msg">'+

                '<div class="direct-chat-info clearfix">'+
                  '<span class="direct-chat-name pull-left">'+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+' - '+tipo+'</span>'+
                  '<span class="direct-chat-timestamp pull-right">'+item.fecha_envio+'</span>'+
                '</div>'+

                '<img class="direct-chat-img" src="'+item.foto_perfil+'" alt="Message User Image">'+
                '<div class="direct-chat-text">'+
                item.contenido+
                '</div>'+

              '</div>'


            );
            
          }


        }

      }
  });

}


/*===================================
CREAR PANEL CHAT HTML
===================================*/
function bodyMenssage(titulo, foto, descripcion, color){

  $("#CambioBandejaMensaje").html(

    '<div class="box box-'+color+' direct-chat direct-chat-'+color+'" >'+
      
      '<!-- HEADER -->'+

      '<div class="box-header with-border">'+
        '<div class="user-block">'+
          '<img class="img-circle" src="'+foto+'" alt="User Image">'+
          '<span class="username"><a href="#">'+titulo+'</a></span>'+
          '<span class="description">'+descripcion+'</span>'+
        '</div>'+
      '</div>'+
            
      '<!-- BODY -->'+

      '<div class="box-body" id="bodyMenssage">'+

        '<!-- CONVERSASIONES -->'+

        '<div class="direct-chat-messages" style="height: 510px;" id="panel-chat">'+
        
        '</div>'+

      '</div>'+

      '<!-- FOOTER   -->'+

      '<div class="box-footer">'+

        '<div id="input-chat">'+

        '</div>'+

        '<div class="input-group margin">'+

          '<div class="input-group-btn">'+
            '<button type="button" class="btn bg-teal" id="btnEnviarMsj"><i class="fa fa-image"></i></button>'+
          '</div>'+

          '<input type="text" id="MsjContenido" placeholder="Escriba Mensaje..." class="form-control">'+
      
          '<div class="input-group-btn">'+
            '<button type="button" class="btn btn-'+color+'" id="btnEnviarMsj">Enviar</button>'+
          '</div>'+
              
        '</div>'+
        
      '</div>'+
              
   ' </div>'

  );

}


/*===================================
MODAL BODY ESTUDIANTES
===================================*/
function bodyModalEstudiante(){

  $("#modalBodyEstudiante").html(

    '<div class="box-body" id="modalMensajeEstudiante">'+

    '</div>'

  );

}



/*================================================
    BTN ESTUDIANTE MODAL MENSAJE
================================================*/
$(document).on("click", ".btnEstudianteMsj", function(){

  bodyModalEstudiante()
  
  var idCurso = $(this).attr("idCurso");
  var idGestion = $(this).attr("idGestion");
 

  var datos = new FormData();

  datos.append("idCurso", idCurso);

  $.ajax({

      url:"ajax/estudiante.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){


        if (Object.entries(respuesta).length === 0 ){ //Esta vacio

          console.log("respuesta", "Esta Vacio");


        }else{

          console.log("respuesta", respuesta);

          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index) {

            $("#modalMensajeEstudiante").append(

              '<button type="button" class="btn btn-default btn-block btnChat" idGestion="'+idGestion+'" titulo="'+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'" descripcion="Estudiante" foto="'+item.foto_perfil+'" idUsuario="'+item.cod_usu+'" color="danger">'+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'</button>'

            );
            
          }


        }

      }
  });


})


/*===================================
ENVIAR MENSAJE
===================================*/
$(document).on("click", "#btnEnviarMsj", function(){
 
  var contenido = $("#MsjContenido").val();
  var imagen = $("#MsjFoto").val();
  var gestion = $("#MsjGestion").val();
  var tipo = $("#MsjTipo").val();
  var origen = $("#MsjOrigen").val();
  var destino = $("#MsjDestino").val();

  var nombreUsuario = $("#nombreUsuario").val();
  var fotoUsuario = $("#fotoUsuario").val();

  console.log("contenido", contenido);
  console.log("origen", origen);
  console.log("destino", destino);
  console.log("tipo", tipo);
 
  var datos = new FormData();

  datos.append("contenido", contenido);
  datos.append("imagen", imagen);
  datos.append("gestion", gestion);
  datos.append("tipo", tipo);
  datos.append("origen", origen);
  datos.append("destino", destino);

  datos.append("enviar", "ok");

    $.ajax({

      url:"ajax/mensaje.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){   
        
        console.log("respuestaMsj", respuesta);

       $("#panel-chat").append(

        '<div class="direct-chat-msg right">'+

          '<div class="direct-chat-info clearfix">'+
            '<span class="direct-chat-name pull-right">Tu - '+nombreUsuario+'</span>'+
            '<span class="direct-chat-timestamp pull-left"></span>'+
          '</div>'+
    
          '<img class="direct-chat-img" src="'+fotoUsuario+'" alt="message user image">'+
        
          '<div class="direct-chat-text">'+
            contenido+
          '</div>'+
      
        '</div>'

      );

      $("#input-chat").html(

        '<input type="hidden"  id="MsjFoto" value="null">'+
        '<input type="hidden"  id="MsjDestino" value="'+destino+'">'+
        '<input type="hidden"  id="MsjOrigen" value="'+origen+'">'+
        '<input type="hidden"  id="MsjTipo" value="'+tipo+'">'+
        '<input type="hidden"  id="MsjGestion" value="'+gestion+'">'
    
      );

      $("#MsjContenido").val("hola");

      

      }

    });

    //$("#MsjContenido").val(" ");
    //document.getElementById("MsjContenido").value = "";
  
});



/*===================================
BOTON CONTACTO ADMINISTRATIVO
===================================*/
$(document).on("click", ".btnTipoContacto", function(){  
 
  var tipo = $(this).attr("tipo");
  var idGestion = $(this).attr("idGestion");
  var idUsuario = $("#idUsuarioJS").val();

  $("#CambioBandejaMensaje").html('');

  $("#panelBaseContactos1").html('');

  $("#panelBaseContactos2").html('');

  var datos = new FormData();

  /*===================================
  PERSONAL
  ===================================*/

  if(tipo == "p"){

    $(this).removeClass('btn-default');
    $(this).addClass('btn-success');
    $(".msjC").removeClass('btn-warning');
    $(".msjC").addClass('btn-default');
    $(".msjE").removeClass('btn-danger');
    $(".msjE").addClass('btn-default');

    datos.append("traerInfoUsuario", "ok");
    datos.append("tipo", "1");

    $.ajax({

      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
  
        console.log("respuesta", respuesta);

        $("#panelBaseContactos1").append(

          '<div class="box box-success box-solid">'+
    
            '<div class="box-header with-border">'+
    
              '<h3 class="box-title">Administrativos</h3>'+
    
              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-comments"></i></button>'+
              '</div>'+
              
            '</div>'+
    
            '<div class="box-body no-padding">'+
    
              '<ul class="nav nav-pills nav-stacked" id="listaContactosA">'+
    
                
              '</ul>'+
    
            '</div>'+
    
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            if( item.cod_usu != idUsuario){

              $("#listaContactosA").append(
                '<li ><a href="#" class="btnChat"  idUsuario = "'+item.cod_usu+'" titulo="'+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'" descripcion="'+item.cargo+'" foto="'+item.foto_perfil+'" idGestion="'+idGestion+'" color ="success"><i class="fa fa-user"></i> '+item.cargo+' - '+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'</a></li>'
              );

            }

            
          }
  
      }
  
    });


    datos.append("traerInfoUsuario", "ok");
    datos.append("tipo", "2");

    $.ajax({

      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
  
        console.log("respuesta", respuesta);

        $("#panelBaseContactos2").append(

          '<div class="box box-success box-solid">'+
    
            '<div class="box-header with-border">'+
    
              '<h3 class="box-title">Docentes</h3>'+
    
              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-comments"></i></button>'+
              '</div>'+
              
            '</div>'+
    
            '<div class="box-body no-padding">'+
    
              '<ul class="nav nav-pills nav-stacked" id="listaContactosD" >'+
    
                
              '</ul>'+
    
            '</div>'+
    
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            if( item.cod_usu != idUsuario){

              $("#listaContactosD").append(
                '<li ><a href="#" class="btnChat"  idUsuario = "'+item.cod_usu+'" titulo="'+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'" descripcion="Profesor de '+item.nombre_mat+'" foto="'+item.foto_perfil+'" idGestion="'+idGestion+'" color ="success"><i class="fa fa-user"></i>'+item.nombre_mat+' - '+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'</a></li>'
              );

            }

          }
  
      }
  
    });

  }

  /*===================================
  CURSOS
  ===================================*/

  if(tipo == "c"){

    $(this).removeClass('btn-default');
    $(this).addClass('btn-warning');
    $(".msjP").removeClass('btn-success');
    $(".msjP").addClass('btn-default');
    $(".msjE").removeClass('btn-danger');
    $(".msjE").addClass('btn-default');

    var idGestion = $(this).attr("idGestion");
    var idUsuario = $(this).attr("idUsuario");

    datos.append("traerCursosNivel", "ok");
    datos.append("nivel", "1");
    datos.append("idGestion", idGestion);

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

        $("#panelBaseContactos1").append(

          '<div class="box box-warning box-solid">'+

            '<div class="box-header with-border">'+
            
              '<h3 class="box-title">Cursos Primaria</h3>'+

              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-comment"></i></button>'+
              '</div>'+
              
            '</div>'+

            '<div class="box-body no-padding">'+

              '<ul class="nav nav-pills nav-stacked" id="listaContactosP">'+

              '</ul>'+

            '</div>'+
        
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            if(item.nivel == 1) {

              var nivel = "Primaria";
              
            }else{

              var nivel = "Secundaria";

            }

            $("#listaContactosP").append(
        
              '<li><a href="#" class="btnComunicado" idUsuario= "'+idUsuario+'"  idCurso= "'+item.cod_cur+'" titulo="'+item.grado+'° de '+nivel+' '+item.paralelo+'" descripcion="Comunicado a todo un Curso" foto="vistas/img/plantilla/comunicado.png" idGestion="'+idGestion+'" color ="warning"><i class="fa fa-users"></i>'+item.grado+'° de '+nivel+' '+item.paralelo+'</a></li>'

            );

          }
  
      }
  
    });

    datos.append("traerCursosNivel", "ok");
    datos.append("nivel", "2");
    datos.append("idGestion", idGestion);

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

        $("#panelBaseContactos2").append(

          '<div class="box box-warning box-solid">'+

            '<div class="box-header with-border">'+
            
              '<h3 class="box-title">Cursos Secundaria</h3>'+

              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-comment"></i></button>'+
              '</div>'+
              
            '</div>'+

            '<div class="box-body no-padding">'+

              '<ul class="nav nav-pills nav-stacked" id="listaContactosS">'+

              '</ul>'+

            '</div>'+
        
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            if(item.nivel == 1) {

              var nivel = "Primaria";
              
            }else{

              var nivel = "Secundaria";

            }

            $("#listaContactosS").append(
        
              '<li><a href="#" class="btnComunicado" idUsuario= "'+idUsuario+'"  idCurso= "'+item.cod_cur+'" titulo="'+item.grado+'° de '+nivel+' '+item.paralelo+'" descripcion="Comunicado a todo un Curso" foto="vistas/img/plantilla/comunicado.png" idGestion="'+idGestion+'" color ="warning"><i class="fa fa-users"></i>'+item.grado+'° de '+nivel+' '+item.paralelo+'</a></li>'
              
            );

          }
  
      }
  
    });

  }

  if(tipo == "e"){

    $(this).removeClass('btn-default');
    $(this).addClass('btn-danger');
    $(".msjP").removeClass('btn-success');
    $(".msjP").addClass('btn-default');
    $(".msjC").removeClass('btn-warning');
    $(".msjC").addClass('btn-default');


    var idGestion = $(this).attr("idGestion");

    datos.append("traerCursosNivel", "ok");
    datos.append("nivel", "1");
    datos.append("idGestion", idGestion);

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

        $("#panelBaseContactos1").append(

          '<div class="box box-danger box-solid">'+

            '<div class="box-header with-border">'+
            
              '<h3 class="box-title">Estudiantes de Primaria</h3>'+

              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-comment"></i></button>'+
              '</div>'+
              
            '</div>'+

            '<div class="box-body no-padding">'+

              '<ul class="nav nav-pills nav-stacked" id="listaContactosPE">'+

              '</ul>'+

            '</div>'+
        
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            if(item.nivel == 1) {

              var nivel = "Primaria";
              
            }else{

              var nivel = "Secundaria";

            }

            $("#listaContactosPE").append(
        
              '<li><a href="#" class="btnEstudianteMsj"  idGestion="'+idGestion+'" idCurso= "'+item.cod_cur+'" data-toggle="modal" data-target="#modalEstudiantes" ><i class="fa  fa-child"></i>'+item.grado+'° de '+nivel+' '+item.paralelo+'</a></li>'

            );

          }
  
      }
  
    });

    datos.append("traerCursosNivel", "ok");
    datos.append("nivel", "2");
    datos.append("idGestion", idGestion);

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

        $("#panelBaseContactos2").append(

          '<div class="box box-danger box-solid">'+

            '<div class="box-header with-border">'+
            
              '<h3 class="box-title">Estudiantes de Secundaria</h3>'+

              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-comment"></i></button>'+
              '</div>'+
              
            '</div>'+

            '<div class="box-body no-padding">'+

              '<ul class="nav nav-pills nav-stacked" id="listaContactosSE">'+

              '</ul>'+

            '</div>'+
        
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            if(item.nivel == 1) {

              var nivel = "Primaria";
              
            }else{

              var nivel = "Secundaria";

            }

            $("#listaContactosSE").append(
        
              '<li><a href="#" class="btnEstudianteMsj" idGestion="'+idGestion+'"  idCurso= "'+item.cod_cur+'" data-toggle="modal" data-target="#modalEstudiantes" ><i class="fa  fa-child"></i>'+item.grado+'° de '+nivel+' '+item.paralelo+'</a></li>'
              
            );

          }
  
      }
  
    });

    
  }
  
});



/*===================================
BOTON CONTACTO DOCENTE
===================================*/
$(document).on("click", ".btnTipoContactoDocente", function(){  
 
  var tipo = $(this).attr("tipo");
  var idGestion = $(this).attr("idGestion");
  var idUsuario = $("#idUsuarioJS").val();
  var idDocente = $(this).attr("idDocente");


  $("#CambioBandejaMensaje").html('');

  $("#panelBaseContactos1").html('');

  $("#panelBaseContactos2").html('');

  var datos = new FormData();

  /*===================================
  PERSONAL
  ===================================*/

  if(tipo == "p"){

    $(this).removeClass('btn-default');
    $(this).addClass('btn-success');
    $(".msjC").removeClass('btn-warning');
    $(".msjC").addClass('btn-default');
    $(".msjE").removeClass('btn-danger');
    $(".msjE").addClass('btn-default');

    datos.append("traerInfoUsuario", "ok");
    datos.append("tipo", "1");

    $.ajax({

      url:"ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
  
        console.log("respuesta", respuesta);

        $("#panelBaseContactos1").append(

          '<div class="box box-success box-solid">'+
    
            '<div class="box-header with-border">'+
    
              '<h3 class="box-title">Administrativos</h3>'+
    
              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-comments"></i></button>'+
              '</div>'+
              
            '</div>'+
    
            '<div class="box-body no-padding">'+
    
              '<ul class="nav nav-pills nav-stacked" id="listaContactosA">'+
    
                
              '</ul>'+
    
            '</div>'+
    
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            $("#listaContactosA").append(
              '<li ><a href="#" class="btnChat"  idUsuario = "'+item.cod_usu+'" titulo="'+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'" descripcion="'+item.cargo+'" foto="'+item.foto_perfil+'" idGestion="'+idGestion+'" color ="success"><i class="fa fa-user"></i> '+item.cargo+' - '+item.nombre_usu+' '+item.ape_paterno+' '+item.ape_materno+'</a></li>'
            );

          }
  
      }
  
    });

  }

  /*===================================
  CURSOS
  ===================================*/

  if(tipo == "c"){

    $(this).removeClass('btn-default');
    $(this).addClass('btn-warning');
    $(".msjP").removeClass('btn-success');
    $(".msjP").addClass('btn-default');
    $(".msjE").removeClass('btn-danger');
    $(".msjE").addClass('btn-default');

    datos.append("traerCursosAsignadosDocente", "ok");
    datos.append("idGestion", idGestion);
    datos.append("idDocente", idDocente);

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

        $("#panelBaseContactos1").append(

          '<div class="box box-warning box-solid">'+

            '<div class="box-header with-border">'+
            
              '<h3 class="box-title">Cursos Asignados</h3>'+

              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-comment"></i></button>'+
              '</div>'+
              
            '</div>'+

            '<div class="box-body no-padding">'+

              '<ul class="nav nav-pills nav-stacked" id="listaContactosP">'+

              '</ul>'+

            '</div>'+
        
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            if(item.nivel == 1) {

              var nivel = "Primaria";
              
            }else{

              var nivel = "Secundaria";

            }

            $("#listaContactosP").append(
        
              '<li><a href="#" class="btnComunicado" idUsuario= "'+idUsuario+'"  idCurso= "'+item.cod_cur+'" titulo="'+item.grado+'° de '+nivel+' '+item.paralelo+'" descripcion="Comunicado a todo un Curso" foto="vistas/img/plantilla/comunicado.png" idGestion="'+idGestion+'" color ="warning"><i class="fa fa-users"></i>'+item.grado+'° de '+nivel+' '+item.paralelo+'</a></li>'

            );

          }
  
      }
  
    });

  }

  if(tipo == "e"){

    $(this).removeClass('btn-default');
    $(this).addClass('btn-danger');
    $(".msjP").removeClass('btn-success');
    $(".msjP").addClass('btn-default');
    $(".msjC").removeClass('btn-warning');
    $(".msjC").addClass('btn-default');


    datos.append("traerCursosAsignadosDocente", "ok");
    datos.append("idGestion", idGestion);
    datos.append("idDocente", idDocente);

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

        $("#panelBaseContactos1").append(

          '<div class="box box-danger box-solid">'+

            '<div class="box-header with-border">'+
            
              '<h3 class="box-title">Estudiantes de Primaria</h3>'+

              '<div class="box-tools">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-comment"></i></button>'+
              '</div>'+
              
            '</div>'+

            '<div class="box-body no-padding">'+

              '<ul class="nav nav-pills nav-stacked" id="listaContactosPE">'+

              '</ul>'+

            '</div>'+
        
          '</div>');


          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){

            if(item.nivel == 1) {

              var nivel = "Primaria";
              
            }else{

              var nivel = "Secundaria";

            }

            $("#listaContactosPE").append(
        
              '<li><a href="#" class="btnEstudianteMsj"  idGestion="'+idGestion+'" idCurso= "'+item.cod_cur+'" data-toggle="modal" data-target="#modalEstudiantes" ><i class="fa  fa-child"></i>'+item.grado+'° de '+nivel+' '+item.paralelo+'</a></li>'

            );

          }
  
      }
  
    });

    
  }
  
});