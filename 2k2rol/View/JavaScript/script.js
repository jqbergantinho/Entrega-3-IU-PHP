/*Funcion: Este es el fichero JavaScript en el que se implementan todas las funciones de validación requeridas por la entrega ET2.
Autor(Alias): 2k2rol
Autor: Javier Quintas Bergantiño 47284518Z
Fecha: 27/10/2018.
Nº Horas empleadas: 7 horas
*/

function comprobarVacio(campo){
	
	var valor = document.getElementById(campo).value; //Guardamos la variable recibida con id=campo
	
	if(valor == ""){
	//Si el campo esta vacío, se muestra el campo con un borde de color rojo
		document.getElementById(campo).style.borderColor="red";
		return false;
	}
	//Si el campo no está vacío, se muestra el campo con un borde de color verde
	document.getElementById(campo).style.borderColor="green";
	
	return true;
}


function comprobarTexto(campo, size) { //Comrpueba si es texto

	var expr = /^([^\s\t]+)+$/; //Expresion regular permite todo menos espacios tabuladores etc..
	

	if (comprobarExpresionRegular(campo, expr, size)) { //Comprobamos la expresion regular

		document.getElementById(campo).style.borderColor = "green"; //pinta el input de verde
		return true;
	}
	document.getElementById(campo).style.borderColor = "red"; //pinta el input de rojo
	return false;

}

function comprobarExpresionRegular(campo, exprreg, size){

		var valor = document.getElementById(campo).value; //Variable que guarda el valor de id=campo
		//Se comprueba que el campo no esté vacío, que su valor sea correcto y que sea del tamaño adecuado
		if(comprobarVacio(campo) && exprreg.test(valor) && valor.length <= size){
			return true;
		}

		return false;
}

function comprobarAlfabetico(campo, size){

	var expr = /^([a-zñáéíóúA-ZÁÉÍÓÚ]+[\s]*)+$/;//Variable que guarda la expresión regular para comprobar que el campo es alfabético
	//Se llama a comprobarExpresionRegular y, si todo es correcto, se pone el borde del campo de color verde
	if(comprobarExpresionRegular(campo, expr, size)){
		document.getElementById(campo).style.borderColor="green";
		return true;
	}
	//Si se incumple algun requerimiento, se muestra el borde del campo de color rojo
	document.getElementById(campo).style.borderColor="red";
	return false;
}

function comprobarEntero(campo, valormenor, valormayor){
	var expr = /^[0-9]*$/; //Guardamos la expresión regular para los números enteros
	var valor = document.getElementById(campo).value;

    if (valor >= valormenor && valor <= valormayor && expr.test(valor)) { //Comprobamos que la variable sea aceptada por la expr y que su tamaño esté entre los marcados
        document.getElementById(campo).style.borderColor="green";
        return true;
    } else {//Si la variable no coincide con la expr o el tamaño excede el size
       	document.getElementById(campo).style.borderColor="red";
        return false;
    }
}


function comprobarReal(campo, numeros_decimales, valormenor, valormayor){
	var expr = "^[0-9]*.[0-9]{1,"+ numeros_decimales +"}$"; //Guardamos la expresión regular para los números reales en formato de texto
	var expr2 = new RegExp(expr); //Convertimos el texto en expresión regular
	var valor = document.getElementByID(campo).value; //Guardamos la variable recibida con id=campo
	//Comprobamos que el valor esté entre los límites marcados y que coincida con la expresión regular y, si cumple los requisitos, se muestra el borde del campo de color verde
	if( valor >= valormenor && valor <= valormayor && expr2.test(valor)){
		document.getElementById(campo).style.borderColor="green";
        return true;
	}
	//Si no se cumplen los requisitos, se muestra el borde del campo de color rojo
	document.getElementById(campo).style.borderColor="red";
    return false;
}

