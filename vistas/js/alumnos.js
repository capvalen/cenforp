/*=============================================
EDITAR Alumno
=============================================*/
$(".tablas").on("click", ".btnEditarAlumno", function(){

	var idAlumno = $(this).attr("idAlumno");

	var datos = new FormData();
    datos.append("idAlumno", idAlumno);

    $.ajax({
      url:"ajax/alumnos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idAlumno").val(respuesta["id"]);
	       $("#editarAlumno").val(respuesta["nombre"]);
	       $("#editarDocumentoId").val(respuesta["dni"]);
	       $("#editarAsistencia").val(respuesta["asistencia"]);
	       $("#editarEmail").val(respuesta["correo"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarFechaNacimiento").val(respuesta["fechaNacimiento"]);
	       $("#editarOcupacion").val(respuesta["idOcupacion"]);

	  }

  	})
});

/*=============================================
Activar la edición de notas
=============================================*/
$('.btnEditarNotas').click(function(){
	var idAlumno = $(this).attr("idAlumno");
	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tipo", 'notas');
	$('#idAlumno').val(idAlumno)
	

	$.ajax({
		url:"ajax/alumnos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){ console.log(respuesta);
			$('#editarAlumno').val(respuesta.alumno.apellidos + ' ' + respuesta.alumno.nombre)
			$('#editarDocumentoId').val(respuesta.alumno.dni)
			var cantNotas = respuesta.cantidadNotas;
			var notasRellenadas = respuesta.notas.length;
			$('#cantNotas').val(notasRellenadas);
			for (let index = 0; index < cantNotas; index++) {
				if(index< notasRellenadas )
					$(`#editarNota${index+1}`).val( respuesta.notas[index].nota ?? 0 );
				else
					$(`#editarNota${index+1}`).val( 0 );
			}
	}

	})
})


/*=============================================
ELIMINAR Alumno
=============================================*/
$(".tablas").on("click", ".btnEliminarAlumno", function(){

	var idAlumno = $(this).attr("idAlumno");
	
	swal({
        title: '¿Está seguro de borrar el Alumno?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Alumno!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=alumnos&idAlumno="+idAlumno;
        }

  })

});
/*=============================================
Registrar asistencia
=============================================*/
$('#btnRegistrarAsistencia').click(function(){
	var ids = [];
	var campos = $('tbody .checks');

	campos.each(function (){
		ids.push({id: $(this).data('id'), presente: $(this).find('input').is(":checked")? 1:0 })
	})
	//console.log('ids',ids); return false;

	var datos = new FormData();
	datos.append('tipo', 'registrarAsistencia' )
	datos.append('fecha', $('#txtFechaAsistencia').val() )
	datos.append('idAlumnos', JSON.stringify(ids) )
	$.ajax({
		url:"ajax/alumnos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"text",
		success: function(respuesta){
			console.log(respuesta);
			if(respuesta == 'ok'){
				swal({
					title: 'Registro de asistencia guardado',
					type: 'success',
					showCancelButton: false,
					confirmButtonText: 'Finalizar!'
				}).then(function(result){
					if (result.value) {
							location.reload();
					}else{
						alert('Error al actualizar')
					}
		})
			}
		}
	});
	
});


$('#btnPasarAsistencia').click(function (){
	$('.checks').removeClass('hidden')
	$('.acciones').addClass('hidden')
})

$(document).ready(function(){
	var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ]
	meses.forEach(mes=>{
		$('#editarMes').append(`<option value="${mes}">${mes}</option>`)
	});
})

$('#btnSubirArchivo').click(function(){
	event.preventDefault();
	var file = $("#nuevoArchivo")[0].files[0];

	var formData = new FormData();
	formData.append('archivo', file)

	$.ajax({
		url:"ajax/alumnos.ajax.php",
		type: "POST",
		data: formData,
		processData: false,
		contentType: false,
		dataType:"json",
		success: function(response) {
			//console.log(response);
			if(response.archivo){
				$('#adjunto').val(response.archivo);
				$('#nuevoArchivo').addClass('hidden')
				$('#formSubida').addClass('hidden')
				$('#lblSubida').addClass('hidden')
				$('#alertSubido').removeClass('hidden')
			}
		},
		error: function(xhr, status, error) {
				console.error(xhr.responseText);
		}
	});

})