$(document).ready(function(){
  $('#datatables-example').DataTable();
  $('#datatables-grado').DataTable();
  $('#datatables-seccion').DataTable();
  $('#datatables-asignar').DataTable();
  $('#datatables-cupos').DataTable();
  $("#configuracion").addClass("active");

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form del archivo: html/configuracion/allEscolar.php y html/configuracion/editEscolar.php//
  $("#esc").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      escolar: "required"
    },
    messages: {
      escolar: "Rellene el campo, por favor"
    }
  });
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form de grados del archivo: html/configuracion/allGradoSecciones.php y html/configuracion/editGrado.php//
  $("#form_grado").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      grado: "required"
    },
    messages: {
      grado: "Rellene el campo, por favor"
    }
  });
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form de seciones del archivo: html/configuracion/allGradoSecciones.php y html/configuracion/editSeccion.php //
  $("#form_seccion").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      seccion: "required"
    },
    messages: {
      seccion: "Rellene el campo, por favor"
    }
  });
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form de asignar del archivo: html/configuracion/allGradoSecciones.php //
  $("#form_asignar").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      escolar: "required",
      grado: "required",
      seccion: "required"
    },
    messages: {
      escolar: "Seleccione una opción, por favor",
      grado: "Seleccione una opción, por favor",
      seccion: "Seleccione una opción, por favor"
    }
  });
  /////////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////////////////
  // funciones de busqueda del archivo: html/configuracion/allGradoSecciones.php //
  $('#escolar-search').change(function(){
    var escolar=$('#escolar-search').val();
    var mode=1;
    $.ajax({
      type: "POST",
      url: "core/controllers/buscarController.php",
      data:{
        "escolar":escolar,
        "mode":mode
      },
      success: function(resp){
        if(resp!=""){
          $("#resultados").html(resp);
        }
      }
    });
  });
  $('#grado-search').change(function(){
    var escolar=$('#escolar-search').val();
    var grado=$('#grado-search').val();
    var mode=2;
    if(escolar==""){
      swal(
        {title:'Seleccione un año escolar, por favor!',
        type:'warning',
        confirmButtonText:'Aceptar'}
      );
      document.getElementById("grado-search").value="";
    }else{
      $.ajax({
        type: "POST",
        url: "core/controllers/buscarController.php",
        data:{
          "escolar":escolar,
          "grado":grado,
          "mode":mode
        },
        success: function(resp){
          if(resp!=""){
            $("#resultados").html(resp);
          }
        }
      });
    }
  });
  $('#cupos-search').change(function(){
    var escolar=$('#cupos-search').val();
    var mode=4;
    $.ajax({
      type: "POST",
      url: "core/controllers/buscarController.php",
      data:{
        "escolar":escolar,
        "mode":mode
      },
      success: function(resp){
        if(resp!=""){
          $("#resultados1").html(resp);
        }
      }
    });
  });
  $("#escolar-cupos").change(function(){
    grado=document.getElementById("grado-cupos").value="";
    seccion=document.getElementById("seccion-cupos").value="";
  });
  $("#grado-cupos").change(function(){
    seccion=document.getElementById("seccion-cupos").value="";
  });
  $("#seccion-cupos").change(function(){
    var escolar=document.getElementById("escolar-cupos").value;
    var grado=document.getElementById("grado-cupos").value;
    var seccion=document.getElementById("seccion-cupos").value;
    var mode=5;
    if(escolar!=""){
      if(grado!=""){
        $.ajax({
          type: "POST",
          url: "core/controllers/buscarController.php",
          data:{
            "escolar":escolar,
            "grado":grado,
            "seccion":seccion,
            "mode":mode
          },
          success: function(resp){
            if(resp!=""){
              $("#resultados2").html(resp);
            }
          }
        });
      }else{
        document.getElementById("escolar-cupos").value="";
        document.getElementById("seccion-cupos").value="";
        swal(
          {title:'Debe seleccionar un grado!',
          type:'warning',
          confirmButtonText:'Aceptar'}
        );
      }
    }else{
      document.getElementById("grado-cupos").value="";
      document.getElementById("seccion-cupos").value="";
      swal(
        {title:'Debe seleccionar un año escolar!',
        type:'warning',
        confirmButtonText:'Aceptar'}
      );
    }
  });
  /////////////////////////////////////////////////////////////////////////////////////////////

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form de instruccion del archivo: html/configuracion/instruccion.php y html/configuracion/editInstruccion.php //
  $("#form_instruccion").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      instruccion: "required"
    },
    messages: {
      instruccion: "Rellene el campo, por favor"
    }
  });
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form de inicio de session del archivo: html/configuracion/login.php y html/configuracion/menu.php //
  $("#menu").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      nombre: "required"
    },
    messages: {
      nombre: "Rellene el campo, por favor"
    }
  });
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form de asignar del archivo: html/configuracion/slider.php //
  $("#slider").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      imagen: "required"
    },
    messages: {
      imagen: "Seleccione un archivo, por favor"
    }
  });
  /////////////////////////////////////////////////////////////////////////////////////////////

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form de cupos del archivo: html/configuracion/allGradoSecciones.php y html/configuracion/editCupos.php //
  $("#form_cupos").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      cupo: "required"
    },
    messages: {
      cupo: "Rellene el campo, por favor"
    }
  });
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // validacion del form de inicio de session del archivo: html/configuracion/login.php y html/configuracion/manual.php //
  $("#manual").validate({
    errorElement: "em",
    errorPlacement: function(error, element) {
      $(element.parent("div").addClass("form-animate-error"));
      error.appendTo(element.parent("div"));
    },
    success: function(label) {
      $(label.parent("div").removeClass("form-animate-error"));
    },
    rules: {
      documento: "required"
    },
    messages: {
      documento: "Rellene el campo, por favor"
    }
  });
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // Importar archivos csv para notas.php //
  $('#notas').submit(function(){
    var comprobar=$('#csv').val().length;
    if(comprobar>0){
      var formulario=$('#notas');
      var archivos=new FormData();
      var url='?view=config&mode=Notas';
      for(var i=0;i<(formulario.find('input[type=file]').length);i++){
        archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));
      }
      $.ajax({
        url: url,
        type: 'POST',
        contentType: false,
        data: archivos,
        processData: false,
        beforeSend: function(){
          $("#respuesta").html("<h4 class='color-teal'><i class='fa fa-spinner fa-spin fa-fw'></i><span>  Procesando...</span></h4>")
        },
        success: function(data){
          if(data=='OK'){
            $("#respuesta").html('<h4 class="text-success">Proceso realizado con éxito</h4>');
            return false;
          }else{
            $("#respuesta").html('<h4 class="text-danger">Error al procesar los datos</h4>');
            return false;
          }
        }
      });
      return false;
    }else{
      swal(
        {title:'Por favor, seleccione un archivo!',
        type:'warning',
        confirmButtonText:'Cerrar'}
      );
      return false;
    }
  });
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
});