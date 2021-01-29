/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function animaEstrellas() {
    $(".estrellado").click(function () {
        var id = $(this).attr('id');
        var puntuacion = parseInt(id);
        var estrellas = $(".puntuacion");
        for (var i = 0; i < estrellas.length; i++) {
            if (i < puntuacion) {
                $(estrellas[i]).attr("src","../img/checked.png");
            } else {
                $(estrellas[i]).attr("src","../img/unchecked.png");
            }
        }
    });
}

function muestraEstrellas() {
        var id = $(".estrellado").attr('id');
        var puntuacion = parseInt(id);
        var estrellas = $(".puntuacion");
        for (var i = 0; i < estrellas.length; i++) {
            if (i < puntuacion) {
                $(estrellas[i]).attr("src","../img/checked.png");
            }
        }
}