function comprobarDni(campo, size) { //Comprobamos si el campo es un dni

	var valor = document.getElementById(campo).value; //Coje el valor del input
	var expr = /^\d{8}[a-zA-Z]?$/ //Expresion regular que permite 8 enteros y puede meter o no la letra
	var numero;
	var modulo;
	var letra = 'TRWAGMYFPDXBNJZSQVHLCKET'; //Sirve para calcular la letra que tienes a partir de los numeros
	var letraIntroducida;
	if (comprobarExpresionRegular(campo, expr, size)) { //Comprobamos que cumple la expresion regular
		if (valor.length == 8) { //Si solo mete numeros calculamos la letra
			numero = valor.substr(0, valor.length);
			modulo = numero % 23;
			letra = letra.substring(modulo, modulo + 1);
			valor = valor + letra;

		}
		else { // Comprobamos que la letra coincide
			numero = valor.substr(0, valor.length - 1);
			letraIntroducida = valor.substr(valor.length - 1, valor.length);
			modulo = numero % 23;
			letra = letra.substring(modulo, modulo + 1);
			if (letraIntroducida.toUpperCase() != letra) {// Si no coincide la letra
				document.getElementById(campo).style.borderColor = "red"; //pinta el input de rojo
				return false;
			}
		}
		document.getElementById(campo).style.borderColor = "green"; //pinta el input de verde
		return true;
	}
	document.getElementById(campo).style.borderColor = "red";  //pinta el input de rojo
	return false;

}

function comprobarTelf(campo){ //Comprobamos que sea un número del telefono
	var valor = document.getElementById(campo).value; //Guardamos la variable recibida con id=campo
    var expr = /^(\+34|0034|34)?[\s|\-|\.]?[6|7|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/; //Expresión regular para los telefonos nacionales e internacionales en españa
    
     if(expr.test(valor)){ //Comprobamos si el valor se corresponde con la expresion regular
        document.getElementById(campo).style.borderColor="green"; //pinta el input de verde
        return true;
       }else{//Si la variable no coincide con la expresion regular
        document.getElementById(campo).style.borderColor="red"; //pinta el input de rojo
           return false;
       }
}

//Esta función es a la que se llama para comprobar que todos los campos del formulario de registro son campos correctos.
function registrar(){ //Confirmamos nuevamente si todo esta OK

	if(comprobarDni("dni",9) && comprobarTelf("telefono") && comprobarTexto("login",25) && comprobarTexto("password",20) && comprobarVacio("fechaNac") && comprobarEmail("email",50) &&  comprobarArchivo("fotoPersonal") && comprobarVacio("fotoPersonal") && comprobarAlfabetico("nombre",25) && comprobarAlfabetico("apellidos",50) && comprobarVacio("sexo")){
		return true;
	}
	alert('Error insertando');
	return false;
}

//Esta función es a la que se llama para comprobar que todos los campos del formulario de ADD son campos correctos.
function addLot(){
	if(comprobarEmail("email",50) && comprobarAlfabetico("nombre", 25) && comprobarAlfabetico("apellidos",50) && comprobarEntero("participacion", 0, 999) && comprobarEntero("premio", 0, 999999)){
		return true;
	}
	alert('Error insertando');
	return false;
}

//Esta función es a la que se llama para comprobar que todos los campos del formulario de EDIT son campos correctos.
function editar(){ //Confirmamos nuevamente si todo esta OK
	if(comprobarDni("dniEdit",9) && comprobarTelf("telefonoEdit") && comprobarTexto("contraseñaEdit",20) && comprobarVacio("dateEdit") && comprobarEmail("emailEdit",50) &&  comprobarAlfabetico("nombreEdit",25) && comprobarAlfabetico("apellidosEdit",50) && comprobarAlfabetico("titulacionEdit",60)){
		return true;
	}
	alert('Error al editar');
	return false;
}


//Esta función sirve para comprobar que un email es válido
function comprobarEmail(campo) {

    var valor = document.getElementById(campo).value; //Guardamos la variable recibida con id=campo
    var RE = /^[^@\s]+@[^@.\s]+(.[^@.\s]+)+$/; //Expresión regular para los correos electronicos

    if(RE.test(valor)){ //Comprobamos si el valor se corresponde con la ER
        document.getElementById(campo).style.borderColor="green";
        return true;
       }else{//Si la variable no coincide con la ER
        document.getElementById(campo).style.borderColor="red";
           return false;
       }
}

//Esta función comprueba que los archivos insertados en los inputs tipo file no son archivos vacíos.
function validarArchivo(campo){

	if(document.getElementById(campo).files.length == 0){//Comprobamos si el tamaño es 0.
		document.getElementById(campo).style.borderColor="red"; //El borde del input se pinta de color rojo en caso de que el tamaño sea 0.
		return false;
	}
	else{
		document.getElementById(campo).style.borderColor="green"; //El borde del input se pinta de color verde en caso de que el tamaño sea distinto de 0.
		return true;
	}
}