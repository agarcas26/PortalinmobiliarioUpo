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
                if (isset($_SESSION['usuario_particular'])) {
                    $usuario_S = $_SESSION['usuario_particular'];
                    $usuario_S = getInmuebleByDireccion($direccion);
                } else {
                    $usuario_S = $_SESSION['usuario_profesional'];
                }
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
                $usuario_S = $_SESSION['admin'];
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main>

            <form action="../Controladores/InmueblesController.php" method="POST">
                <!--<button class="btn btn-block btn-lg btn-primary" type="submit" name="logout" value="Cerrar sesión" />-->
                <input type="hidden" name="numero" value="<?php $usuario_S->getNumero(); ?>"/>
                <input type="hidden" name="cp" value="<?php $usuario_S->getCp(); ?>"/>
                <input type="hidden" name="nombre_via" value="<?php $usuario_S->getNombre_via(); ?>"/>
                <input type="hidden" name="tipo_via" value="<?php $usuario_S->getTipo_via(); ?>"/>
                <input type="hidden" name="nombre_localidad" value="<?php $usuario_S->getNombre_localidad(); ?>"/>
                <input type="hidden" name="nombre_provincia" value="<?php $usuario_S->getNombre_provincia(); ?>"/>
                <label> Numero de baños</label>
                <input type="text" name="txtNum_banyos" value="<?php $usuario_S->getNombre_via(); ?>">

                <input type="submit" value="btonmodificar" name="btonModificar">
                <input type="submit" value="cancelar" name="btonCancelar">
            </form>
        </main>  
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>