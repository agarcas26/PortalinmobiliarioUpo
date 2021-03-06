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
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
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
            <button id="mostrar_ocultar" style="float: right;"  class="btn-block btn-secondary">Mostrar/Ocultar filtros</button>
            <br><br>
            <aside id="filtros_aside" style="position: sticky; top: 20px;">
                <form method="GET" action="../Vistas/busqueda.php">
                    <table id="datos_visa" class="display table-bordered" style="width:100%">
                        <tr>
                            <td><label>Número de baños</label></td>
                            <td><input type="number" min="0" id="num_banyos" name="num_banyos" value="0"></td>
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
                            <td><input type="number" min="0" step="0.01" id="precio_max" name="precio_max" value="0"></td>
                        </tr>
                        <tr>
                            <td><label>Número de habitaciones</label></td>
                            <td><input type="number" min="0" id="num_hab" name="num_hab" value="0"></td>
                        </tr>
                        <tr>
                            <td><label>Metros cuadrados</label></td>
                            <td><input type="number" min="0" id="m2" name="m2" value="0"></td>
                        </tr>
                        <tr>
                            <td><label>Anuncios posteriores al...</label></td>
                            <td><input type="date" id="fecha" name="fecha"></td>
                        </tr>
                        <tr>
                            <td><input class="btn btn-primary" type="submit" id="aplicar_filtros" name="aplicar_filtros" value="Aplicar filtros"></td>
                        </tr>
                    </table>
                </form>
            </aside>
            <article>
                <section>
                    <label>Mostrando  resultados</label>
                    <select class="form-control" id="ordenar_por">
                        <option value="fecha">Los más actualizados</option>
                        <option value="valoracion">Mejor valorados</option>
                        <option value="baratos">Más baratos primero</option>
                    </select>
                    
                    <form style="float: right;" action="../Vistas/busqueda.php" method="POST">
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="lista" value="Lista" />
                            <input class="btn btn-primary" type="submit" name="cuadricula" value="Cuadricula" />
                        </div>
                    </form>
                </section>
                <section id="filtros">
                    <input class="form-control"  type="text" id="barra_buscador" class="" name="barra_buscador" value="" maxlength="100" /></br>
                </section>
                
                <table class="display table-bordered" style="width:100%">
                    <?php
                    include_once '../Controladores/busquedaController.php';
                    ?>
                </table>
            </article>
        </main>
        <?php
        ?>
    </body>
    <?php
    include_once 'footer.html';
    ?>
</html>
