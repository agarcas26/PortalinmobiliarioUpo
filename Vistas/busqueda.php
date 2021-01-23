<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Búsqueda</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead">
            <?php
            if (($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main>
            <article>
                <section>
                    <label>Mostrando <!-- Insertar numero de resultados --> resultados</label>
                    <select id="ordenar_por">
                        <option value="fecha">Los más actualizados</option>
                        <option value="valoracion">Mejor valorados</option>
                        <option value="baratos">Más baratos primero</option>
                    </select>
                    <!-- OPCION LISTA / CUADRICULA -->
                    <form style="float: right;" action="busquedaController.php" method="GET">
                        <input type="submit" name="lista" value="Lista" />
                        <input type="submit" name="cuadricula" value="Cuadricula" />
                    </form>
                </section>
                <section id="filtros">
                    <input type="text" style="width: 250%; float: left;" id="barra_buscador" class="" name="barra_buscador" value="" maxlength="100" />
                    <input type="checkbox" id="num_banyos" name="num_banyos" value="Número de baños">
                    <select class="dropdown-item" id="tipo_inmueble">
                        <option value="casa">Casa</option>
                        <option value="piso">Piso</option>
                        <option value="duplex">Dúplex</option>
                        <option value="chalet">Chalet</option>
                    </select>
                    <select class="dropdown-item" id="tipo_oferta">
                        <option>Compra</option>
                        <option>Alquiler</option>
                        <option>Vacacional</option>
                    </select>
                    <input type="number" id="precio_max" name="precio_max" value="Precio máximo">
                    <input type="number" id="num_hab" name="num_hab" value="Número de habitaciones">
                    <input type="number" id="m2" name="m2" value="Metros cuadrados">
                </section>
                <!-- ANUNCIOS -->
                <table>
                    <?php
                    ?>
                </table>
            </article>
        </main>
        <?php
        ?>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
