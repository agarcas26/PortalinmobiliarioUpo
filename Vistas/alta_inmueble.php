<!DOCTYPE html>
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
        <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';

        if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
            ?>
        </head>
        <body>
            <header class="masthead">
                <?php sesion_iniciada(); ?>
            </header>
            <main>
                <aside>
                    <?php aside_sesion_iniciada(); ?>
                </aside>
                <article>
                    <section>
                        <h3>Rellene el formulario para dar de alta un nuevo inmueble</h3>
                        <form  action='../Controladores/InmueblesController.php' method='POST' style="margin-left:20px;">
                            <table id="datos_visa" class="display table-bordered" style="width:60%">
                                <tr>
                                    <td>
                                        <label>A continuación rellene la dirección del inmueble</label>
                                    </td>
                                </tr>
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
                                    <td><input type="text" name="txtCp" /></td>
                                </tr>
                                <tr>
                                    <td><label>Nombre de la vía</label></td>
                                    <td><input type="text" name="txtNombre_via" /></td>
                                </tr>
                                <tr>
                                    <td><label> Tipo de via</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtTipo_via" id="via1" value="Calle"></td>
                                    <td><label for="via1">Calle</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtTipo_via" id="via2" value="Avenida"></td>
                                    <td><label for="via2">Avenida</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtTipo_via" id="via3" value="Carretera"></td>
                                    <td><label for="via3">Carretera</label> </td>
                                </tr>
                                <tr>
                                    <td><label>Localidad</label></td>
                                    <td><input type="text" name="txtNombre_localidad" /></td>
                                </tr>
                                <tr>
                                    <td><label>Provincia</label></td>
                                    <td><input type="text" name="txtNombre_provincia" /></td>
                                </tr>
                                <tr>
                                    <td><label>Numero de baños</label></td>
                                    <td><input type="number" name="txtNum_banyos" /></td>
                                </tr>
                                <tr>
                                    <td><label>Numero de habitaciones</label></td>
                                    <td>input type="number" name="txtNum_habitaciones" /></td>
                                </tr>
                                <tr>
                                    <td><label>Cocina amueblada</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtCocina" id="si" value="Si"></td>
                                    <td><label for="Si">Si</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtCocina" id="no" value="No"></td>
                                    <td><label for="No">No</label> </td>
                                </tr>
                                <tr>
                                    <td><label>Tipo de inmueble</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtTipo_Inmueble" id="alquiler" value="Alquiler"></td>
                                    <td><label for="Alquiler">Alquiler</label></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="txtTipo_Inmueble" id="compra" value="Compra"></td>
                                    <td><label for="Compra">Compra</label></td>
                                </tr>
                                <tr>
                                    <td><label>Numero de plantas</label></td>
                                    <td><input type="number" name="txtNum_Planta" /></td>
                                </tr>
                                <tr>
                                    <td><label>Planta</label></td>
                                    <td><input type="number" name="txtPlanta" /></td>
                                </tr>
                                <tr>
                                    <td><label>Metros cuadrados</label></td>
                                    <td><input type="number" name="txtMetros" /></td>
                                </tr>
                                <tr>
                                    <td><label for="fileFotos">Suba imágenes del inmueble:</label></td>
                                    <td><input type="file" name="fileFotos" accept="image/png, image/jpeg" ></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="enviar" name="btonInsertar"></td>
                                </tr>
                            </table>
                        </form>
                    </section>
                </article>
                <?php if (isset($_SESSION["errores"]["insertOk"])) { ?>
                    <span><?php echo $_SESSION["errores"]["insertOk"]; ?></span>
                <?php } ?>
                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false) { ?>
                    <section>
                        <h2>Error en el formulario:</h2>
                        <article>
                            <p>Debe de completar correctamente el formulario.</p>
                        </article>
                    </section>
                    <?php
                    unset($_SESSION["validacion"]);
                    unset($_SESSION["errores"]);
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
