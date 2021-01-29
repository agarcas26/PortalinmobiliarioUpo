/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function animaEstrellas() {
    $(".estrellado-val").click(function () {
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
        $(".puntuacion-st").attr("value", puntuacion);
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

$(document).ready(function () {
    $("#datos_visa").hide();
    $("button #visa").click(function () {
        if ($("button #visa[name=visa]:checked")) {
            $("#datos_visa").show();
        } else {
            $("#datos_visa").hide();
        }

    });
});

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
});


$(document).ready(function () {
    $("#filtros_aside").toggle("fast");
    $("#mostrar_ocultar").click(function () {
        $("#filtros_aside").toggle("fast");
    });
});