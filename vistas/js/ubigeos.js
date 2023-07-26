async function cambiarDepartamento(){
	nuevoProvincia= document.getElementById('nuevoProvincia');
	nuevoDistrito= document.getElementById('nuevoDistrito');
	nuevoProvincia.innerHTML = '<option value="">Seleccionar provincia</option>';
	nuevoDistrito.innerHTML = '<option value="">Seleccionar distrito</option>';

	var datos = new FormData();
	datos.append("tipo", 'provincias');
	datos.append("id", document.getElementById('nuevaDepartamento').value);
	$.ajax({
		url: 'ajax/ubigeos.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			respuesta.forEach(elemento => {
				nuevoProvincia.innerHTML+=`<option value="${elemento.id}">${elemento.name}</option>`
			});
		}
	})
}
async function cambiarProvincia(){
	nuevoDistrito= document.getElementById('nuevoDistrito');
	nuevoDistrito.innerHTML = '<option value="">Seleccionar distrito</option>';

	var datos = new FormData();
	datos.append("tipo", 'distritos');
	datos.append("id", document.getElementById('nuevoProvincia').value);
	$.ajax({
		url: 'ajax/ubigeos.ajax.php',
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			respuesta.forEach(elemento => {
				nuevoDistrito.innerHTML+=`<option value="${elemento.id}">${elemento.name}</option>`
			});
		}
	})
}