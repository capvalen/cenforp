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
	       $("#editarNotaUno").val(respuesta["notaUno"]);
	       $("#editarNotaDos").val(respuesta["notaDos"]);
	       $("#editarNotaTres").val(respuesta["notaTres"]);
	       $("#editarAsistencia").val(respuesta["asistencia"]);
	       $("#editarEmail").val(respuesta["correo"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarFechaNacimiento").val(respuesta["fechaNacimiento"]);
	       $("#editarOcupacion").val(respuesta["opcionOcupacional"]);

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

})