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
		let label = document.createElement('div');
		label.innerHTML = '<input class="testradio" style="opacity: 0;width:20px;height: 20px;position: absolute;left: 22px; cursor: pointer;" type="radio" name="empleados"><span class="inputfalso" style="border-radius: 50%;display: inline-block;height: 20px;position: absolute;left: 22px;width: 21px;z-index: -1;background-color: '+empleado.color+';"></span><label style="color:#7f8581;margin-left:20px;margin-top:1px;font-size:12px;">&nbsp;'+empleado.nombre+" "+empleado.apellido+'</label>';
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
		label.innerHTML = '<input class="testradio2"style="opacity: 0;width:20px;height: 20px;position: absolute;left: 22px; cursor: pointer;" type="radio" name="sucursales"><span class="inputfalso" style="border-radius: 50%;display: inline-block;height: 20px;position: absolute;left: 22px;width: 21px;z-index: -1;background-color: #ccc"></span><label style="color:#7f8581;margin-left:20px;margin-top:1px;font-size:12px;">&nbsp;'+sucursal.nombre+'</label>';
		document.getElementById('nombresucursales').appendChild(label);
	});
}