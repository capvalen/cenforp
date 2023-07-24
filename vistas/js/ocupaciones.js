/*=============================================
EDITAR OCUPACION
=============================================*/
$(".tablas").on("click", ".btnEditarOcupacion", function(){

	var idOcupacion = $(this).attr("idOcupacion");

	var datos = new FormData();
	datos.append("idOcupacion", idOcupacion);

	$.ajax({
		url: "ajax/ocupaciones.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarOcupacion").val(respuesta["opcionOcupacional"]);
     		$("#idOcupacion").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR OCUPACION
=============================================*/
$(".tablas").on("click", ".btnEliminarOcupacion", function(){

	 var idOcupacion = $(this).attr("idOcupacion");

	 swal({
	 	title: '¿Está seguro de borrar la categoría?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=ocupaciones&idOcupacion="+idOcupacion;

	 	}

	 })

})