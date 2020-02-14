var searchEmpleados = $.ajax({
	type : "GET",
	url : "funciones/empleados.actividades.php",
	beforesend: function() {},
	success : res => {
		createEmpleados(res);
	},
	error : err => {
		console.error(err);     
	}
});

function createEmpleados(res){
	res = JSON.parse(res);
	let empleados =[];
	res.forEach(element => {
		let empleado = {
			nombre: element[0],
			apellido: element[1],
			id: element[2],
			color: element[3]
		}
		empleados.push(empleado);
		let label = document.createElement('label');
		label.innerHTML = '<input type="radio" name="filtroempleados">&nbsp;<label for="check" style="background-color:'+empleado.color+';color:white;padding:3px;font-size:12px;border: 1px white red;border-radius: 3px;"><strong>'+empleado.nombre+" "+empleado.apellido+'</strong></label>';
		document.getElementById('nombreempleados').appendChild(label);
	});
}
var searchsucursales = $.ajax({
	type : "GET",
	url : "funciones/sucursales.actividades.php",
	beforesend: function() {},
	success : res => {
		createSucursal(res);
	},
	error : err => {
		console.error(err);     
	}
});

function createSucursal(res){
	res = JSON.parse(res);
	let sucursales =[];
	res.forEach(element => {
		let sucursal = {
			nombre: element[0],
			id: element[1],
		}
		sucursales.push(sucursal);
		let label = document.createElement('label');
		label.innerHTML = '<input type="radio" name="filtroempleados">&nbsp;<label for="check" style="color:#7f8581;padding:3px;font-size:12px;border: 1px white red;border-radius: 3px;"><strong>'+sucursal.nombre+'</strong></label>';
		document.getElementById('nombresucursales').appendChild(label);
	});
}