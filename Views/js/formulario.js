const formulario = document.getElementById('formulario'); //con esto accedemos al formulario
const inputs = document.querySelectorAll('#formulario input'); //accedemos a todos los inputs que estan en el formullario

const expresiones = {
	Nombres_Usuario: /^[a-zA-ZÀ-ÿ\s]{1,25}$/, // Letras y espacios, pueden llevar acentos.
	Apellidos_Usuario: /^[a-zA-ZÀ-ÿ\s]{1,25}$/, // Letras y espacios, pueden llevar acentos.
	Documento_Identificacion: /^\d{7,10}$/, // 7 a 14 numeros.
	Telefono_Usuario: /^\d{7,10}$/,// 7 a 14 numeros.
	Id_RH,
	Id_Rol,
	Correo_Electronico: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+${1,40}$/,
	Contrasena_Usuario: /^[a-zA-Z0-9_.+-]{1,11}$/ 


}

const campos = {
	Nombres_Usuario: false,
	Apellidos_Usuario: false,
	Documento_Identificacion: false,
	Telefono_Usuario: false,
	Id_RH: false,
	Id_Rol: false,
	Correo_Electronico: false,
	Contrasena_Usuario: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) { //lo que esta en parentesis hace refrencia al nombre del input
		case "Nombres_Usuario":
			validarCampo(expresiones.Nombres_Usuario, e.target, 'Nombres_Usuario');//se le pasa expresiones, el nombre del input y el nmbre del campo
			console.log('funciona');
		break;
		case "Apellidos_Usuario":
			validarCampo(expresiones.Apellidos_Usuario, e.target, 'Apellidos_Usuario');
		break;
		case "Documento_Identificacion":
			validarCampo(expresiones.Documento_Identificacion, e.target, 'Documento_Identificacion');
		break;
		case "Telefono_Usuario":
			validarCampo(expresiones.Telefono_Usuario, e.target, 'Telefono_Usuario');
		break;
		case "Id_RH":
			validarCampo(expresiones.Id_RH, e.target, 'Id_RH');
		break;
		case "Id_Rol":
			validarCampo(expresiones.Id_Rol, e.target, 'Id_Rol');
		break;
		case "Correo_Electronico":
			validarCampo(expresiones.Correo_Electronico, e.target, 'Correo_Electronico');
			validarCorreo2();
		break;
		case "Correo_Electronico2":
			validarCorreo2();
		break;
		case "Contrasena_Usuario":
			validarCampo(expresiones.Contrasena_Usuario, e.target, 'Contrasena_Usuario');
			validarPassword2();
		break;
		case "Contrasena_Usuario2":
			validarPassword2();
		break;

		
	}
}

const validarCampo = (expresion, input, campo) => {//se le pasa expresiones, el nombre del input y el nmbre del campo
	if(expresion.test(input.value)){//si todo esta correcto pasa esto
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else { //si hay algo incorrecto pasa esto
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarCorreo2 = () => {
	const inputCorreo1 = document.getElementById('Correo_Electronico');
	const inputCorreo2 = document.getElementById('Correo_Electronico2');

	if(inputCorreo1.value !== inputCorreo2.value){
		document.getElementById(`grupo__Correo_Electronico2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Correo_Electronico2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__Correo_Electronico2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__Correo_Electronico2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__Correo_Electronico2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['Correo_Electronico'] = false;
	} else {
		document.getElementById(`grupo__Correo_Electronico2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Correo_Electronico2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__Correo_Electronico2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__Correo_Electronico2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__Correo_Electronico2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['Correo_Electronico'] = true;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('Contrasena_Usuario');
	const inputPassword2 = document.getElementById('Contrasena_Usuario2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__Contrasena_Usuario2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Contrasena_Usuario2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__Contrasena_Usuario2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__Contrasena_Usuario2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__Contrasena_Usuario2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['Contrasena_Usuario'] = false;
	} else {
		document.getElementById(`grupo__Contrasena_Usuario2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Contrasena_Usuario2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__Contrasena_Usuario2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__Contrasena_Usuario2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__Contrasena_Usuario2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['Contrasena_Usuario'] = true;
	}
}

inputs.forEach((input) => { //por cada inpit se cuando se da click en ellos se corre el metodo de validacion
	input.addEventListener('keyup', validarFormulario);//cuando se levante la techa del input
	input.addEventListener('blur', validarFormulario);//cuando se de un click fuera del input
});

formulario.addEventListener('submit', (e) => {
	//e.preventDefault(); //esto evita que los datos se envien

	const terminos = document.getElementById('terminos');
	if(campos.usuario && campos.nombre && campos.password && campos.correo && campos.telefono && terminos.checked ){
		formulario.submit();//si todo esta correcto el lo va a mandar

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => { //con esto se elimina el msj dp de 5 segundos
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => { //con esto accedemos a todos los iconos y eliminamos la clase que muestra los iconos
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else { //si hay algo mas saca el menaje de error
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});