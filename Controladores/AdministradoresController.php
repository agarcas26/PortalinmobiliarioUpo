<?php

include_once '../Modelos/AdministradoresModel.php.php';

function iniciar_sesion_administrador($usuario, $pass) {
    return comprobar_administrador($usuario, $pass);
}
