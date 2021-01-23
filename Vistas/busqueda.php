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
            <label>Mostrando <!-- Insertar numero de resultados --> resultados</label>
            <select id="ordenar_por">
                <option value="fecha">Los más actualizados</option>
                <option value="valoracion">Mejor valorados</option>
                <option value="baratos">Más baratos primero</option>
            </select>
            <!-- OPCION LISTA / CUADRICULA -->
            <form action="busquedaController.php" method="GET">
                <input type="submit" name="lista" value="Lista" />
                <input type="submit" name="cuadricula" value="Cuadricula" />
            </form>

            <!-- ANUNCIOS -->
            <article>
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
