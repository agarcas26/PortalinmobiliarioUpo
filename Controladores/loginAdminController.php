<?php

if (isset($_POST['entrar'])) {
    if (iniciar_sesion_administrador($_POST['user'], $_POST['pass'])) {
        $_SESSION['usuario'] = $_POST['user'];  //sesion distinta?
        header("Location: index.php");
    } else {
        alert("Introduzca unas credenciales válidas");
    }
}