var btnmenu = document.getElementById("carrito");
var btncerrar = document.getElementById("carrito2");

btnmenu.addEventListener('click', function() {
    $('#carrito1').toggle('right: 0;');
});

btncerrar.addEventListener('click', function() {
    $('#carrito1').toggle('right: 0;');
});


function seleccionado() {
    var horario = " ";
    if (aux == 1) {
        document.getElementById("horario1").style.background = 'rgba(231, 47, 78, 1)';
        document.getElementById("horario1").style.color = 'white';
        document.getElementById("horario2").style.background = '#fff';
        document.getElementById("horario2").style.color = 'black';
        document.getElementById("horario3").style.background = '#fff';
        document.getElementById("horario3").style.color = 'black';
        document.getElementById("horario4").style.background = '#fff';
        document.getElementById("horario4").style.color = 'black';
        horario = '3:30pm';
        document.getElementById("contenido").innerHTML = horario;
    }
    if (aux == 2) {
        document.getElementById("horario2").style.background = 'rgba(231, 47, 78, 1)';
        document.getElementById("horario2").style.color = 'white';
        document.getElementById("horario1").style.background = '#fff';
        document.getElementById("horario1").style.color = 'black';
        document.getElementById("horario3").style.background = '#fff';
        document.getElementById("horario3").style.color = 'black';
        document.getElementById("horario4").style.background = '#fff';
        document.getElementById("horario4").style.color = 'black';
        horario = '5:20pm';
        document.getElementById("contenido").innerHTML = horario;
    }
    if (aux == 3) {
        document.getElementById("horario3").style.background = 'rgba(231, 47, 78, 1)';
        document.getElementById("horario3").style.color = 'white';
        document.getElementById("horario1").style.background = '#fff';
        document.getElementById("horario1").style.color = 'black';
        document.getElementById("horario2").style.background = '#fff';
        document.getElementById("horario2").style.color = 'black';
        document.getElementById("horario4").style.background = '#fff';
        document.getElementById("horario4").style.color = 'black';
        horario = '7:40pm';
        document.getElementById("contenido").innerHTML = horario;
    }
    if (aux == 4) {
        document.getElementById("horario4").style.background = 'rgba(231, 47, 78, 1)';
        document.getElementById("horario4").style.color = 'white';
        document.getElementById("horario1").style.background = '#fff';
        document.getElementById("horario1").style.color = 'black';
        document.getElementById("horario2").style.background = '#fff';
        document.getElementById("horario2").style.color = 'black';
        document.getElementById("horario3").style.background = '#fff';
        document.getElementById("horario3").style.color = 'black';
        horario = '9:00pm';
        document.getElementById("contenido").innerHTML = horario;
    }

}