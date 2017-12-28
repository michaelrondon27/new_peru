$(document).ready(function(){
	$('#datatables-example').DataTable();

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// validacion del form de los archivos: html/alumnos/addAlumno.php //
	$("#alumno").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules:{
      cedula:"required",
      apellidos:"required",
      nombres:"required",
      sexo:"required",
      codcelular:"required",
      tlfcelular:"required",
      correo:{
        required:true,
        email:true
      }
    },
    messages:{
      cedula:"Rellene el campo, por favor.",
      apellidos:"Rellene el campo, por favor.",
      nombres:"Rellene el campo, por favor.",
      sexo:"Seleccione una opción, por favor.",
      codcelular:"Seleccione una opción, por favor.",
      tlfcelular:"Rellene el campo, por favor.",
      correo:{
        required:"Rellene el campo, por favor.",
        email:"Coloque una dirección de correo válida, por favor."
      }
    }
  });
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////
  // funcion para validar el campo de la cedula en los archivos: //
  //    html/alumnos/addAlumno.php                               //
  //    html/alumnos/editAlumno.php                              //
  $("#cedula").change(function(){
    var ced=document.getElementById("cedula").value;
    var n=parseInt(ced);
    if(n>15000000){
      if(ced!=""){
        document.getElementById("ced_esc").value="00"+ced;
      }else{
        document.getElementById("ced_esc").value="";
      }
    }else{
      swal(
        {title:'Por favor, coloque una cedula valida!',
        type:'warning',
        confirmButtonText:'Cerrar'}
      );
      document.getElementById("cedula").value="";
    }
  });
  ///////////////////////////////////////////////////////////////////////////
        
  ///////////////////////////////////////////////////////////////////////////
  // funcion para que aparezca el calendario en los archivos: //
  //    html/alumnos/addAlumno.php                            //
  //    html/alumnos/editAlumno.php                           //
  $('#fecha').bootstrapMaterialDatePicker({
    weekStart : 0, 
    time: false,
    animation:true
  });
  $('#vencimiento').bootstrapMaterialDatePicker({
    weekStart : 0, 
    time: false,
    animation:true
  });
  ///////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////////////////////////////
  // funcion que permite calcular la edad en los archivos: //
  //    html/alumnos/addAlumno.php                         //
  //    html/alumnos/editAlumno.php                        //
  $("#fecha").change(function(){
    var edad=0;
    //capturamos la fecha de hoy 
    hoy=new Date();
    diaActual=hoy.getDate();
    // al mes le sumamos 1 ya que los meses javascript los muestra como un array de 0 a 11
    mesActual=hoy.getMonth()+1;
    yearActual=hoy.getFullYear();
    //le concateno un 0 al dia y al mes cuando son menor que diez
    if(diaActual<10){
      diaActual='0'+diaActual;
    }
    if(mesActual<10){
      mesActual='0'+mesActual;
    }
    //alert('dia '+diaActual +'del mes ' + mesActual + 'del año '+ yearActual)
    //capturo la fecha que recibo
    //La descompongo en un array
    var fecha=document.getElementById("fecha").value;
    fecha=fecha.split("-");
    dia=fecha[0];
    mes=fecha[1];
    year=fecha[2];
    //Valido que la fecha de nacimiento no sea mayor a la fecha actual
    invalido=yearActual-year;
    if(invalido<10){
      swal(
        {title:'Fecha inválida!',
        type:'warning',
        confirmButtonText:'Aceptar'}
      );
      document.getElementById("fecha").value="";
    }else if(year>=yearActual){
      swal(
        {title:'Fecha inválida!',
        type:'warning',
        confirmButtonText:'Aceptar'}
      );
      document.getElementById("fecha").value="";
      //return;
    }else if((mes>=mesActual) && (dia>diaActual)){
      edad=(yearActual-1)-year;
      document.getElementById('edad').value=edad;
    }else{
      edad=yearActual-year;
      document.getElementById('edad').value=edad;
    }
  });
  /////////////////////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////////////////////////////
  // funcion para ver si se habilita los campos de representante legal en los archivos: //
  //    html/alumnos/addAlumno.php                                                      //
  //    html/alumnos/editAlumno.php                                                     //
  $("#madre").click(function(){
    $("#especifique").attr("disabled", true).val("");
    $("#lopna_si").attr("disabled", true).attr("checked", false);
    $("#lopna_no").attr("disabled", true).attr("checked", false);
    $("#vencimiento").attr("disabled", true).val("");
  });
  $("#padre").click(function(){
    $("#especifique").attr("disabled", true).val("");
    $("#lopna_si").attr("disabled", true).attr("checked", false);
    $("#lopna_no").attr("disabled", true).attr("checked", false);
    $("#vencimiento").attr("disabled", true).val("");
  });
  $("#otro").click(function(){
    $("#especifique").attr("disabled", false).focus();
    $("#lopna_si").attr("disabled", false);
    $("#lopna_no").attr("disabled", false);
  });

  //funcion para ver si se habilita el campo de fecha de vencimiento
  $("#lopna_si").click(function(){
    $("#vencimiento").attr("disabled", false).focus();
  });
  $("#lopna_no").click(function(){
    $("#vencimiento").attr("disabled", true).val("");
  });
  /////////////////////////////////////////////////////////////////////////////////////////////////////////
});