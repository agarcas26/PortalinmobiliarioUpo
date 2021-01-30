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

        <script src = "../scripts.js"></script>
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
            $datos = get_datos_by_direccion($_GET['direccion']);
            ?>
            <!-- AÑADIR ARTICULO Y SECCION Y METER EN UNA TABLA COMO DIOS MANDA -->
            <form action="../Controladores/InmueblesController.php" method="POST">
                <!--<button class="btn btn-block btn-lg btn-primary" type="submit" name="logout" value="Cerrar sesión" />-->
                <input type="hidden" name="numero" value="<?php echo $datos[0] /* $usuario_S->getNumero(); */ ?>"/>
                <input type="hidden" name="cp" value="<?php echo $datos[1] ?>"/>
                <input type="hidden" name="nombre_via" value="<?php echo $datos[2] ?>"/>
                <input type="hidden" name="tipo_via" value="<?php echo $datos[3] ?>"/>
                <input type="hidden" name="nombre_localidad" value="<?php echo $datos[4] ?>"/>
                <input type="hidden" name="nombre_provincia" value="<?php echo $datos[5] ?>"/>
                <label> Numero de baños</label>
                <input type="number" name="txtNum_banyos" value="<?php echo $datos[6] ?>"/>
                <label>Numero de habitaciones</label>
                <input type="number" name="txtNum_habitaciones" value="<?php echo $datos[7] ?>"/>
                <label>Cocina amueblada</label>

                <input type="radio" name="txtCocina" id="si" value="<?php echo $datos[8] ?>"/>
                <label for="Si">Si</label>

                <input type="radio" name="txtCocina" id="no" value="<?php echo $datos[8] ?>"/>
                <label for="No">No</label> 
                <label>Tipo de inmueble</label>
                <input type="radio" name="txtTipo_Inmueble" id="alquiler" value="<?php echo $datos[9] ?>"/>
                <label for="Alquiler">Alquiler</label>
                <input type="radio" name="txtTipo_Inmueble" id="compra" value="<?php echo $datos[9] ?>"/>
                <label for="Compra">Compra</label>
                <label>Numero de plantas</label>
                <input type="number" name="txtNum_Planta" value="<?php echo $datos[10] ?>"/>
                <label>Planta</label>
                <input type="number" name="txtPlanta" value="<?php echo $datos[11] ?>"/>
                <label>Metros cuadrados</label>
                <input type="number" name="txtMetros" value="<?php echo $datos[12] ?>"/>
                <label for="fileFotos">Imágenes del inmueble:</label>
                <input type="file" name="fileFotos" accept="image/png, image/jpeg"  value="<?php echo $datos[13] ?>"/>
                <input type="submit" value="btonModificar" name="btonModificar">
                <input type="submit" value="btonCancelar" name="btonCancelar">
            </form>
        </main>  
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>