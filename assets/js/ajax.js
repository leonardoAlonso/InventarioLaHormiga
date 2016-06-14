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
