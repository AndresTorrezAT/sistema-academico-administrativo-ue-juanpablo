
/*=========================================
ELIMINAR HORARIO
==========================================*/
$(document).on("click", ".btnEliminarHorario", function(){

    var idCurso = $(this).attr("idCurso");

    swal({
        title: '¿Está seguro de borrar el horario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar horario!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=ver-horario&idCurso="+idCurso;
        }
    })
})


/*===================================
AGREGANDO MATERIAS AL SELECT DE HORARIO
===================================*/


$(".formularioHorario").on("change", "select.seleccionarCurso", function(){
	
    var nivelCur = $('#seleccionarCurso option:selected').attr('nivelCur');

    var idCurso = $('#seleccionarCurso option:selected').val(); // obtener sel select


    console.log("idCurso", idCurso);

    var datos = new FormData();

    datos.append("traerMateriasHorario", "ok");
    datos.append("idCurso", idCurso);

    // console.log("respuestaTabla", datos);
	$.ajax({

		url:"ajax/horario.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
            
      var colorR ='style="background-color : #ccccff";';

      $(".tablaHorario").html(

        '<tr>'+

          '<td>1</td>'+

          '<td>'+
            '<select size="1" id="row-11" name="row-11" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-12" name="row-12" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-13" name="row-13" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-14" name="row-14" required>'+
              
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-15" name="row-15" required>'+
                
            '</select>'+
          '</td>'+

        '</tr>'+


        '<tr>'+

          '<td>2</td>'+

          '<td>'+
            '<select size="1" id="row-21" name="row-21" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-22" name="row-22" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-23" name="row-23" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-24" name="row-24" required>'+
              
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-25" name="row-25" required>'+
                
            '</select>'+
          '</td>'+

        '</tr>'+


        '<tr>'+

          '<td>3</td>'+

          '<td>'+
            '<select size="1" id="row-31" name="row-31" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-32" name="row-32" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-33" name="row-33" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-34" name="row-34" required>'+
              
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-35" name="row-35" required>'+
                
            '</select>'+
          '</td>'+

        '</tr>'+

        '<tr>'+

          '<td>4</td>'+

          '<td>'+
            '<select size="1" id="row-41" name="row-41" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-42" name="row-42" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-43" name="row-43" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-44" name="row-44" required>'+
              
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-45" name="row-45" required>'+
                
            '</select>'+
          '</td>'+

        '</tr>'+


        '<tr>'+
          '<td '+colorR+'>5</td>'+
          '<td '+colorR+'>RECREO</td>'+
          '<td '+colorR+'>RECREO</td>'+
          '<td '+colorR+'>RECREO</td>'+
          '<td '+colorR+'>RECREO</td>'+
          '<td '+colorR+'>RECREO</td>'+
        '</tr>'+

        '<tr>'+

          '<td>6</td>'+

          '<td>'+
            '<select size="1" id="row-61" name="row-61" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-62" name="row-62" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-63" name="row-63" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-64" name="row-64" required>'+
              
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-65" name="row-65" required>'+
                
            '</select>'+
          '</td>'+

        '</tr>'+


        '<tr>'+

          '<td>7</td>'+

          '<td>'+
            '<select size="1" id="row-71" name="row-71" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-72" name="row-72" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-73" name="row-73" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-74" name="row-74" required>'+
              
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-75" name="row-75" required>'+
                
            '</select>'+
          '</td>'+

        '</tr>'+


        '<tr>'+

          '<td>8</td>'+

          '<td>'+
            '<select size="1" id="row-81" name="row-81" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-82" name="row-82" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-83" name="row-83" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-84" name="row-84" required>'+
              
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-85" name="row-85" required>'+
                
            '</select>'+
          '</td>'+

        '</tr>'+


        '<tr>'+

          '<td>9</td>'+

          '<td>'+
            '<select size="1" id="row-91" name="row-91" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-92" name="row-92" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-93" name="row-93" required>'+
                
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-94" name="row-94" required>'+
              
            '</select>'+
          '</td>'+

          '<td>'+
            '<select size="1" id="row-95" name="row-95" required>'+
                
            '</select>'+
          '</td>'+

        '</tr>'

      )

      

       /*==========================================
       AÑADIENDO DATOS AL SELECT DE CADA HORARIO
       ==========================================*/

                var i = 1;
                

                while(i<=9){

                    var j = 1;
                    
                    while(j<=5){

                        $("#row-"+i+j).append(

                            '<option idCurso="0">LIBRE</option>'
                        )

                        j++;

                    }

                    i++;
                }

            // AGREGAR LOS CURSOS AL SELECT

            respuesta.forEach(funcionForEach);

            function funcionForEach(item, index){
                
                var i = 1;
                

                while(i<=9){

                    var j = 1;

                    while(j<=5){

                        $("#row-"+i+j).append(

                            '<option idMateria="'+item.cod_mat+'" value="'+item.cod_mat+'">'+item.nombre_mat+'</option>'
                        )

                        j++;

                    }

                    i++;
                }
               
            }

            // $(".tablaHorario").remove();
				
            
      }

	})
})

