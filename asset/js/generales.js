function __(id){
	return document.getElementById(id);
}

/////////////////////////////////////////////////////////////////////////////
// funcion para eliminar registros //
function DeleteItem(contenido, url){
	swal({
	  	title: contenido,
	  	type: "warning",
	  	showCancelButton: true,
	 	confirmButtonColor: "#DD6B55",
	  	confirmButtonText: "Si, Eliminar!",
	  	cancelButtonText: "No, Cancelar!",
	  	closeOnConfirm: false,
	  	closeOnCancel: false
	},
	function(isConfirm){
	  	if (isConfirm) {
	    	window.location=url;
	  	} else {
		    swal("Cancelado", "No se ha eliminado ningún dato.", "error");
	  	}
	});
}
/////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////
// funcion para bloquear usuarios //
function BlockItem(contenido, url){
	swal({
	  	title: contenido,
	  	type: "warning",
	  	showCancelButton: true,
	 	confirmButtonColor: "#DD6B55",
	  	confirmButtonText: "Si, Bloquear!",
	  	cancelButtonText: "No, Cancelar!",
	  	closeOnConfirm: false,
	  	closeOnCancel: false
	},
	function(isConfirm){
	  	if (isConfirm) {
	    	window.location=url;
	  	} else {
		    swal("Cancelado", "No se ha bloqueado el usuario.", "error");
	  	}
	});
}
/////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////
// funcion para desbloquear usuarios //
function UnblockItem(contenido, url){
	swal({
	  	title: contenido,
	  	type: "warning",
	  	showCancelButton: true,
	 	confirmButtonColor: "#DD6B55",
	  	confirmButtonText: "Si, Desbloquear!",
	  	cancelButtonText: "No, Cancelar!",
	  	closeOnConfirm: false,
	  	closeOnCancel: false
	},
	function(isConfirm){
	  	if (isConfirm) {
	    	window.location=url;
	  	} else {
		    swal("Cancelado", "No se ha desbloqueado el usuario.", "error");
	  	}
	});
}
/////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
// funcion para que el campo solo acepte numeros //
function solonumeros(e){
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key);
	numeros="1234567890";
	especiales="8-9-17-37-38-46";//los numeros de esta linea son especiales y es para las flechass
	teclado_escpecial=false;
	for(var i in especiales){
	    if (key==especiales[i]) {
	        teclado_escpecial=true;
	    }
	}
	if (numeros.indexOf(teclado)==-1 && !teclado_escpecial) {
	    return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
// funcion para que el campo solo acepte numeros, '-' y '.' //
function solonumeros2(e){
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key);
	numeros="1234567890-.:";
	especiales="8-9-17-37-38-46";//los numeros de esta linea son especiales y es para las flechas
	teclado_escpecial=false;
	for(var i in especiales){
	    if (key==especiales[i]) {
	        teclado_escpecial=true;
	    }
	}
	if (numeros.indexOf(teclado)==-1 && !teclado_escpecial) {
	    return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
// funcion para que en un campo no acepte ningun caracterer //
function deshabilitarteclas(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    numeros="";
    especiales="9";//los numeros de esta linea son especiales y es para las flechas
    teclado_escpecial=false;
    for(var i in especiales){
        if (key==especiales[i]) {
            teclado_escpecial=true;
        }
    }
    if (numeros.indexOf(teclado)==-1 && !teclado_escpecial) {
        return false;
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
// funcion para que en un campo solo acepte letras //
function sololetras(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    letras="qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM ";
    especiales="8-9-17-37-38-46";//los numeros de esta linea son especiales y es para las flechas
    teclado_escpecial=false;
    for(var i in especiales){
        if (key==especiales[i]) {
            teclado_escpecial=true;
        }
    }
    if (letras.indexOf(teclado)==-1 && !teclado_escpecial) {
        return false;
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////
// funcion para contar caracteres del campo del número de telefono //
function CountNumber(variable){
	var campo=document.getElementById(variable).value;
	if(campo.length<7){
		swal(
			{title:'Número de teléfono inválido!',
			type:'warning',
			confirmButtonText:'Aceptar'}
		);
		document.getElementById(variable).value="";
	}
}
/////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////
// funcion para retirar a los alumnos //
function RetiroItem(contenido, url){
	swal({
	  	title: contenido,
	  	type: "warning",
	  	showCancelButton: true,
	 	confirmButtonColor: "#DD6B55",
	  	confirmButtonText: "Si, Retirar!",
	  	cancelButtonText: "No, Cancelar!",
	  	closeOnConfirm: false,
	  	closeOnCancel: false
	},
	function(isConfirm){
	  	if (isConfirm) {
	    	window.location=url;
	  	} else {
		    swal("Cancelado", "No se ha retirado al alumno.", "error");
	  	}
	});
}
/////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////
// funcion para reingresar a los alumnos //
function ReingresoItem(contenido, url){
	swal({
	  	title: contenido,
	  	type: "warning",
	  	showCancelButton: true,
	 	confirmButtonColor: "#DD6B55",
	  	confirmButtonText: "Si, Reingresar!",
	  	cancelButtonText: "No, Cancelar!",
	  	closeOnConfirm: false,
	  	closeOnCancel: false
	},
	function(isConfirm){
	  	if (isConfirm) {
	    	window.location=url;
	  	} else {
		    swal("Cancelado", "No se ha reingresado al alumno.", "error");
	  	}
	});
}
/////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////
// deshabilita el boton de retroceso del navegador //
function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
}
//////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////
// funcion para eliminar registros //
function Cerrar(contenido, url){
	swal({
	  	title: contenido,
	  	type: "warning",
	  	showCancelButton: true,
	 	confirmButtonColor: "#DD6B55",
	  	confirmButtonText: "Si, Cerrar!",
	  	cancelButtonText: "No, Cancelar!",
	  	closeOnConfirm: false,
	  	closeOnCancel: false
	},
	function(isConfirm){
	  	if (isConfirm) {
	    	window.location=url;
	  	} else {
		    swal("Cancelado", "No se ha cerrado el año escolar", "error");
	  	}
	});
}
/////////////////////////////////////////////////////////////////////////////