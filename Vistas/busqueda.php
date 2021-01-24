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
        <script src="../scripts.js"></script>        
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <?php
        include_once '../Vistas/header.php';
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
        <main>
            <aside id="filtros" style="position: sticky; top: 20px;">
                <button onclick="mostrar_ocultar()">Mostrar/Ocultar filtros</button>
                <form method="GET" action="../Controladores/busquedaController.php">
                    <table class="table-borderless">
                        <tr>
                            <td><label>Número de baños</label></td>
                            <td><input type="number" id="num_banyos" name="num_banyos" value=""></td>
                        </tr>
                        <tr>
                            <td><label>Tipo de inmueble</label></td>
                            <td><select class="dropdown-item" id="tipo_inmueble">
                                    <option value="casa">Casa</option>
                                    <option value="piso">Piso</option>
                                    <option value="duplex">Dúplex</option>
                                    <option value="chalet">Chalet</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label>Tipo de oferta</label></td>
                            <td><select class="dropdown-item" id="tipo_oferta">
                                    <option>Compra</option>
                                    <option>Alquiler</option>
                                    <option>Vacacional</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label>Precio máximo</label></td>
                            <td><input type="number" id="precio_max" name="precio_max" value="Precio máximo"></td>
                        </tr>
                        <tr>
                            <td><label>Número de habitaciones</label></td>
                            <td><input type="number" id="num_hab" name="num_hab" value="Número de habitaciones"></td>
                        </tr>
                        <tr>
                            <td><label>Metros cuadrados</label></td>
                            <td><input type="number" id="m2" name="m2" value="Metros cuadrados"></td>
                        </tr>
                        <tr>
                            <td><label>Anuncios posteriores al...</label></td>
                            <td><input type="date" id="fecha" name="fecha" value="Fecha"></td>
                        </tr>
                        <tr>
                            <td><input class="btn btn-primary" type="submit" id="aplicar_filtros" name="aplicar_filtros" value="Aplicar filtros"></td>
                        </tr>
                    </table>
                </form>
            </aside>
            <article>
                <section>
                    <label>Mostrando <!-- Insertar numero de resultados --> resultados</label>
                    <select class="form-control" id="ordenar_por">
                        <option value="fecha">Los más actualizados</option>
                        <option value="valoracion">Mejor valorados</option>
                        <option value="baratos">Más baratos primero</option>
                    </select>
                    <!-- OPCION LISTA / CUADRICULA -->
                    <form style="float: right;" action="busquedaController.php" method="GET">
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="lista" value="Lista" />
                            <input class="btn btn-primary" type="submit" name="cuadricula" value="Cuadricula" />
                        </div>
                    </form>
                </section>
                <section id="filtros">
                    <input class="form-control"  type="text" id="barra_buscador" class="" name="barra_buscador" value="" maxlength="100" /></br>
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
