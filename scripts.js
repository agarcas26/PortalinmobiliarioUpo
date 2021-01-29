/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function animaEstrellas() {
    $(".puntuacion-st").click(function () {
        var id = $(this).attr('id');
        var puntuacion = parseInt(id);
        var estrellas = $(".puntuacion-st");
        for (var i = 0; i < estrellas.length; i++) {
            if (i < puntuacion) {
                $(estrellas[i]).attr("src", "../img/checked.png");
            } else {
                $(estrellas[i]).attr("src", "../img/unchecked.png");
            }
        }
        $(".puntuacion-st").attr("value",puntuacion);
    });
}

function muestraEstrellas() {
    var id = $(".estrellado").attr('id');
    var puntuacion = parseInt(id);
    var estrellas = $(".puntuacion");
    for (var i = 0; i < estrellas.length; i++) {
        if (i < puntuacion) {
            $(estrellas[i]).attr("src", "../img/checked.png");
        }
    }
}

function datosTarjeta() {
    var tabla_datos = document.getElementById("datos_visa");
    tabla_datos.innerHTML("<tr>"
            + "<td><label>Nombre titular</label><input type='text' name='titular'/></td>"
            + "</tr><tr>"
            + "<td><label>Número tarjeta</label><input type='number' name='num_tarjeta'/></td>"
            + "</tr>"
            + "<tr>"
            + "<td><label>Caducidad</label><input type='text' name='caducidad' /></td>"
            + "<td><label>CVV</label><input type='password' name='cvv' /></td>"
            + "</tr>");
}

$(document).ready(function () {
    $('table.display').DataTable();
});

$(document).ready(function () {
    $("#form_empresa").hide();
    $("input:radio").click(function () {
        if ($("input:radio[name=tipo]:checked").val() !== "profesional") {
            $("#form_empresa").hide();
        } else {
            $("#form_empresa").show();
        }

    });
});


$(document).ready(function () {
    muestraEstrellas();
    animaEstrellas();
});


$(document).ready(function () {
    $("#filtros_aside").toggle("fast");
    $("#mostrar_ocultar").click(function () {
        $("#filtros_aside").toggle("fast");
    });
});