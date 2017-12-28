$(document).ready(function(){
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// validacion del form del archivo: html/inscripcion/addInscripcion.php //
	$("#form_inscripcion").validate({
	    errorElement: "em",
	    errorPlacement: function(error, element) {
	     	$(element.parent("div").addClass("form-animate-error"));
	      	error.appendTo(element.parent("div"));
    	},
    	success: function(label) {
      		$(label.parent("div").removeClass("form-animate-error"));
    	},
    	rules:{
      		grado:"required",
      		seccion:"required",
      		alumno:"required",
      		condicion:"required"
    	},
    	messages:{
     		grado:"Seleccione una opción, por favor.",
      		seccion:"Seleccione una opción, por favor.",
      		alumno:"Seleccione una opción, por favor.",
      		condicion:"Seleccione una opción, por favor."
    	}
  	});
	$("#seccion").change(function(){
		var escolar=document.getElementById("escolar").value;
		var grado=document.getElementById("grado").value;
		var seccion=document.getElementById("seccion").value;
	    var mode=3;
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
		          		$("#resultados").html(resp);
		        	}
		      	}
		    });
    	}else{
    		document.getElementById("escolar").value="";
    		document.getElementById("seccion").value="";
    		swal(
				{title:'Debe seleccionar un grado!',
				type:'warning',
				confirmButtonText:'Aceptar'}
			);
    	}
	});
	$("#alumno").change(function(){
		var grado=document.getElementById("grado").value;
		var seccion=document.getElementById("seccion").value;
		if(grado!=""){
			if(seccion==""){
				document.getElementById("alumno").value="";
	    		document.getElementById("seccion").value="";
	    		swal(
					{title:'Debe seleccionar una sección!',
					type:'warning',
					confirmButtonText:'Aceptar'}
				);
			}
		}else{
			document.getElementById("alumno").value="";
    		document.getElementById("seccion").value="";
    		swal(
				{title:'Debe seleccionar un grado!',
				type:'warning',
				confirmButtonText:'Aceptar'}
			);
		}
	});
	$("#condicion").change(function(){
		var condicion=document.getElementById("condicion").value;
		if(condicion=="Repitiente"){
			$("#repitiente").attr("disabled", false).focus();
		}else{
			$("#repitiente").attr("disabled", true).val("");
		}
	});
});