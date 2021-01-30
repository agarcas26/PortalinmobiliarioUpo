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
        $("#input_puntuacion").attr("value", puntuacion);
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
    $(".corazon").click(function () {
        if ($(".favorito").attr("val") == "activa") {
            $(".favorito").attr("val", "inactiva");
            $(".corazon").attr("src", "../img/nofav.png");
        }
        if ($(".favorito").attr("val") == "inactiva") {
            $(".favorito").attr("val", "activa");
            $(".corazon").attr("src", "../img/fav.png");
        }

    });
});


$(document).ready(function () {
    $(".campana").click(function () {
        if ($(".alerta").attr("val") == "activa") {
            $(".alerta").attr("val", "inactiva");
            $(".campana").attr("src", "../img/noalerta.png");
        }
        if ($(".alerta").attr("val") == "inactiva") {
            $(".alerta").attr("val", "activa");
            $(".campana").attr("src", "../img/alerta.png");
        }

    });
});


$(document).ready(function () {
    $(".form-visa").hide();
    $("#visa").click(function () {
        $(".form-visa").toggle("fast");
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
    animaEstrellas();
});


$(document).ready(function () {
    $("#filtros_aside").hide();
    $("#mostrar_ocultar").click(function () {
        $("#filtros_aside").toggle("fast");
    });
});