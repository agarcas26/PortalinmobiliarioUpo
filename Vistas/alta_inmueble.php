<!DOCTYPE html>
<html>
    <head>
        <title>Alta inmueble</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
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
                        <h1>Rellene el formulario para dar de alta un nuevo inmueble</h1>
                        <form  action='../Controladores/InmueblesController.php' method='POST' style="margin-left:20px;">
                            <label>A continuación rellene la dirección del inmueble</label>
                            <br><br>
                            <label>Numero</label><br>
                            <input type="number" name="txtNumero" />
                            <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNumero"])) { ?>
                                <span><?php echo $_SESSION["errores"]["txtNumero"]; ?></span>
                            <?php } ?>
                            <br><br>
                            <label>Codigo postal</label><br>
                            <input type="text" name="txtCp" />
                            <br><br>
                            <label>Nombre de la vía</label><br>
                            <input type="text" name="txtNombre_via" />
                            <br><br>
                            <label> Tipo de via</label>
                            <p>
                                <input type="radio" name="txtTipo_via" id="via1" value="Calle">
                                <label for="via1">Calle</label>
                            </p>
                            <p>
                                <input type="radio" name="txtTipo_via" id="via2" value="Avenida">
                                <label for="via2">Avenida</label>
                            </p>
                            <p>
                                <input type="radio" name="txtTipo_via" id="via3" value="Carretera">
                                <label for="via3">Carretera</label>  
                            </p>

                            <label>Localidad</label><br>
                            <input type="text" name="txtNombre_localidad" />
                            <br><br>
                            <label>Provincia</label><br>
                            <input type="text" name="txtNombre_provincia" />
                            <br><br>
                            <label>Numero de baños</label><br>
                            <input type="number" name="txtNum_banyos" />
                            <br><br>
                            <label>Numero de habitaciones</label><br>
                            <input type="number" name="txtNum_habitaciones" />
                            <br><br>
                            <label>Cocina amueblada</label><br>
                            <p>
                                <input type="radio" name="txtCocina" id="si" value="Si">
                                <label for="Si">Si</label>
                            </p>
                            <p>
                                <input type="radio" name="txtCocina" id="no" value="No">
                                <label for="No">No</label>  
                            </p>
                             <label>Tipo de inmueble</label>
                            <p>
                                <input type="radio" name="txtTipo_Inmueble" id="alquiler" value="Alquiler">
                                <label for="Alquiler">Alquiler</label>
                            </p>
                            <p>
                                <input type="radio" name="txtTipo_Inmueble" id="compra" value="Compra">
                                <label for="Compra">Compra</label>
                                <br><br>
                            <label>Numero de plantas</label><br>
                            <input type="number" name="txtNum_Planta" />
                            <br><br>
                            <label>Planta</label><br>
                            <input type="number" name="txtPlanta" />
                            <br><br>
                            <label>Metros cuadrados</label><br>
                            <input type="number" name="txtMetros" />
                            <br><br>
                           
                                <label for="fileFotos">Suba imágenes del inmueble:</label>
                                <br><br>-->
                                <input type="file" name="fileFotos" accept="image/png, image/jpeg">
                                <br><br>
                                <input type="submit" value="enviar" name="btonInsertar">

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
