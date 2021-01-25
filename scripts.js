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

function ver_detalle($id_anuncio){
    $daoAnuncios = new daoAnuncios();
    $id_anuncio = $_POST['id_anuncio'];
    $anuncio = readAnuncio($id_anuncio);
    $tipo_anuncio = $dao->get_tipo_anuncio($id_anuncio);
    $daoAnuncios->destruct();
    $inmueble_anunciado = getInmuebleByAnuncio($anuncio);

    mostrar_detalle_anuncio();
    header("Location: ../Vistas/detalle_anuncio.php");
}

function mostrar_detalle_anuncio() {
    
}