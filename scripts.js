/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('aside #filtros').toggle(function () {
    if ($(this).prev().is(":visible"))
        $(this).slideUp(2000);
    else
        $(this).prev().slideDown(2000);
});
