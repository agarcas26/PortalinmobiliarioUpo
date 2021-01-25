<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




    if ($usuario->getTipo() == "profesional") {
        unset($_SESSION['usuario_profesional']);
    }
    if ($usuario->getTipo() == "particular") {
        unset($_SESSION['usuario_particular']);
    }
    session_destroy();
    header("Location: ../Vistas/login.php");