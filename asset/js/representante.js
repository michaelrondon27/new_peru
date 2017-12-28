$(document).ready(function(){
	$('#datatables-example').DataTable();

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// validacion del form de los archivos:   //
  //    html/representante/addLegal.php     //
  //    html/representante/addMadre.php     //
  //    html/representante/addPadre.php     //
  //    html/representante/addSuplente.php  //
  //    html/representante/editLegal.php    //
  //    html/representante/editMadre.php    //
  //    html/representante/editPadre.php    //
  //    html/representante/editSuplente.php //
	$("#representante").validate({
    errorElement: "em",
      errorPlacement: function(error, element) {
          $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
          $(label.parent("div").removeClass("form-animate-error"));
      },
    rules:{
      apellidos:"required",
      nombres:"required",
      cedula:"required",
      correo:{
        required:true,
        email:true
      },
      codtlfhabitacion:"required",
      tlfhabitacion:"required",
      codtlfcelular:"required",
      tlfcelular:"required"
    },
    messages:{
      apellidos:"Rellene el campo, por favor.",
      nombres:"Rellene el campo, por favor.",
      cedula:"Rellene el campo, por favor.",
      correo:{
        required:"Rellene el campo, por favor.",
        email:"Coloque una dirección de correo válida, por favor."
      },
      codtlfhabitacion:"Seleccione una opción, por favor.",
      tlfhabitacion:"Rellene el campo, por favor.",
      codtlfcelular:"Seleccione una opción, por favor.",
      tlfcelular:"Rellene el campo, por favor."
    }
  });
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// validacion de cedula den los archivos:  //
  //    html/representante/addLegal.php      //
  //    html/representante/addMadre.php      //
  //    html/representante/addPadre.php      //
  //    html/representante/addSuplente.php   //
  //    html/representante/editLegal.php     //
  //    html/representante/editMadre.php     //
  //    html/representante/editPadre.php     //
  //    html/representante/editSuplente.php  //
	$("#cedula").change(function(){
    var cedula=document.getElementById("cedula").value;
    if(cedula<1000000){
      swal(
        {title:'Número de cédula inválido!',
        type:'warning',
        confirmButtonText:'Aceptar'}
      );
      document.getElementById("cedula").value="";
    }
  });
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
});