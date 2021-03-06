<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar inmueble</title>
        <link rel = "stylesheet" href = "../Bootstrap/css/landing-page.css"/>
        <link rel = "stylesheet" href = "../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Controladores/InmueblesController.php';
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

            <?php
            if (!isset($_POST['btonModificar']) && !isset($_POST['btonCancelar'])) {
                if (isset($_GET['direccion'])) {
                    $datos = get_datos_by_direccion($_GET["direccion"]);
                }
                ?>
                <article>
                    <section>
                        <form action="../Controladores/InmueblesController.php" method="POST">
                            <table id="modificar_inmueble" class="display table-bordered" style="width:100%">
                                <h1>Datos del Inmueble</h1>
                                <input type="hidden" name="txtNumero" value="<?php echo $datos[0]; ?>"/>

                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNumero"])) { ?>
                                    <?php echo $_SESSION["errores"]["txtNumero"]; ?>
                                <?php } ?>
                                <input type="hidden" name="txtCp" value="<?php echo $datos[1]; ?>"/>

                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtCp"])) { ?>
                                    <?php echo $_SESSION["errores"]["txtCp"]; ?>
                                <?php } ?>
                                <input type="hidden" name="txtNombre_via" value="<?php echo $datos[2]; ?>"/>

                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNombre_via"])) { ?>
                                    <?php echo $_SESSION["errores"]["txtNombre_via"]; ?>
                                <?php } ?>
                                <input type="hidden" name="txtTipo_via" value="<?php echo $datos[3]; ?>"/>
                                <input type="hidden" name="txtNombre_localidad" value="<?php echo $datos[5]; ?>"/>

                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNombre_localidad"])) { ?>
                                    <?php echo $_SESSION["errores"]["txtNombre_localidad"]; ?>
                                <?php } ?>
                                <input type="hidden" name="txtNombre_provincia" value="<?php echo $datos[6]; ?>"/>

                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNombre_provincia"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNombre_provincia"]; ?></td>
                                    </tr>
                                <?php } ?> 
                                <tr>
                                    <td>
                                        <label> Numero de baños</label>
                                        <input type="number" name="txtNum_banyos" value="<?php echo $datos[7]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNum_banyos"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNum_banyos"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <label>Numero de habitaciones</label>
                                        <input type="number" name="txtNum_habitaciones" value="<?php echo $datos[8]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNum_habitaciones"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNum_habitaciones"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <label>Cocina amueblada</label>
                                        <input type="radio" name="txtCocina" id="si" value="si"

                                               <label for="si">Si</label>
                                        <input type="radio" name="txtCocina" id="no" value="no"

                                               <label for="no">No</label> 
                                    </td>
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
                                    <td>
                                        <label>Numero de plantas</label>
                                        <input type="number" name="txtNum_Planta" value="<?php echo $datos[11]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtNum_Planta"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtNum_Planta"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <label>Planta</label>
                                        <input type="number" name="txtPlanta" value="<?php echo $datos[12]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($_SESSION["validacion"]) && $_SESSION["validacion"] === false && isset($_SESSION["errores"]["txtPlanta"])) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION["errores"]["txtPlanta"]; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <label>Metros cuadrados</label>
                                        <input type="number" name="txtMetros" value="<?php echo $datos[13]; ?>"/>
                                    </td>
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
                            </table>
                            <input type="submit" name="btonModificar" value=" Modificar"/>
                            <input type="submit"  name="btonCancelar" value="Cancelar"/>
                        </form>
                    </section>
                </article>

                <?php
            }
            ?>
            
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
</html>