<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido, ¿qué buscas?</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once 'header.php';
        include_once '../Controladores/busquedaController.php';
        ?>
    </head>
    <body>
        <header class="masthead">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <?php
        if (!isset($_POST['realizar_busqueda'])) {
            ?>
            <main>
                <nav id="buscador" class="navbar navbar-light bg-light static-top">
                    <form style="display: inline-block" action="../Controladores/indexController.php" method="POST">
                        <table>
                            <tr class="form-group">
                                <td>
                                    <select class="form-control form-control-lg" style="float: left;" type="multiple" class="dropdown-item" id="tipo_oferta">
                                        <option>Compra</option>
                                        <option>Alquiler</option>
                                        <option>Vacacional</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td>
                                    <input type="text" style="width: 250%; float: left;" id="barra_buscador" class="" name="barra_buscador" value="" maxlength="100" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-block btn-lg btn-primary" id="realizar_busqueda" name="realizar_busqueda" >Buscar</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </nav>
                <aside id="ultimas_busquedas">                    
                </aside>
                <?php if (isset($_SESSION['usuario_particular'])) { ?>
                    <h3>Tus últimas búsquedas</h3>
                    <table class="table-bordered">
                        <?php
                        get_ultimas_busquedas_usuario();
                        ?>
                    </table>
                <?php } ?>
                <h3>Lo más buscado</h3>
                <table class="table-bordered">
                    <?php
                    get_ultimas_busquedas();
                    ?>
                </table>
                <article>
                </article>
            </main>
            <?php
        }
        ?>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
