<?php

if (isset($_POST['lista'])) {
    mostrarVistaLista();
}
if (isset($_POST['cuadricula'])) {
    mostrarVistaCuadricula();
}

function mostrarVistaLista() {
    echo '<tr>' + '<a href=""> <!-- ENLACE AL ANUNCIO -->' + '<td></td> <!-- FOTO -->' + '<td>' + '<span>' + ' <h4>€/mes</h4>' + '<p>num hab. num baños. m2</p>' + '<p>Tipo inmubele - direccion</p>' + ' <p>descripcion</p>' + '</span>' + ' <button id = "contactar" onclick = "contactar()">Contactar</button>' + '</td>' + '</a >' + '</tr>';
}

function mostrarVistaCuadricula() {
    echo '    <tr>' + '<td>' + '<figure>' + '<img>' + '<figcaption>num hab. num baños. m2.</figcaption>' + '</figure>' + '</td>' + '</tr>';
}
