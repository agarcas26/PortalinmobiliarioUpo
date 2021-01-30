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

                        <form action="../Controladores/InmueblesController.php" method="POST" style="margin-left:10px;">
                            <table id="alta_inm" class="display table-bordered" style="width:70%">
                                <h2>Datos del Inmueble</h2>
                                <tr>
                                    <td>
                                        <input type="hidden" name="numero" value="<?php echo $datos[0]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($$erroresNum)) { ?>
                                    <tr>
                                        <td><?php echo $$erroresNum; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <input type="hidden" name="cp" value="<?php echo $datos[1]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresCp)) { ?>
                                    <tr>
                                        <td><?php echo $erroresCp; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <input type="hidden" name="nombre_via" value="<?php echo $datos[2]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresNombre_via)) { ?>
                                    <tr>
                                        <td><?php echo $erroresNombre_via; ?></td> 
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <input type="hidden" name="tipo_via" value="<?php echo $datos[3]; ?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" name="nombre_localidad" value="<?php echo $datos[5]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresLocalidad)) { ?>
                                    <tr>
                                        <td><?php echo $erroresLocalidad; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <input type="hidden" name="nombre_provincia" value="<?php echo $datos[6]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresProvincia)) { ?>
                                    <tr>
                                        <td><?php echo $erroresProvincia; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <h6> Numero de baños</h6>
                                        <input type="text" name="txtNum_banyos" value="<?php echo $datos[7]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresNum_banyos)) { ?>
                                    <tr>
                                        <td><?php echo $erroresNum_banyos; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <h6>Numero de habitaciones</h6>
                                        <input type="number" name="txtNum_habitaciones" value="<?php echo $datos[8]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresNum_habitaciones)) { ?>
                                    <tr>
                                        <td><?php echo $erroresNum_habitaciones; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <h6>Cocina amueblada</h6>
                                        <input type="radio" name="txtCocina" id="si" value="<?php echo $datos[9]; ?>"/>
                                        <label for="si">Si</label>
                                        <input type="radio" name="txtCocina" id="no" value="<?php echo $datos[9]; ?>"/>
                                        <label for="no">No</label> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Tipo de inmueble</h6>
                                        <input type="radio" name="txtTipo_Inmueble" id="alquiler" value="<?php echo $datos[10]; ?>"/>
                                        <label for="alquiler">Alquiler</label>
                                        <input type="radio" name="txtTipo_Inmueble" id="compra" value="<?php echo $datos[10]; ?>"/>
                                        <label for="compra">Compra</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Numero de plantas</h6>
                                        <input type="number" name="txtNum_Planta" value="<?php echo $datos[11]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresNum_Planta)) { ?>
                                    <tr>
                                        <td><?php echo $erroresNum_Planta; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <h6>Planta</h6>
                                        <input type="number" name="txtPlanta" value="<?php echo $datos[12]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresPlanta)) { ?>
                                    <tr>
                                        <td><?php echo $erroresPlanta; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <h6>Metros cuadrados</h6>
                                        <input type="number" name="txtMetros" value="<?php echo $datos[13]; ?>"/>
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($errorestMetros)) { ?>
                                    <tr>
                                        <td><?php echo $errorestMetros; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <h6 for="fileFotos">Imágenes del inmueble:</h6>


                                        <img id="foto_inmueble" src="../img/Inmueble/' . $direccion . '/' . $fotos[$i] . '"   value="<?php echo $datos[14]; ?>"/>;
                                    </td>
                                </tr>
                                <?php if (isset($validado) && $validado === false && isset($erroresfileFotos)) { ?>
                                    <tr>
                                        <td><?php echo $erroresfileFotos; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <input type="submit" name="btonModificar" id="btonModificar" value=" Modificar"/>
                            <input type="submit"  name="btonCancelar" id="btonCancelar" value="Cancelar"/>
                        </form>
                    </section>
                </article>
                <?php if (isset( $errorModificar)) { ?>
                    <span><?php echo  $errorModificar; ?></span>
                <?php } ?>
                <?php if (isset($validado) && $validado === false) { ?>
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
        header("Location: detalles_inmueble.php");
    }
    ?>
</html>
