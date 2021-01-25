/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function mostrar_ocultar() {
    if ($('aside #filtros').is(":visible"))
        $('aside #filtros').slideUp(2000);
    else
        $('aside #filtros').slideDown(2000);
}