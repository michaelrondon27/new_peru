$(document).ready(function(){
	//habilitar campo si tiene canaima
    $("#canaima_si").click(function(){
        $("#condiciones").attr("disabled", false).focus();
        $("#serial").attr("disabled", false);
        $("#motivo").attr("disabled", true).val("");
        $("#denuncia").attr("disabled", true).val("");
    });//cierre habilitar campo si tiene canaima
    //deshabilitar campo si tiene canaima
    $("#canaima_no").click(function(){
        $("#motivo").attr("disabled", false).focus();
        $("#denuncia").attr("disabled", false);
        $("#condiciones").attr("disabled", true).val("");
        $("#serial").attr("disabled", true).val("");
    });//cierre deshabilitar campo si tiene canaima
});