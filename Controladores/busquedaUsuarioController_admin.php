<?php

if (isset($_POST['busuario'])) {
    mostrarVistaLista();
}

function mostrarVistaLista() {
    echo '<tr>' + '<a href="<!-- ENLACE AL USUARIO -->"> ' + '<!-- NOMBRE USUARIO --> </tr>';
}