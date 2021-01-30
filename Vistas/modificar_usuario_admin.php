<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar perfil usuario</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/busquedaUsuarioController_admin.php';
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
            <aside>
            </aside>                
            <form action="../Controladores/logoutController.php">
                <button class="btn btn-block btn-lg btn-primary" type="submit" name="logout" value="" />Cerrar sesión</button>
            </form>
            <form action="../Controladores/PerfilController.php" method="POST">
                <table id="datos_visa" class="display table-bordered" style="width:100%">
                    <h1>Datos del perfil</h1>
                    <?php
                    $datos = getDatosPerfil($_POST['nombre_usuario']);
                    ?>
                    <tr>
                        <td>
                            <label>Usuario: </label>
                            <label><?php echo $datos[0]; ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nombre: </label>
                            <label><?php echo $datos[1]; ?></label>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        if (!isset($_SESSION['searchuser'])) {
                            ?>
                            <td>
                                <label>Contraseña: </label>
                                <input type="password" name="pass" value="<?php echo $datos[2]; ?>">
                                <label>Para cambiar la contraseña, por favor, introduzca su contraseña actual</label>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td>
                            <label>Moroso </label>
                            <input type="text" name="moroso" value="<?php echo $datos[3]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tipo </label>
                            <input type="text" name="tipo" value="<?php echo $datos[4]; ?>">
                        </td>
                    </tr>
                </table>
                <input type="submit" name="guardar" value="Guardar cambios" />
            </form>
        </main>  
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
