$(document).ready(function(){
	$('#datatables-example').DataTable();
	$("#usuario").addClass("active");

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// validacion del form de los archivos: //
  //    html/usuario/addUsuario.php //
  //    html/usuario/adminPassword.php //
  //    html/usuario/editUusario.php //
  //    html/usuario/miPerfil.php //
	$("#user").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules:{
      usuario:"required",
      nombre:"required",
      apellido:"required",
      perfil:"required",
      pass:{
        required:true,
        rangelength:[8,100]
      },
      repeat:{
        equalTo:"#pass",
        required:true,
      }
    },
    messages:{
      usuario:"Rellene el campo, por favor.",
      nombre:"Rellene el campo, por favor.",
      apellido:"Rellene el campo, por favor.",
      perfil:"Seleccione una opción, por favor.",
      pass:{
        required:"Rellene el campo, por favor.",
        rangelength:"M&iacute;nimo 8 caracteres"
      },
      repeat:{
        equalTo:"No coinciden las contraseñas",
        required:"Rellene el campo, por favor."
      }
    }
  });
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// validacion del form de foto de perfil del archivo: html/configuracion/miPerfil.php //
	$("#subir").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules:{
      foto:"required"
    },
    messages:{
      foto:"Seleccione un archivo, por favor."
    }
  });
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
});