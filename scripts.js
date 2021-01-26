/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function mostrar_ocultar() {
    if ($('#filtros_aside').is(":visible"))
        $('#filtros_aside').slideUp(2000);
    else
        $('#filtros_aside').slideDown(2000);
}