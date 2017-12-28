$(document).ready(function(){
    $("#salto").change(function(){
        var salto=document.getElementById('salto').value;
        var abdominales=document.getElementById('abdominales').value;
        var flexiones=document.getElementById('flexiones').value;
        if(salto==""){
            salto=0;
        }else{
            salto=parseInt(salto);
        }
        if(flexiones==""){
            flexiones=0;
        }else{
            flexiones=parseInt(flexiones);
        }
        if(abdominales==""){
            abdominales=0;
        }else{
            abdominales=parseInt(abdominales);
        }
        var suma=salto+abdominales+flexiones;
        document.getElementById("suma").value=suma;
    });
    $("#abdominales").change(function(){
        var salto=document.getElementById('salto').value;
        var abdominales=document.getElementById('abdominales').value;
        var flexiones=document.getElementById('flexiones').value;
        if(salto==""){
            salto=0;
        }else{
            salto=parseInt(salto);
        }
        if(flexiones==""){
            flexiones=0;
        }else{
            flexiones=parseInt(flexiones);
        }
        if(abdominales==""){
            abdominales=0;
        }else{
            abdominales=parseInt(abdominales);
        }
        var suma=salto+abdominales+flexiones;
        document.getElementById("suma").value=suma;
    });
    $("#flexiones").change(function(){
        var salto=document.getElementById('salto').value;
        var abdominales=document.getElementById('abdominales').value;
        var flexiones=document.getElementById('flexiones').value;
        if(salto==""){
            salto=0;
        }else{
            salto=parseInt(salto);
        }
        if(flexiones==""){
            flexiones=0;
        }else{
            flexiones=parseInt(flexiones);
        }
        if(abdominales==""){
            abdominales=0;
        }else{
            abdominales=parseInt(abdominales);
        }
        var suma=salto+abdominales+flexiones;
        document.getElementById("suma").value=suma;
    });
});