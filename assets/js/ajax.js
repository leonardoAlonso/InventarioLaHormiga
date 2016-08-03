$(document).ready(function() {
    $("#miDiv").html('');
});

function buscar() {
    var textoBusqueda = $("input#busqueda").val();

     if (textoBusqueda != "") {
        $.post("../php/proc.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#miDiv").html(mensaje);
         });
     } else {
        $("#miDiv").html('');
     };
};

function buscar1() {
    var textoBusqueda = $("input#busqueda").val();

     if (textoBusqueda != "") {
        $.post("../php/proc1.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#miDiv").html(mensaje);
         });
     } else {
        $("#miDiv").html('');
     };
};

function buscar2() {
    var textoBusqueda = $("input#busqueda").val();

     if (textoBusqueda != "") {
        $.post("../php/proc2.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#miDiv").html(mensaje);
         });
     } else {
        $("#miDiv").html('');
     };
};
