$(document).ready(main);

var contador = 1;

function main(){
  $('.menu-bar').click(function(){
    if (contador == 1) {
      $('nav').animate({
        left:'0'
      });
      contador = 0;
    } else {
      contador = 1;
      $('nav').animate({
        left:'-100%'
      });
    }
  });

  //Mostramos y ocultamos submenus

  $('.submenu').click(function(){
    $(this).children('.children').slideToggle();
  });
}

/**
 * Función que solo permite la entrada de numeros, un signo negativo y
 * un punto para separar los decimales
 */
function soloNumeros(e)
{
    // capturamos la tecla pulsada
    var teclaPulsada=window.event ? window.event.keyCode:e.which;

    // capturamos el contenido del input
    var valor1=document.getElementById("stock").value;
    var valor2=document.getElementById("precio_publico").value;
    var valor3=document.getElementById("precio_proveedor").value;

    // 45 = tecla simbolo menos (-)
    // Si el usuario pulsa la tecla menos, y no se ha pulsado anteriormente
    // Modificamos el contenido del mismo añadiendo el simbolo menos al
    // inicio
    if(teclaPulsada==45 && (valor1.indexOf("-")==-1 || valor2.indexOf("-")==-1 || valor3.indexOf("-")==-1))
    {
        document.getElementById("stock").value="-"+valor1;
        document.getElementById("precio_publico").value="-"+valo2;
        document.getElementById("precio_proveedor").value="-"+valor3;
    }

    // 13 = tecla enter
    // 46 = tecla punto (.)
    // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
    // punto
    if(teclaPulsada==13 || (teclaPulsada==46 && (valor1.indexOf(".")==-1 || valor2.indexOf(".")==-1 || valo3.indexOf(".")==-1)))
    {
        return true;
    }

    // devolvemos true o false dependiendo de si es numerico o no
    return /\d/.test(String.fromCharCode(teclaPulsada));
}
