<!DOCTYPE html>
<?php
include_once '../Vistas/header.php';
include_once '../Vistas/aside.php';

if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
    ?>
    <html>
        <head>
            <title>Alta inmueble</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
            <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
            <link rel="stylesheet" href="../mycss.css"/>
            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="../scripts.js"></script>

        </head>

        <body>
            <header class="masthead text-white text-center">
                <?php sesion_iniciada(); ?>
            </header>
            <main>
                <aside>
                    <?php aside_sesion_iniciada(); ?>
                </aside>
                <article>
                    <section id="alta_i">
                        <h3>Rellene el formulario para dar de alta un nuevo inmueble</h3>
                        <form  enctype="multipart/form-data" action='../Controladores/InmueblesController.php' method='POST' style="margin-left:10px;">
                            <table id="alta_inm" class="display table-bordered" style="overflow-x:auto;">

                                <tr>
                                    <td><label>Numero</label></td>
                                    <td><label><input type="number" name="txtNumero" /></label></td>
                                </tr>       
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNumero"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNumero"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Codigo postal</label></td>
                                    <td><input type="number" name="txtCp" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtCp"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtCp"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Nombre de la vía</label></td>
                                    <td><input type="text" name="txtNombre_via" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNombre_via"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNombre_via"]; ?></td> 
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label> Tipo de via</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtTipo_via" id="calle" <?php
                                        if (isset($txtTipo_via) && $txtTipo_via == "calle") {
                                            echo "checked";
                                        }
                                        ?> value="calle"></td>
                                    <td><label for="calle">Calle</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtTipo_via" id="avenida" <?php
                                        if (isset($txtTipo_via) && $txtTipo_via == "avenida") {
                                            echo "checked";
                                        }
                                        ?> value="avenida"></td>
                                    <td><label for="avenida">Avenida</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtTipo_via" id="carretera" <?php
                                        if (isset($txtTipo_via) && $txtTipo_via == "carretera") {
                                            echo "checked";
                                        }
                                        ?>value="carretera"></td>
                                    <td><label for="carretera">Carretera</label> </td>
                                </tr>

                                <tr>
                                    <td><label>Localidad</label></td>
                                    <td><input type="text" name="txtNombre_localidad" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNombre_localidad"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNombre_localidad"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Provincia</label></td>
                                    <td><input type="text" name="txtNombre_provincia" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNombre_provincia"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNombre_provincia"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Numero de baños</label></td>
                                    <td><input type="number" name="txtNum_banyos" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNum_banyos"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNum_banyos"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Numero de habitaciones</label></td>
                                    <td><input type="number" name="txtNum_habitaciones" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNum_habitaciones"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNum_habitaciones"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Cocina amueblada</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtCocina" id="si"  <?php
                                        if (isset($txtCocina) && $txtCocina == "si") {
                                            echo "checked";
                                        }
                                        ?> value="si" ></td>
                                    <td><label for="si">Si</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtCocina" id="no"  <?php
                                        if (isset($txtCocina) && $txtCocina == "no") {
                                            echo "checked";
                                        }
                                        ?> value="no"></td>
                                    <td><label for="no">No</label> </td>
                                </tr>
                                <tr>
                                    <td><label>Tipo de inmueble</label></td>
                                    <td>
                                        <select id="tipo_inmueble" name="tipo_inmueble">
                                            <option value="piso">Piso</option>
                                            <option value="casa">Casa</option>
                                            <option value="duplex">Dúplex</option>
                                            <option value="chalet">Chalet</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Numero de plantas</label></td>
                                    <td><input type="number" name="txtNum_Planta" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNum_Planta"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNum_Planta"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Planta</label></td>
                                    <td><input type="number" name="txtPlanta" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtPlanta"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtPlanta"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Metros cuadrados</label></td>
                                    <td><input type="number" name="txtMetros" id="txtMetros" /></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtMetros"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtMetros"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><label>Suba imágenes del inmueble:</label></td>
                                    <td><input type="file" name="fileFotos[]" id="fileFotos[]" accept=".jpeg,.jpg,.png" multiple ></td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["fileFotos"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["fileFotos"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><input type="submit" value="enviar" name="btonInsertar"></td>
                                </tr>
                            </table>
                        </form>
                    </section>
                </article>

                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false) { ?>
                    <section>
                        <h2>Error en el formulario:</h2>
                        <article>
                            <p>Debe de completar correctamente el formulario.</p>
                        </article>
                    </section>
                    <?php
                }
                ?>
            </main>
        </body>
        <?php
        include_once 'footer.html';
        ?>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>
</html>
