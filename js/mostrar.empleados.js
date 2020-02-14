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
			color: element[3],
			sucursal: element[4],
			idSucursal: element[5]
		}
		empleados.push(empleado);
		let label = document.createElement('label');
		label.innerHTML = '<input type="radio" name="filtroempleados">&nbsp;<label for="check" style="background-color:'+empleado.color+';color:white;padding:3px;font-size:12px;border: 1px white red;border-radius: 3px;"><strong>'+empleado.nombre+" "+empleado.apellido+'</strong></label>';
		document.getElementById('nombreempleados').appendChild(label);

		let labelSucursal = document.createElement('label');
		labelSucursal.innerHTML = '<input type="radio" name="filtrosucursales">&nbsp;<label for="check"><strong>'+empleado.sucursal+'</strong></label>';
		document.getElementById('nombresucursales').appendChild(labelSucursal);
	});
}
 // width: 15px;height: 15px;border-radius: 15px;top: -2px;left: -1px;position: relative;background-color: #ffa500;content: '';display: inline-block;visibility: visible;border: 2px solid white;